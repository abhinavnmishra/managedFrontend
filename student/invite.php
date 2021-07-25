<?php require_once "../session/checkSession.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "../htmlParts/header.php"; ?>

</head>
<body class="theme-green" ng-app="myApp" ng-controller="myController">

<?php require_once"../htmlParts/preloader.php"; ?>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<?php require_once"../htmlParts/topBar.php"; ?>

<?php require_once "../htmlParts/sideBarStudent.php"; ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Your Job Invites</h2>
        </div>

        <!-- Vertical Layout -->
        <div class="row clearfix" ng-repeat="x in dto.invites">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            {{x.opening.company}}
                        </h2>
                    </div>
                    <div class="body">
                        <label style="font-size: larger">Company Name : {{x.opening.company}}</label>
                        <br>
                        <label style="font-size: larger">Description : {{x.opening.description}}</label>
                        <br>
                        <label style="font-size: larger">Date of Interview : {{x.opening.date}}</label>
                        <br>
                        <label style="font-size: larger">Status : </label>
                        <br>
                        <button type="button" ng-show="!x.opening.status" class="btn m-t-15 waves-effect bg-orange">In Progress</button>
                        <button type="button" ng-show="x.opening.status && x.status" class="btn m-t-15 waves-effect bg-green">Selected</button>
                        <button type="button" ng-show="x.opening.status && !x.status" class="btn m-t-15 waves-effect bg-red">Not Selected</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Vertical Layout -->




    </div>
</section>

<?php require_once "../htmlParts/scripts.php"; ?>

<script>

    var app = angular.module('myApp', []);
    app.controller('myController', function($scope,$http,$window) {

        $scope.logout = function () {
            let setting = {
                "url": "../session/logout.php",
                "method": "POST",
                "timeout": 0,
                "headers": {},
                "data": {},
            };
            $.ajax(setting).done(function (result) {
                $window.location.href = '../login.php';
            }).fail(function (error) {});
        }

        /*---------------Get Student Info----------------*/

        let getStudentInfoAjaxSettings = {
            "url": "<?php echo $backendServer; ?>student/getStudentInfo",
            "method": "GET",
            "timeout": 0,
            "headers": {
                "Authorization": "Bearer <?php echo $jwt; ?>"
            },
        };

        $scope.dto = {};

        $.ajax(getStudentInfoAjaxSettings).done(function (response) {
            $scope.dto = response;
            $scope.$apply();
        }).fail(function (error) {
            console.log(error);
        });




    });

</script>

</body>
</html>

