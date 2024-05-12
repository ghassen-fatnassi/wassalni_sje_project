<?php
$conn = new mysqli("localhost","root", "", "wassalni");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// $departure = isset($_GET['departure']) ? "departure = ".$_GET['departure'] : "";
// $destination = isset($_GET['destination']) ? "destination = ".$_GET['destination']: "";
// array("brand"=>"Ford", "model"=>"Mustang", "year"=>1964);
$from_js=array("0"=>array("personal"=>0,"pet"=>0,"smoking"=>0),"1"=>array("price"=>0,"rating"=>0,"date"=>1));

// if(!isset($p) && isset($lim)){
//     $p=1;
//     $lim=21;
// }
$p=1;
$lim=21;
$ss="SELECT * FROM ride ";//.$departure ." AND ".$destination
$active_filters=$from_js[0];
$sorting=$from_js[1];
$offset=$lim*($p-1);
$numb=0;
foreach($active_filters as $feature=>$status){if($status!=0){$numb++;}}
if($numb>0){$ss=$ss." WHERE ";}
$c=1;
foreach($active_filters as $feature=>$status){
    if($status==1){
        $ss=$ss.$feature." = 1 ";
        if($c!=$numb){$ss=$ss." AND ";}
        $c++;
    }
}
$numb=0;
foreach($sorting as $feature=>$status){if($status!=0){$numb++;}}
$c=1;
$check=true;
foreach($sorting as $feature=>$status){
    if($status!=0){
        if($check){$ss=$ss."ORDER BY ";$check=false;}
        if($status==1){$ss=$ss.$feature;}
        else if($status==-1){$ss=$ss.$feature." DESC ";}
        if($c!=$numb){$ss=$ss." , ";}
        $c++;
    }
}
$ss=$ss." LIMIT ".$lim." OFFSET ".$offset;
$result=$conn->query($ss);
$rides=new SplFixedArray($result->num_rows);
for($i=0;$i<$rides->getSize();$i++){
  $rides[$i]=$result->fetch_assoc();
}
$conn->close();
$javascript_to_php_variable = '<script>document.writeln(document.getElementById("destination").value);</script>';
	echo $javascript_to_php_variable;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy9p1bZlXQMlA=..." crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="ListPage.css" />
    <script src="script.js"></script>

    <title>Reservation</title>
    <script src="https://kit.fontawesome.com/d6eeda2a70.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #DFEEEA;">
        <div class="container-fluid">
            <a class="logo" href="../Home/HomePage.php">
                <img src="../img/logo4.png" alt="Logo" class="img-fluid" style="max-height: 40px;">
            </a>
            <a class="navbar-brand mr-3" href="../Home/HomePage.php"
                style="text-decoration: none; color: #2F5D62; text-transform: uppercase; font-weight: 700; font-size: 1.8em;">WASSALNI</a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <div class="formcontainer"></div>
                        <form class="form-inline ml-auto" method="GET">
                            <input class="form-control mr-sm-2" type="search" placeholder="Depart" name="departure"
                                aria-label="Depart">
                            <input class="form-control mr-sm-2" type="search" placeholder="Destination"
                                name="destination" id="destination" aria-label="Destination">
                            <button class=" btn-custom my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="../publish/publish.php" class=" btn-publish">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> Publish Your Ride
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Cards -->
    <div class="big_container">
        <div class="left_container">

            <p><strong>This is strongly emphasized text</strong></p>
            <br>
            <div class="section">
                <div class="feature">
                    <p>Personal Ride</p>
                </div>
                <?php
                if($active_filters["personal"]==1){ ?>
                <div class="button_container">
                    <input type="checkbox" id="check1" checked />
                    <label for="check1" class="button"></label>
                </div>
                <?php }else { ?>
                <div class="button_container">
                    <input type="checkbox" id="check1" />
                    <label for="check1" class="button"></label>
                </div>
                <?php } ?>
            </div>
            <div class="section">
                <div class="feature">
                    <p>Allow Smoking</p>
                </div>
                <?php if($active_filters["smoking"]==1){ ?>
                <div class="button_container">
                    <input type="checkbox" id="check2" checked />
                    <label for="check2" class="button"></label>
                </div>
                <?php }else { ?>
                <div class="button_container">
                    <input type="checkbox" id="check2" checked />
                    <label for="check2" class="button"></label>
                </div>
                <?php } ?>
            </div>
            <div class="section">
                <div class="feature">
                    <p>allow pets</p>
                </div>
                <?php if($active_filters["pet"]==1){ ?>
                <div class="button_container" checked>
                    <input type="checkbox" id="check3" />
                    <label for="check3" class="button"></label>
                </div>
                <?php }else { ?>
                <div class="button_container">
                    <input type="checkbox" id="check3" />
                    <label for="check3" class="button"></label>
                </div>
                <?php } ?>
            </div>

            <hr class="hr-text" data-content="">

            <p><strong>This is strongly emphasized text</strong></p>
            <br>
            <div class="section">
                <div class="feature">
                    <p>Rating</p>
                </div>
                <div class="button_container">
                    <?php if($sorting["price"]==1){ ?>
                    <button type="button" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sort-down" viewBox="0 0 16 16">
                            <path
                                d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z">
                            </path>
                        </svg>
                    </button>
                    <div class="sep"></div>
                    <button type="button" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sort-up" viewBox="0 0 16 16">
                            <path
                                d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.5.5 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z" />
                        </svg>
                    </button>
                    <?php }else if($sorting["price"]==-1){ ?>
                    <button type="button" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sort-down" viewBox="0 0 16 16">
                            <path
                                d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z">
                            </path>
                        </svg>
                    </button>
                    <div class="sep"></div>
                    <button type="button" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sort-up" viewBox="0 0 16 16">
                            <path
                                d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.5.5 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z" />
                        </svg>
                    </button>
                    <?php }else{ ?>
                    <button type="button" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sort-down" viewBox="0 0 16 16">
                            <path
                                d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z">
                            </path>
                        </svg>
                    </button>
                    <div class="sep"></div>
                    <button type="button" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sort-up" viewBox="0 0 16 16">
                            <path
                                d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.5.5 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z" />
                        </svg>
                    </button>
                    <?php } ?>
                </div>
            </div>

            <div class="section">
                <div class="feature">
                    <p>Date</p>
                </div>
                <div class="button_container">
                    <?php if($sorting["date"]==1){ ?>
                    <button type="button" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sort-down" viewBox="0 0 16 16">
                            <path
                                d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z">
                            </path>
                        </svg>
                    </button>
                    <div class="sep"></div>
                    <button type="button" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sort-up" viewBox="0 0 16 16">
                            <path
                                d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.5.5 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z" />
                        </svg>
                    </button>
                    <?php }else if($sorting["date"]==-1){ ?>
                    <button type="button" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sort-down" viewBox="0 0 16 16">
                            <path
                                d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z">
                            </path>
                        </svg>
                    </button>
                    <div class="sep"></div>
                    <button type="button" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sort-up" viewBox="0 0 16 16">
                            <path
                                d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.5.5 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z" />
                        </svg>
                    </button>
                    <?php }else{ ?>
                    <button type="button" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sort-down" viewBox="0 0 16 16">
                            <path
                                d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z">
                            </path>
                        </svg>
                    </button>
                    <div class="sep"></div>
                    <button type="button" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sort-up" viewBox="0 0 16 16">
                            <path
                                d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.5.5 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z" />
                        </svg>
                    </button>
                    <?php } ?>
                </div>
            </div>

            <div class="section">
                <div class="feature">
                    <p>Price</p>
                </div>
                <div class="button_container">
                    <?php if($sorting["rating"]==1){ ?>
                    <button type="button" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sort-down" viewBox="0 0 16 16">
                            <path
                                d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z">
                            </path>
                        </svg>
                    </button>
                    <div class="sep"></div>
                    <button type="button" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sort-up" viewBox="0 0 16 16">
                            <path
                                d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.5.5 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z" />
                        </svg>
                    </button>
                    <?php }else if($sorting["rating"]==-1){ ?>
                    <button type="button" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sort-down" viewBox="0 0 16 16">
                            <path
                                d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z">
                            </path>
                        </svg>
                    </button>
                    <div class="sep"></div>
                    <button type="button" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sort-up" viewBox="0 0 16 16">
                            <path
                                d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.5.5 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z" />
                        </svg>
                    </button>
                    <?php }else{ ?>
                    <button type="button" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sort-down" viewBox="0 0 16 16">
                            <path
                                d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z">
                            </path>
                        </svg>
                    </button>
                    <div class="sep"></div>
                    <button type="button" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-sort-up" viewBox="0 0 16 16">
                            <path
                                d="M3.5 12.5a.5.5 0 0 1-1 0V3.707L1.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.5.5 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L3.5 3.707zm3.5-9a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z" />
                        </svg>
                    </button>
                    <?php } ?>
                </div>
            </div>

            <button class="btn btn-custom1 btn-lg my-2 my-sm-0" type="submit">FILTER</button>
        </div>


        <div class="right_container">
            <div class="specialwrapper">
                <?php foreach($rides as $ride ) { ?>
                <div class="solution_cards_box">
                    <div class="solution_card">
                        <div class="hover_color_bubble"></div>
                        <div class="all_icon_boxes">
                            <div class="icon_box_row">
                                <div class="icon_box">
                                    <div>
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div>
                                        <p>Departure : <?php echo $ride["departure"]; ?></p>
                                    </div>
                                </div>
                                <div class="icon_box">
                                    <div>
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div>
                                        <p>Destination : <?php echo $ride["destination"]; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="icon_box_row">
                                <div class="icon_box">
                                    <div>
                                        <i class="fa-solid fa-clock"></i>
                                    </div>
                                    <div>
                                        <p>Date : <?php echo $ride["date"]; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="icon_box_row">
                                <div class="icon_box">
                                    <div>
                                        <i class="fa-solid fa-person-dress"></i>
                                        <i class="fa-solid fa-person"></i>
                                    </div>
                                    <div>
                                        <p>Free spots : <?php echo $ride["spots"]; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="icon_box_row">
                                <div class="icon_box">
                                    <div>
                                        <p>Rating : </p>
                                    </div>
                                    <div>
                                        <?php for($i=0;$i<$ride["rating"];$i++){?>
                                        <i class="fa-solid fa-star"></i>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="solu_title">
                            <h3><?php echo $ride["driver"]; ?></h3>
                        </div>
                        <div style="display:flex; justify-content:space-between">
                            <div class="solu_description">
                                <button type="button" class="read_more_btn">Read More</button>

                            </div>
                            <div class="text-center">
                                <button type="button" id="delete" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>

    </div>
    <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>About</h6>
                    <p class="text-justify">Welcome to WASSALNI, our Tunisian Carpooling platform! We are dedicated to
                        simplifying your travel experience by connecting riders and drivers across Tunisia.
                        Whether you're looking for a cost-effective way to commute or want to share your journey with
                        others, our platform provides a convenient and eco-friendly solution.</p>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Categories</h6>
                    <ul class="footer-links">
                        <li><a href="#">City-to-City Travel</a></li>
                        <li><a href="#">Regular Commute Routes</a></li>
                        <li><a href="#">Special Events and Occasions</a></li>
                        <li><a href="#">Tourist Destinations</a></li>
                        <li><a href="#">Corporate Travel</a></li>
                        <li><a href="#">Custom Routes</a></li>
                        <li><a href="#">Emergency Travel</a></li>
                    </ul>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="http://scanfcode.com/about/">About Us</a></li>
                        <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
                        <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
                        <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
                        <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">

                    <p class="copyright-text">Copyright &copy; <span id="currentYear"></span> All Rights Reserved by
                        <a href="#">Sup'Com Junior Entreprise</a>.
                    </p>
                    <script>
                    document.getElementById("currentYear").innerHTML = new Date().getFullYear();
                    </script>

                    </p>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    </script>

</body>


</html>