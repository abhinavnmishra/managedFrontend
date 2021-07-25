<?php
require_once "../htmlParts/credentials.php";
$jwt = file_get_contents('php://input');

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => $backendServer."account/getAccountInfo",
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

$jsonResponse=json_decode($response);

$userId=$jsonResponse->id;
$userRole=$jsonResponse->roles[0];
$username=$jsonResponse->username;

//header('Content-Type: application/json');

session_start();

if($userRole == "ROLE_ADMIN") {
    $curl1 = curl_init();
    curl_setopt_array($curl1, array(
        CURLOPT_URL => $backendServer."admin/getAdminInfo",
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
    $response = curl_exec($curl1);
    echo curl_error($curl1);
    curl_close($curl1);
    $jsonResponse=json_decode($response);
    $adminFirstName=$jsonResponse->firstName;
    $adminLastName=$jsonResponse->lastName;
    $adminEmail=$jsonResponse->email;
    $_SESSION["adminFirstName"]=$adminFirstName;
    $_SESSION["adminLastName"]=$adminLastName;
    $_SESSION["email"]=$adminEmail;

}

elseif ($userRole == "ROLE_STUDENT"){
    $curl2 = curl_init();
    curl_setopt_array($curl2, array(
        CURLOPT_URL => $backendServer."student/getStudent",
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

    $response = curl_exec($curl2);
    echo curl_error($curl2);
    curl_close($curl2);
    $jsonResponse=json_decode($response);
    $studentFirstName=$jsonResponse->firstName;
    $studentLastName=$jsonResponse->lastName;
    $studentId=$jsonResponse->id;
    $studentEmail=$jsonResponse->email;
    $_SESSION["studentId"]=$studentId;
    $_SESSION["studentFirstName"]=$studentFirstName;
    $_SESSION["studentLastName"]=$studentLastName;
    $_SESSION["email"]=$studentEmail;
}


$_SESSION["jwt"]=$jwt;
$_SESSION["role"]=$userRole;
$_SESSION["username"]=$username;

session_commit();

echo $userRole;
?>
