<?php
include('class/user.class.php');
$user = new User();

if (isset($_GET['v'])) {
    $errorMsg = $_GET['v'];
}

@session_start();
if (isset($_POST['submit'])) {
    $user->set('fullname', $_POST['fullname']);

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $invalidEmail = "Invalid Email Format!";
    } elseif (strlen($_POST['phone']) != 10) {
        $invalidPhone = "Invalid Phone Number Length!";
    } elseif ($_POST['phone'] == "^(98[4-9]|97[7-9]|96[6-9])\d{7}$") {
        $invalidPhone = "Invalid Number Format";
    } elseif (strlen($_POST['password']) < 8) {
        $invalidPasswordLength = "Minimum Password Length is 8!";
    } elseif (($_POST['password']) != ($_POST['confirmPassword'])) {
        $invalidPassword = "Password Doesn't Match!";
    } else {
        $user->set('email', $_POST['email']);
        $user->set('age', $_POST['age']);
        $user->set('phone', $_POST['phone']);
        $user->set('gender', $_POST['gender']);
        $user->set('occupation', $_POST['fullname']);
        $user->set('area', $_POST['area']);
        $user->set('address', $_POST['address']);
        $user->set('password', $_POST['password']);

        $user->save();
        // if (is_integer($result)) {
        //     $ErrMs = "";
        //     $msg = "Registered Successfully with id " . $result;
        // } else {
        //     $msg = "";
        // }
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <title>User Registration Form</title>
</head>

<body>


    <div id="wrapper">



        <?php if (isset($ErrMsg)) { ?>
            <div class="alert-container">
                <div class="alert alert-danger"><?php echo $ErrMsg;  ?> <button class="alertTerminator" onclick="alertCloser()"><i class="bx bx-x"></i></button> </div>
            </div> <?php  } ?>

        <div class="container">
            <header>Registration</header>

            <form action="#" method="post" novalidate>
                <div class="form first">
                    <div class="details personal">
                        <span class="title">Personal Details</span>

                        <div class="fields">
                            <div class="input-field">
                                <label>Full Name</label>
                                <input type="text" placeholder="Enter your name" name="fullname" required>
                            </div>

                            <div class="input-field">
                                <label>Age</label>
                                <input type="number" placeholder="Enter your age" name="age" required>
                            </div>

                            <div class="input-field">
                                <label>Email</label>
                                <input type="email" placeholder="Enter your email" name="email" required>
                                <?php if (isset($invalidEmail)) { ?>
                                    <small> <?php echo $invalidEmail ?></small>
                                <?php } ?>
                            </div>

                            <div class="input-field">
                                <label>Mobile Number</label>
                                <input type="number" placeholder="Enter mobile number" name="phone" required>
                                <?php if (isset($invalidPhone)) { ?>
                                    <small> <?php echo $invalidPhone ?></small>
                                <?php } ?>

                            </div>

                            <div class="input-field">
                                <label>Gender</label>
                                <select name="gender" required>
                                    <option disabled selected>Select gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>

                            <div class="input-field">
                                <label>Occupation</label>
                                <select name="occupation" required>
                                    <option disabled selected>Select your occupation</option>
                                    <option>Plumber</option>
                                    <option>Electrician</option>
                                    <option>Painter</option>
                                    <option>Carpenter</option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="details ID">
                        <span class="title">Address Details</span>

                        <div class="fields">
                            <div class="input-field">
                                <label>Area</label>
                                <select name="area" required>
                                    <option disabled selected>Select your area</option>
                                    <option>Thankot</option>
                                    <option>Kalanki</option>
                                    <option>Gurujudhara</option>
                                    <option>Bafal</option>
                                </select>
                            </div>

                            <div class="input-field">
                                <label>Full Address</label>
                                <input type="text" placeholder="Enter your address" name="address" required>
                            </div>
                        </div>


                    </div>
                    <div class="details PASSWORD">
                        <span class="title">Password Details</span>

                        <div class="fields">
                            <div class="input-field">
                                <label>Create Password</label>
                                <input type="password" id="passwordField" name="password" placeholder="Create new password" required>

                            </div>

                            <div class="input-field">
                                <label>Confirm Password</label>
                                <input type="password" id="passwordField2" name="confirmPassword" placeholder="Re-enter password" required>
                                <?php if (isset($invalidPassword)) { ?>
                                    <small> <?php echo $invalidPassword ?></small>
                                <?php } ?>
                            </div>
                            <div class="input-field show-password">
                                <input type="checkbox" id="passwordToggler" onclick="togglePassword()"> <label for="passwordToggler">Show
                                    Password</label>
                            </div>
                        </div>


                    </div>


                    <button class="nextBtn" type="submit" name="submit">
                        <span class="btnText">Submit</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div>

            </form>

        </div>



    </div>
    <script src="js/script.js"></script>
</body>

</html>