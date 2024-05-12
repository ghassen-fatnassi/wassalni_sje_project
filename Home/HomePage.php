<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy9p1bZlXQMlA=..." crossorigin="anonymous">
    <link rel="stylesheet" href="HomePage.css">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <title>Home</title>
</head>

<body>

    <!--navbar-->

    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #DFEEEA;">
        <div class="container-fluid">

            <a class="logo" href="#about">
                <a class="logo" href="#about">
                    <img src="../img/logo4.png" alt="Logo" class="img-fluid" style="max-height: 40px;">
                </a>


                <a class="navbar-brand mr-3" href="#"
                    style="text-decoration: none; color: #2F5D62; text-transform: uppercase; font-weight: 700; font-size: 1.8em;">WASSALNI</a>


                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"
                                style="margin-right: 15px; color: #2F5D62; font-weight: 600; font-size: 1.2em; position: relative;">
                                Home
                                <span class="underline"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about"
                                style="margin-right: 15px; color: #2F5D62; font-weight: 600; font-size: 1.2em; position: relative;">
                                About
                                <span class="underline"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services"
                                style="margin-right: 15px; color: #2F5D62; font-weight: 600; font-size: 1.2em; position: relative;">
                                Services
                                <span class="underline"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../List/ListPage.php"
                                style="margin-right: 15px; color: #2F5D62; font-weight: 600; font-size: 1.2em; position: relative;">
                                List
                                <span class="underline"></span>
                            </a>
                        </li>
                    </ul>


                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="../Sign/SignIn.php" class="btn btn-signup mr-2 mb-2 mb-md-0"
                                style="font-size:1.1em ;">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a href="../Sign/SignIn.php" class="btn btn-custom " style="font-size:1.1em ;">Sign In</a>
                        </li>
                    </ul>
                </div>
        </div>
    </nav>

    <!--home-->
    <div class="cnt">
        <div class="content">
            <h1><br><br>Are You Looking For a <span class="color" style="display:flex;align-items:end"> Carpool ?</span>
            </h1>
            <h1><span class="color">Don't worry</span>, with <span id="wasselni" class="color">WASSELNI</span></h1>
            <h1> you can get a lift to <span class="multiple-text">Tunis</span></h1>
            <div>
                <button type="button" class="btn-left"><span></span>LEARN MORE</button>
                <a href="../List/ListPage.php">
                    <button type="button" class="btn-right"><span></span>SEARCH</button>
                </a>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <script>
    var typed = new Typed(".multiple-text", {
        strings: ["Tunis", "Nabeul", "El Kef", "Sfax", "Gabes"],
        typespeed: 100,
        backspeed: 100,
        backdelay: 100,
        loop: true
    })
    </script>


    <!-- Section 1-->

    <section id="about">
        <h1>About us</h1>

        <div class="container mt-5 ">
            <div class="d-flex justify-contents-center">
                <div class="cardss cardss-custom w-100" data-aos="fade-up" data-aos-duration="1000">
                    <div class="cardss-header cardss-header-custom text-center">
                        WASSALNI
                    </div>
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <img src="../img/illustrationcard1.png" class="cardss-img" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="cardss-body cardss-body-custom" style="height: 400px;">
                                <h5 class="cardss-title">Ready for your next adventure?</h5>
                                <p class="cardss-text">Book a ride to your destination with ease. Explore new places and
                                    meet new people as you travel with WASSALNI. Your journey starts here!</p>
                                <a href="#" class="btn btn-custom">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Card for Carpooling Alone Offer -->
        <div class="container mt-5">
            <div class="d-flex justify-content-center">
                <div class="cardss cardss-custom w-100" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="200">
                    <div class="cardss-header cardss-header-custom text-center">
                        Carpooling Alone - Special Offer
                    </div>
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <div class="cardss-body cardss-body-custom" style="height: 400px;">
                                <h5 class="cardss-title">Travel Solo, Save More!</h5>
                                <p class="cardss-text">Enjoy the comfort of carpooling alone with a 10% discount. Your
                                    private journey awaits at a lesser cost. Book your ride today and explore with
                                    WASSALNI.</p>
                                <a href="#" class="btn btn-custom">Book Now</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="../img/illustrationcard2.png" class="cardss-img" alt="...">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner -->

    <div id="search">
        <div class="ctn_search">
            <div class="form_text">
                <h1>find</h1>
                <p>A <span class="text-right">Carpool</span>
                </p>
            </div>
            <form action="" class="search-form">
                <div class="input-wrapper">
                    <label for="Departure" class="input-label">Departure</label>
                    <input type="text" name="Departure" id="Departure" placeholder="Tunis" required class="input-field">
                </div>
                <div class="input-wrapper">
                    <label for="destination" class="input-label">Destination</label>
                    <input type="text" name="destination" id="destination" placeholder="Sfax" required
                        class="input-field">
                </div>
                <div class="input-wrapper">
                    <label for="date" class="input-label">Date</label>
                    <input type="date" name="date" id="date" required class="input-field">
                </div>
                <div class="input-wrapper">
                    <label for="people" class="input-label">Nb People</label>
                    <input type="number" name="people" id="people" placeholder="1" required class="input-field">
                </div>
                <div>
                    <button type="submit" class="btn"><span></span>Search</button>
                </div>

            </form>
        </div>
    </div>



    <!-- Section 2 -->

    <h1 id="services">Nos Services</h1>
    <div class="cards">
        <div class="card_">
            <div class="icon">
                <i class="fa-solid fa-coins"></i>
            </div>
            <div class="info">
                <h3>Vos trajets préférés à petits prix</h3>
                <p>
                    Où que vous alliez,
                    en bus ou en covoiturage,
                    trouvez le trajet idéal parmi
                    notre large choix de destinations
                    à petits prix. </p>
            </div>
        </div>
        <div class="card_">
            <div class="icon">
                <i class="fa-solid fa-id-card-clip"></i>
            </div>
            <div class="info">
                <h3>Voyagez en toute confiance</h3>
                <p> Nous prenons le temps qu’il
                    faut pour connaître nos membres
                    et nos compagnies de bus partenaires.
                    Nous vérifions les avis, les profils
                    et les pièces d’identité.
                    Vous savez donc avec qui vous allez
                    voyager pour réserver en toute
                    confiance sur notre plateforme sécurisée.</p>
            </div>
        </div>
        <div class="card_">
            <div class="icon">
                <i class="fa-solid fa-bolt"></i>
            </div>
            <div class="info">
                <h3>Recherchez, cliquez et réservez !</h3>
                <p>
                    Réserver un trajet devient encore plus simple !
                    Facile d'utilisation et dotée
                    de technologies avancées, notre appli vous
                    permet de réserver un trajet à proximité en
                    un rien de temps.</p>
            </div>
        </div>

    </div>
    </div>




    <!-- Footer-->

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









    <script src="https://kit.fontawesome.com/8f9fbcf02f.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-d6d9jnODePxx6vz1npZWVQ/WW3iA4iIw6L/5aYSzjz4uuzp/f7ZSHwuOJCLuLNTZ" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy9p1bZlXQMlA=..." crossorigin="anonymous"></script>
    <script>
    AOS.init();
    </script>
    <script>
    AOS.init();
    </script>

</body>

</html>