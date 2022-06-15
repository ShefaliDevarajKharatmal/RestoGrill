<?php
    $con = mysqli_connect('localhost', 'root', '');

    if(!$con)
    {
        echo 'Not connected to server';
    }

    if(!mysqli_select_db($con, 'checkout'))
    {
        echo 'Database not selected';
    }

    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $name = $_POST['name'];
    $cardno = $_POST['cardno'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $cvv = $_POST['cvv'];

    $sql = "INSERT INTO user_info (fname, email, address, city, state, zip, name, cardno, month, year, cvv)VALUES ('$fname', '$email', '$address', '$city', '$state', '$zip', '$name', '$cardno', '$month', '$year', '$cvv')";

    if(!mysqli_query($con, $sql))
    {
        echo 'Unsucessful';
    }
    else
    {
        echo 'Successful';
    }
    header("refresh:2; url = index.php");
    ?>