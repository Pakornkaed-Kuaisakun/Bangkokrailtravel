<?php
session_start();
include("../connection/conn.php");
$web_head = "Index";

include("../server/algorithm.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php include("dist/_partials/head.php"); ?>
<style>
    .step-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 20px 0;
    }

    .step {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #ddd;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
    }

    .step.active {
        background-color: #4CAF50;
        color: white;
    }

    .step-line {
        flex: 1;
        height: 5px;
        background-color: #ddd;
    }
</style>

<body>
    <main class="main" id="top">

        <div class="container-fluid p-0">
            <?php include("dist/_partials/nav.php"); ?>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <form method="post">
                        <div class="row g-3 align-items-center mb-2">
                            <div class="col-4">
                                <label for="startTime" class="col-form-label">Start Time</label>
                            </div>
                            <div class="col-8">
                                <input type="time" class="form-control" name="start_time" id="startTime" required>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mb-2">
                            <div class="col-4">
                                <label for="endTime" class="col-form-label">End Time</label>
                            </div>
                            <div class="col-8">
                                <input type="time" class="form-control" name="end_time" id="endTime" required>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mb-2">
                            <div class="col-4">
                                <label for="startStation" class="col-form-label">Start Station</label>
                            </div>
                            <div class="col-8">
                                <select name="start" class="form-select" id="startStation" required>
                                    <option selected>Select start</option>
                                    <?php
                                    $query = "SELECT * FROM code_name_station";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    $stmt->close();
                                    $cnt = 1;
                                    while ($row = $result->fetch_object()) {
                                        ?>
                                        <option value="<?php echo $cnt; ?>">
                                            <?php echo $row->code . " - " . $row->thai_name; ?>
                                        </option>
                                        <?php $cnt = $cnt + 1;
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mb-2">
                            <div class="col-4">
                                <label for="endStation" class="col-form-label">End Station</label>
                            </div>
                            <div class="col-8">
                                <select name="end" class="form-select" id="endStation" required>
                                    <option selected>Select end</option>
                                    <?php
                                    $query = "SELECT * FROM code_name_station";
                                    $stmt = $conn->prepare($query);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    $stmt->close();
                                    $cnt = 1;
                                    while ($row = $result->fetch_object()) {
                                        ?>
                                        <option value="<?php echo $cnt; ?>">
                                            <?php echo $row->code . " - " . $row->thai_name; ?>
                                        </option>
                                        <?php $cnt = $cnt + 1;
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row col-auto">
                            <button type="submit" class="btn btn-primary fw-bold" name="search">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row row-col-2 mx-1">
                <?php if (isset($use_algorithm)) {
                    echo '<div class="step-container">';
                    for ($i = 0; $i < count($order_place); $i++) {
                        $uniqueID = $key[$i];
                        $stmt = $conn->prepare("SELECT * FROM place WHERE uniqueID = ?");
                        $stmt->bind_param("s", $uniqueID);
                        $stmt->execute();
                        $result_query = $stmt->get_result();

                        $row = $result_query->fetch_object();
                        $stmt->close();
                        echo '<div class="step h6">';
                        echo $row->station;
                        echo '</div>';
                        echo '<div class="step-line"></div>';
                    }
                    echo '<a href="view-pathDetail.php?p=0" class="btn btn-success fw-bold mb-1"><i class="fa-solid fa-map-location-dot"></i> MAP</a>';
                    echo '</div>';
                    for ($j = 0; $j < count($order_place); $j++) {
                        $uniqueID = $key[$j];
                        $stmt = $conn->prepare("SELECT * FROM place WHERE uniqueID = ?");
                        $stmt->bind_param("s", $uniqueID);
                        $stmt->execute();
                        $result_query = $stmt->get_result();

                        $row = $result_query->fetch_object();
                        $stmt->close();

                        $placeID = explode('P', $key[$j])[1];
                        $stmt = $conn->prepare("SELECT * FROM place_service WHERE uniqueID = ?");
                        $stmt->bind_param("s", $placeID);
                        $stmt->execute();
                        $result_service = $stmt->get_result();
                        $row_service = $result_service->fetch_array();
                        // echo $row_service[1];
                        $stmt->close();

                        if($row->child_price == 0 && $row->adult_price == 0) {
                            $show_price = 0 . " THB";
                        } else if($row->child_price == 0 && $row->adult_price != 0) {
                            $show_price = $row->adult_price . " THB · adult";
                        } else if($row->child_price != 0 && $row->adult_price == 0) {
                            $show_price = $row->child_price . " THB · child";
                        } else {
                            $show_price = $row->child_price . " ~ " . $row->adult_price . " THB";
                        }

                        ?>
                        <div class="card mb-3 col-lg-4" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4 d-flex justify-content-center">
                                    <img src="<?php echo $row->link_img; ?>" class="img-fluid" alt="..." style="object-fit:cover;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?php echo $row->name ?>
                                        </h5>
                                        <p class="card-text"><b>Service: </b>
                                            <?php echo "test"; ?>
                                                </p>
                                                <p class="card-text"><b>Station: </b>
                                            <?php echo $row->station; ?>
                                        </p>
                                        <p class="card-text"><b>Price:</b>
                                            <?php echo $show_price; ?>
                                        </p>
                                        <p class="card-text"><b>Open: </b>
                                            <?php echo $row->open_time; ?>
                                        </p>
                                        <p class="card-text"><b>Close: </b>
                                            <?php echo $row->close_time; ?>
                                        </p>
                                        <!-- <a href="view-pathDetail.php?place-code=<?php echo $uniqueID; ?>">veiw</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>


    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>