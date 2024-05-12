<?php
/*
session_start();

if(!isset($_SESSION['id'])) {
    header("Location: ../Sign/SignIn.php");
    exit; 
}
*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $driver= $_POST['driver'];
    $departure = $_POST['departure'];
    $destination = $_POST['destination'];
    $date = $_POST['date'];
    $price = $_POST['price'];
    $personal = isset($_POST['personal']) ? 1 : 0; 
    $smoking = isset($_POST['smoking']) ? 1 : 0;
    $pet = isset($_POST['pet']) ? 1 : 0;
    $spots = $_POST['spots'];
    $rating=1;
    
    $conn = new mysqli("localhost","root", "", "wassalni");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "INSERT INTO ride (departure, destination,spots, driver, personal, smoking, pet, price, date , rating ) 
            VALUES ('$departure', '$destination','$spots','$driver', '$personal', '$smoking', '$pet', '$price','$date', $rating )";

    if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="publish.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

</head>

<body>
    <section class="vh-90 gradient-custom">
        <form method="POST">
            <div class="container py-5 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-12 col-lg-9 col-xl-7">
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Publish Your Ride</h3>
                                <form>

                                    <div class="row">
                                        <div class="col-md-12 mb-4">

                                            <div class="form-outline">
                                                <input type="text" id="firstName" name="driver"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="firstName">Driver Full Name</label>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4 d-flex align-items-center">
                                            <div class="form-outline datepicker w-100">
                                                <input type="text" name="departure" class="form-control form-control-lg"
                                                    id="departure" />
                                                <label for="departure" class="form-label">Departure</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4 d-flex align-items-center">
                                            <div class="form-outline">
                                                <input type="text" id="destination" name="destination"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="destination">Destination</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">

                                            <div class="form-outline">
                                                <input type="date" id="date" name="date"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="date">Date</label>
                                            </div>

                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">

                                            <div class="form-outline">
                                                <input type="price" id="price" name="price"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="phoneNumber">Price</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Do you allow these features during the ride?</h5>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="personal" type="checkbox"
                                                        value="" id="personal">
                                                    <label class="form-check-label" for="personal">
                                                        Personal Rides
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="smoking" type="checkbox"
                                                        value="" id="smoking" checked>
                                                    <label class="form-check-label" for="smoking">
                                                        Smoking during rides
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="pet" type="checkbox" value=""
                                                        id="pets" checked>
                                                    <label class="form-check-label" for="pets">
                                                        Bringing Pets
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select name="spots" class="form-control form-control-lg">
                                                    <option value="0" disabled>Choose option</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                                <label class="form-label select-label">Spots available</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4 pt-2">
                                        <input class="btn btn-primary btn-lg" type="submit" value="Submit"
                                            style="background-color: #2F5D62;" />
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-d6d9jnODePxx6vz1npZWVQ/WW3iA4iIw6L/5aYSzjz4uuzp/f7ZSHwuOJCLuLNTZ" crossorigin="anonymous">
    </script>
</body>

</html>