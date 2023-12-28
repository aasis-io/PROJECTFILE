<?php

if (isset($_POST['submit'])) {

    // function validateNepaliPhoneNumber($phoneNumber)
    // {
    //     $pattern = '/^(98[4-9]|97[7-9]|96[6-9])\d{7}$/';
    //     return preg_match($pattern, $phoneNumber);
    // }

    // // Example usage:
    $phoneNumberToValidate = $_POST['phone']; // Replace with the actual phone number you want to validate

    // if (validateNepaliPhoneNumber($phoneNumberToValidate)) {
    //     $validPhone = "The phone number is valid.";
    // } else {
    //     $invalidPhone = "Invalid phone number.";
    // }

    $pattern = '/^(98[4-9]|97[7-9]|96[6-9])\d{7}$/';

    if (!preg_match($pattern, $phoneNumberToValidate)) {
        $invalidPhone = "Invalid phone number.";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php if (isset($invalidPhone)) { ?>

        <small style="color:red;"> <?php echo $invalidPhone; ?></small>


    <?php  }  ?>
    <?php if (isset($validPhone)) { ?>

        <small style="color:red;"> <?php echo $validPhone; ?></small>


    <?php  }  ?>

    <form action="" method="post" novalidate>
        <input type="number" name="phone" id="">
        <button type="submit" name="submit">Submit</button>
    </form>
</body>

</html>