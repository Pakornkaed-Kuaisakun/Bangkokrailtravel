<?php
function findMaxValues($conn, $ID, $array_uniqueID, $service, $station, $all_time, $all_price, $order_place)
{
    $values = array();
    for ($cnt = 0; $cnt < count($array_uniqueID); $cnt++) {
        $stmt = $conn->prepare("SELECT * FROM place WHERE uniqueID = ?");
        $stmt->bind_param("s", $array_uniqueID[$cnt]);
        $stmt->execute();
        $result_query = $stmt->get_result();
        $row_place = $result_query->fetch_object();
        $stmt->close();


        $rating = "SELECT rating FROM rating WHERE ID = ? AND type = ?";
        $stmt = $conn->prepare($rating);
        $stmt->bind_param('is', $ID, $row_place->type);
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
        $time = $time[$row_place->code_station];
        $stmt->close();

        $price = "SELECT * FROM price_bts WHERE start = ?";
        $stmt = $conn->prepare($price);
        $stmt->bind_param('s', $station);
        $stmt->execute();
        $result_price = $stmt->get_result();

        $price = $result_price->fetch_array();
        $price = $price[$row_place->code_station];
        $stmt->close();


        if ($price == 0) {
            $price = 1;
        }
        if ($time == 0) {
            $time = 1;
        }

        $values[$array_uniqueID[$cnt]] = ($rating * $service) / ($price * $time);


        if ($cnt == count($array_uniqueID)) {
            arsort($values);
            $key = array_keys($values);

            $uniqueID = $key[$cnt];
            $stmt = $conn->prepare("SELECT * FROM place WHERE uniqueID = ?");
            $stmt->bind_param("s", $uniqueID);
            $stmt->execute();
            $result_query = $stmt->get_result();

            $row = $result_query->fetch_object();


            $all_time = $all_time + $time + ($row->about_timeUse * 60 * 60);
            $all_price = $all_price + $price + $row->adult_price;

            $stmt->close();

            $order_place[] = $row->name;

            $station = $row->station;
            unset($array_uniqueID[$row->uniqueID]);

            if (count($array_uniqueID) > 0) {
                findMaxValues($conn, $ID, $array_uniqueID, $service, $station, $all_time, $all_price, $order_place);
            } else {
                $use_algorithm = true;
                return $use_algorithm;
            }
        }
    }
}
?>