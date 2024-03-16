<?php
session_start();
require 'vendor/autoload.php'; // Include the Google API PHP Client library
include('includes/config.php');

// Set your Google API credentials (consider using environment variables)
$client = new Google_Client();	
$client->setClientId('219925418495-ok81a3alf6r7eijot28d583fpml17u7q.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/Main/login.php');
$client->addScope('email');

// Initialize the Google API client
$service = new Google_Service_Oauth2($client);

// If the user is not authenticated, redirect to Google's login page
if (!isset($_GET['code'])) {
    $auth_url = $client->createAuthUrl();
    header("Location: $auth_url");
    exit;
}

// If the user is authenticated, retrieve user information
$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
$client->setAccessToken($token);

// Retrieve user information
try {
    $user_info = $service->userinfo->get();
    $email = $user_info->getEmail();
    $name = $user_info->getName();

    // Check if the user with this email exists in your system
    $sql_query = "SELECT * FROM tbl_user WHERE email = '$email' AND status = '1'";
    $result = mysqli_query($con, $sql_query);

    if(mysqli_num_rows($result) == 1) {
        // User exists, update session and redirect
        $rows = mysqli_fetch_array($result);
        $_SESSION['user_acc'] = 1;
        $_SESSION['userid'] = $rows['id'];
        header("Location: home.php");
        exit;
    } else {
        // User doesn't exist, insert into the database
        $insert_query = "INSERT INTO tbl_google_login (email, username) VALUES ('$email', '$name')";
        mysqli_query($con, $insert_query);

        // Set session and redirect
        $_SESSION['user_acc'] = 1;
        $_SESSION['userid'] = mysqli_insert_id($con);
        header("Location: home.php");
        exit;
    }
} catch (Exception $e) {
    // Log or display the exception details
    echo "Error: " . $e->getMessage();
    exit;
}
?>
