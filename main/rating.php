<?php
    session_start();
    include("../connection/conn.php");
    include("dist/function/checkLogin.php");
    checkLogin();

    $ID = $_SESSION['ID'];

    $data = ["adventure", "mall", "religious", "museum", "family", "park", "market"];
    $insert = "UPDATE rating SET rating = ? WHERE ID = ? AND type = ?";

    if(isset($_POST['rating'])) {
        for($i=0;$i<count($data);$i++) {
            $input = $_POST[$data[$i]];

            $stmt = $conn->prepare($insert);
            $stmt->bind_param('sis', $input, $ID, $data[$i]);
            $stmt->execute();

            if($stmt) {
                header("Location: index.php");
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rating Slider</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            /* Black background */
            color: #000;
            /* White text */
        }

        .rating-container {
            width: 300px;
            text-align: center;
        }

        .rating-slider {
            width: 100%;
            margin-bottom: 20px;
            background-color: #fff;
        }

        .rating-message {
            font-size: 18px;
        }

        input[type='range'] {
            height: 10px;
            -webkit-appearance: none;
            color: #000;
            background-color: #000;
            margin-top: -1px;
        }
    </style>
</head>

<body>


    <form method="post">
        <div class="rating-container">
            <h4 class="mb-4 fw-bold">Please choose your satisfaction.</h4>
            <div class="row g-3 align-items-center mb-2">
                <div class="col-4">
                    <label for="slider1" class="col-form-label fw-bold">Adventure</label>
                </div>
                <div class="col-4">
                    <input type="range" class="form-range rating-slider" value="0" id="slider1" name="adventure"
                        min="0" max="5" step="1" required>
                </div>
                <div class="col-4">
                    <span id="slider1Value">0</span>
                </div>
            </div>
            <div class="row g-3 align-items-center mb-2">
                <div class="col-4">
                    <label for="slider2" class="col-form-label fw-bold">Mall</label>
                </div>
                <div class="col-4">
                    <input type="range" class="form-range rating-slider" value="0" id="slider2" name="mall"
                        min="0" max="5" step="1" required>
                </div>
                <div class="col-4">
                    <span id="slider2Value">0</span>
                </div>
            </div>
            <div class="row g-3 align-items-center mb-2">
                <div class="col-4">
                    <label for="slider3" class="col-form-label fw-bold">Religious</label>
                </div>
                <div class="col-4">
                    <input type="range" class="form-range rating-slider" value="0" id="slider3" name="religious"
                        min="0" max="5" step="1" required>
                </div>
                <div class="col-4">
                    <span id="slider3Value">0</span>
                </div>
            </div>
            <div class="row g-3 align-items-center mb-2">
                <div class="col-4">
                    <label for="slider4" class="col-form-label fw-bold">Museum</label>
                </div>
                <div class="col-4">
                    <input type="range" class="form-range rating-slider" value="0" id="slider4" name="museum"
                        min="0" max="5" step="1" required>
                </div>
                <div class="col-4">
                    <span id="slider4Value">0</span>
                </div>
            </div>
            <div class="row g-3 align-items-center mb-2">
                <div class="col-4">
                    <label for="slider5" class="col-form-label fw-bold">Family</label>
                </div>
                <div class="col-4">
                    <input type="range" class="form-range rating-slider" value="0" id="slider5" name="family"
                        min="0" max="5" step="1" required>
                </div>
                <div class="col-4">
                    <span id="slider5Value">0</span>
                </div>
            </div>
            <div class="row g-3 align-items-center mb-2">
                <div class="col-4">
                    <label for="slider6" class="col-form-label fw-bold">Park</label>
                </div>
                <div class="col-4">
                    <input type="range" class="form-range rating-slider" value="0" id="slider6" name="park"
                        min="0" max="5" step="1" required>
                </div>
                <div class="col-4">
                    <span id="slider6Value">0</span>
                </div>
            </div>
            <div class="row g-3 align-items-center mb-2">
                <div class="col-4">
                    <label for="slider7" class="col-form-label fw-bold">Market</label>
                </div>
                <div class="col-4">
                    <input type="range" class="form-range rating-slider" value="0" id="slider7" name="market"
                        min="0" max="5" step="1" required>
                </div>
                <div class="col-4">
                    <span id="slider7Value">0</span>
                </div>
            </div>
            <div class="row">
                <button type="submit" name="rating" class="btn btn-primary">Confirm</button>
                <a href="index.php" class="btn btn-primary mt-3">Go to index</a>
            </div>
        </div>
    </form>



    <!-- Bootstrap JS and Popper.js (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript for rating slider -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Select all sliders
            var sliders = document.querySelectorAll('.form-range');

            // Add event listener to each slider
            sliders.forEach(function (slider) {
                var sliderValueElement = document.getElementById(slider.id + 'Value');

                // Initial value display
                sliderValueElement.textContent = slider.value;

                // Update value display when slider changes
                slider.addEventListener('input', function () {
                    sliderValueElement.textContent = slider.value;
                });
            });
        });
    </script>

</body>

</html>