<?php
session_start();
if(isset($_SESSION['jwt']) && isset($_SESSION['role'])) {
    if($_SESSION['role'] == "ROLE_ADMIN") {
        header('Location: admin/index.php');
    } else if($_SESSION['role'] == "ROLE_STUDENT") {
        header('Location: student/index.php');
    } else {
        header('Location: ../login.php');
    }
    exit;
}
require_once "htmlParts/credentials.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title></title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Themes-->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
    <style>
        .myFont {
            font-family: Baskerville;
            font-style: italic;
            font-size: 60px;
        }
    </style>

</head>

<body class="login-page bg-white" style="background-image: linear-gradient(rgba(0, 0, 0, .2),
                   rgba(0, 0, 0, .2)),url('images/login-2.png'); background-repeat: no-repeat; background-position: -250px 0px; background-size: 1845px 830px;" ng-app="myApp" ng-controller="formCtrl">

<div class="login-box">
    <div class="card" style="width: 450px; height: 600px; margin-left: -15%; margin-top: 55px;">
        <div class="body">
            <form id="sign_in" method="POST"  name="mainForm">
                <div class="msg"><b style="text-transform: capitalize;">Please enter your details</b></div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                        <input  type="text" class="form-control" ng-model="student.username" name="username" placeholder="USN" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        </span>
                    <div class="form-line">
                        <input  type="text" class="form-control" ng-model="student.firstName" name="fname" placeholder="First Name" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        </span>
                    <div class="form-line">
                        <input  type="text" class="form-control" ng-model="student.lastName" name="lname" placeholder="Last Name" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        </span>
                    <div class="form-line">
                        <input  type="text" class="form-control" ng-model="student.email" name="email" placeholder="Email" required autofocus>
                        <span style="color: red" class="error" ng-show="mainForm.email.$error.pattern">Please enter a valid email</span>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        </span>
                    <div class="form-line">
                        <input  type="text" class="form-control" ng-model="student.department" name="dep" placeholder="Department" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                        </span>
                    <div class="form-line">
                        <input  type="number" class="form-control" ng-model="student.year" name="year" placeholder="Year Of Graduation" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <input type="password" class="form-control" ng-model="student.password" ng-minlength="1" name="password" placeholder="Password" required>
                    </div>
                    <span style="color: red" class="error" ng-if="invalid==1">Oops! Some error occured</span>
                </div>
                <div class="row text-center">
                    <div class="col-xs-12 text-center">
                        <input class="btn btn-block bg-grey waves-effect" type="submit" id="loginButton" value="Create Account"
                               ng-disabled="mainForm.$invalid" ng-click="create(student)"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="plugins/jquery-countto/jquery.countTo.js"></script>

<!-- ChartJs -->
<script src="plugins/chartjs/Chart.bundle.js"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/index.js"></script>

<script>

    var app = angular.module('myApp', []);
    app.controller('formCtrl', function($scope,$http,$window) {

        $scope.invalid = 0;

        $scope.create=function(student) {

            $("#loginButton").val("Creating Account...").attr("disabled", true);

            let settings = {
                "url": "<?php echo $backendServer; ?>open/createStudent",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"
                },
                "data": JSON.stringify(student),
            };

            $.ajax(settings).done(function (response) {

                $("#loginButton").val("Success!");
                $window.location.href = "login.php";

            }).fail(function (error) {
                $scope.invalid = 1;
                $scope.$apply();
                // toastr["error"](err.responseJSON.errorMessage,"Login Failed");
                $("#loginButton").val("Login to Dashboard").attr("disabled", false);
            });
        }
    });

</script>
</body>
</html>