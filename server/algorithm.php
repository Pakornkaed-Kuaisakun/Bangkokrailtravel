<?php
if (isset ($_POST['search'])) {
    $start_station = $_POST['start'];
    $end = $_POST['end'];


    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    $service = 1;
    $ID = $_SESSION['ID'];

    include_once ("code_station.php");

    $station = $code_station[$start_station];

    $values = array();
    $order_place = array();
    $data_query = ["museum", "mall", "market", "park", "religious", "family"];

    $diff = strtotime($end_time) - strtotime($start_time);

    $place_station = "SELECT * FROM place ORDER BY code_station ASC";
    $stmt = $conn->prepare($place_station);
    $stmt->execute();
    $result = $stmt->get_result();

    $array_row_place_uniqueID = array();
    $array_row_place_station = array();
    $array_row_place_name = array();
    $array_row_place_type = array();

    while ($row_place = $result->fetch_array()) {
        $array_row_place_uniqueID[] = $row_place[1];
        $array_row_place_station[] = $row_place[2];
        $array_row_place_name[] = $row_place[3];
        $array_row_place_type[] = $row_place[4];
    }
    $stmt->close();


    $all_price = 0;
    $all_time = 0;



    class Values
    {
        public $values;
        public $time;
        public $price;

    }


    function loop($conn, $ID, $array_row_place_uniqueID, $array_row_place_station, $array_row_place_type, $station, $order_place, $service)
    {
        $cnt = 0;
        while ($cnt < count($array_row_place_station)) {
            $ID = 1;
            $rating = "SELECT rating FROM rating WHERE ID = ? AND type = ?";
            $stmt = $conn->prepare($rating);
            $stmt->bind_param('is', $ID, $array_row_place_type[$cnt]);
            $stmt->execute();
            $stmt->bind_result($rating);
            $stmt->fetch();
            $stmt->close();

            $time_station = "SELECT * FROM time_station WHERE start = ?";
            $stmt = $conn->prepare($time_station);
            $stmt->bind_param('s', $station);
            $stmt->execute();
            $result_time = $stmt->get_result();

            $time = $result_time->fetch_array();
            $time[$cnt + 1] = $time[$array_row_place_station[$cnt]];
            $stmt->close();

            $price = "SELECT * FROM price_bts WHERE start = ?";
            $stmt = $conn->prepare($price);
            $stmt->bind_param('s', $station);
            $stmt->execute();
            $result_price = $stmt->get_result();

            $price = $result_price->fetch_array();
            $price[$cnt + 1] = $price[$array_row_place_station[$cnt]];
            $stmt->close();


            if ($price[$cnt + 1] == 0) {
                $price[$cnt + 1] = 1;
            }
            if ($time[$cnt + 1] == 0) {
                $time[$cnt + 1] = 1;
            }



            $values[$array_row_place_uniqueID[$cnt]] = ($rating * $service) / ($price[$cnt + 1] * $time[$cnt + 1]);

            if (count($order_place) > 0) {
                for ($i = 0; $i < count($order_place); $i++) {
                    unset($values[$order_place[$i]]);
                }
            }

            arsort($values);



            $cnt += 1;


        }

        $all_value = new Values();
        $all_value->values = $values;
        $all_value->time = $time;
        $all_value->price = $price;

        return $all_value;

    }

    $result = loop($conn, $ID, $array_row_place_uniqueID, $array_row_place_station, $array_row_place_type, $station, $order_place, $service);

    $values = $result->values;
    $time = $result->time;
    $price = $result->price;



    if (count($values) > 0) {
        arsort($values);
        $key = array_keys($values);

        for ($cnt = 0; $cnt < count($key); $cnt++) {
            if ($diff > $all_time + 3600) {

                $uniqueID = $key[$cnt];
                $stmt = $conn->prepare("SELECT * FROM place WHERE uniqueID = ?");
                $stmt->bind_param("s", $uniqueID);
                $stmt->execute();
                $result_query = $stmt->get_result();

                $row = $result_query->fetch_object();


                $all_time = $all_time + (int) $time[$cnt] + ($row->about_timeUse * 60 * 60);
                $all_price = $all_price + (int) $price[$cnt] + $row->adult_price;

                $stmt->close();

                $order_place[] = $row->name;

                $station = $row->station;
                $values = loop($conn, $ID, $array_row_place_uniqueID, $array_row_place_station, $array_row_place_type, $station, $order_place, $service);
            } else {
                $use_algorithm = true;
                $_SESSION['key'] = $key;
                $_SESSION['order-place'] = $order_place;

                $_SESSION['start_station'] = $start_station;
                $_SESSION['end'] = $end;
                $_SESSION['start_time'] = $start_time;
                $_SESSION['end_time'] = $end_time;

            }
        }
    } else {
        echo "error";
    }







}
?>