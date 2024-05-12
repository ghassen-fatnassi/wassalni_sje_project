<?php 
$conn = mysqli_connect("localhost", "root", "", "wassalni");
if (!$conn) {
  die("no connection");
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    //$query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    //$stmt = mysqli_prepare($conn,$query);
    //$stmt->bind_param("sss", $username, $email, $password);
    //$stmt->execute();
	//$stmt->close();
    $query="INSERT INTO users (username, email, password) VALUES ('$username','$email','$password')";
    $result=$conn->query($query);
    var_dump($result);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="SignIn.css">


    <title>Sign In</title>
</head>

<body>
    <div class="container right-panel-active">
        <!-- Sign Up -->
        <div class="container__form container--signup">
            <form method="POST" action="#" class="form" id="form1">
                <h2 class="form__title">Sign Up</h2>
                <input type="text" name="username" placeholder="User" class="input" />
                <input type="email" name="email" placeholder="Email" class="input" />
                <input type="password" name="password" placeholder="Password" class="input" />
                <button type="submit" class="btn">Sign Up</button>
            </form>
        </div>

        <!-- Sign In -->
        <div class="container__form container--signin">
            <form action="#" class="form" id="form2">
                <h2 class="form__title">Sign In</h2>
                <input type="email" placeholder="Email" class="input" />
                <input type="password" placeholder="Password" class="input" />
                <a href="../Home/HomePage.php" class="link">Forgot your password?</a>
                <button class="btn">Sign In</button>
            </form>
        </div>

        <!-- Overlay -->
        <div class="container__overlay">
            <div class="overlay">
                <div class="overlay__panel overlay--left">
                    <button class="btn" id="signIn">Sign In</button>
                </div>
                <div class="overlay__panel overlay--right">
                    <button class="btn" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script>
    const signInBtn = document.getElementById("signIn");
    const signUpBtn = document.getElementById("signUp");
    const fistForm = document.getElementById("form1");
    const secondForm = document.getElementById("form2");
    const container = document.querySelector(".container");

    signInBtn.addEventListener("click", () => {
        container.classList.remove("right-panel-active");
    });

    signUpBtn.addEventListener("click", () => {
        container.classList.add("right-panel-active");
    });

    fistForm.addEventListener("submit", (e) => e.preventDefault());
    secondForm.addEventListener("submit", (e) => e.preventDefault());
    </script>
</body>

</html>