<?php


// $emailEx = " /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/ ";



$email = "12345@gmail.com";


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email: " . $email;
} else {
    echo "Valid Email: " . $email;
}
