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

<?php require_once "../htmlParts/sideBarAdmin.php"; ?>



<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                REPORT
                <small>The below pie chart represents the top 4 most common technical skills that the students have in the college.</a></small>
            </h2>
        </div>


        <div class="row clearfix">

            <!-- Pie Chart -->
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>SKILL PERCENTAGE</h2>
                    </div>
                    <div class="body">
                        <canvas id="pie_chart" height="150"></canvas>
                    </div>
                </div>
            </div>
            <!-- #END# Pie Chart -->
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular-animate.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular-aria.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular-messages.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.22/angular-material.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/ngMask/3.1.1/ngMask.min.js"></script>

<!-- Jquery Core Js -->
<script src="../plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="../plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="../plugins/node-waves/waves.js"></script>

<!-- Chart Plugins Js -->
<script src="../plugins/chartjs/Chart.bundle.js"></script>

<!-- Custom Js -->
<script src="../js/admin.js"></script>
<script src="chartjs.js"></script>

<!-- Demo Js -->
<script src="../js/demo.js"></script>
</body>

</html>


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

        /*---------------Show Table----------------*/



    });

</script>

</body>
</html>
