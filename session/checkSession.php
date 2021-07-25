<?php
require_once "../htmlParts/credentials.php";
session_start();
if(!isset($_SESSION['jwt'])) {
    header('Location: ../login.php');
    exit;
}

if(isset($_SESSION['role'])) {
    if($_SESSION['role']!="ROLE_ADMIN" && $_SESSION['role']!="ROLE_STUDENT") {
        session_destroy();
        session_commit();
        header("Location: ../login.php");
        exit;
    }
} else {
    session_destroy();
    session_commit();
    header('Location: ../login.php');
    exit;
}

$jwt=$_SESSION['jwt'];
$email=$_SESSION['email'];
$userRole=$_SESSION["role"];


$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => $backendServer."account/isAuthenticated",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer $jwt"
    ),
));

$response = curl_exec($curl);

curl_close($curl);

if($response!="true") {
    session_destroy();
    session_commit();
    header('Location: ../login.php');
    exit;
}
?>