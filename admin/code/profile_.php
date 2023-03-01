<?php
include '../connect.php';
if (isset($_POST['user_id'])) {
    // personal
    $user_id = $_POST['user_id'];
    $name_f = $_POST['name_f'];
    $name_l = $_POST['name_l'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $profile = $_FILES['profile']['name'];
    $profile_tmp = $_FILES['profile']['tmp_name'];
    move_uploaded_file($profile_tmp, "../profiles/$profile");

    // billing
    $company = (isset($_POST['company'])) ? $_POST['company'] : "";
    $tax_id = (isset($_POST['tax_id'])) ? $_POST['tax_id'] : "";


    $update_user = mysqli_query($con, "UPDATE admin SET name_f='$name_f',name_l='$name_l',email='$email',password='$password',profile='$profile' WHERE user_id='$user_id' ");
    if ($update_user) {
        echo "<script>alert('Profile Updated !');location.replace('../profile.php')</script>";
    } else {
        echo "<script>alert('Sorry :( ');location.replace('../profile.php')</script>";
    }
}
