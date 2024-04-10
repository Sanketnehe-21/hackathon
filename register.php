<?php
include 'config.php';


$msg = "";

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));
    $code = mysqli_real_escape_string($conn, md5(rand()));

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
        $msg = "<div class='alert alert-danger'>{$email} - This email address has already been registered.</div>";
    } else {
        if ($password === $confirm_password) {
            $sql = "INSERT INTO users (name, email, password, code) VALUES ('{$name}', '{$email}', '{$password}', '{$code}')";
            $result = mysqli_query($conn, $sql);
            if ($result === false) {
                die(mysqli_error($conn)); // Print the error message and exit script
            }
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location:page.php");
                exit();
            } else {
                $msg = "<div class='alert alert-danger'>Error: Registration failed. Please try again.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link rel="stylesheet" href="style5.css">
    <link rel="stylesheet" href="style2.css">
    <script src="main.js" type="text/javascript"></script>
</head>
<body>
<header class="header sticky">
    <p style="font-size: 2rem; font-weight: 600;" class="logo">Reintegrate360</p>
    <nav class="main-nav">
        <ul class="main-nav-list">
            <li class="main-nav-link" onclick="window.location.href='index1.html'">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="head-icon"
                >
                    <!-- SVG path for home icon -->
                </svg>
                Home
            </li>
            <li class="main-nav-link">
                <a href="#price" class="main-nav-link">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="head-icon"
                    >
                    </svg>
                    About us
                </a>
            </li>
        </ul>
    </nav>
    <button class="btn-mob-nav">
        <ion-icon class="icon-mob" name="menu-outline"></ion-icon>
        <ion-icon class="icon-mob" name="close-outline"></ion-icon>
    </button>
</header>
<div class="container">
    <img src="img/2914527.jpg" alt="" class="img2" />
    <div id="LoginAndRegistrationForm1">

        <h1 id="formTitle">Registration</h1>
        <div id="RegistrationFrom">
            <?php echo $msg; ?>
            <form action="" method="post">
                <div class="center">
                    <input id="RegiName" class="input-text" type="text" placeholder="Full Name" name="name" value="<?php if (isset($_POST['submit'])) { echo $name; } ?>">
                    <input id="RegiEmailAddres" class="input-text mt-10" type="email" placeholder="Email Address" name="email"value="<?php if (isset($_POST['submit'])) { echo $email; } ?>">
                    <input id="RegiPassword" class="mt-10 input-text" type="password" placeholder="Password" name="password">
                    <input id="RegiConfirmPassword" class="mt-10 input-text" type="password" placeholder="Confirm Password" name="confirm-password">
                </div>
                <div class="center mt-20">
                    <input onclick="return ValidateRegistrationForm();" class="Submit-Btn" type="submit" value="Registration" name="submit" id="RegistrationitBtn" style="background-color:#04AA6D">
                </div>
            </form>
            <p class="center mt-20 already-have-account">
                Already have an account? 
                <a href="page.php">Login now</a>
            </p>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.onload = function() {
        ShowRegistrationForm();
    };
</script>
<script type="text/javascript">
    function resetForm() {
        document.getElementById("RegiName").value = "";
        document.getElementById("RegiEmailAddres").value = "";
        document.getElementById("RegiPassword").value = "";
        document.getElementById("RegiConfirmPassword").value = "";
    }
</script>
</body>
</html>
