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
            <h2>DASHBOARD</h2>
        </div>

        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            NEW OPENING
                        </h2>
                    </div>
                    <div class="body">
                        <label>Company Name</label>
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" ng-model="company" id="company" class="form-control" placeholder="Company Name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label>Description</label>
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" ng-model="description" id="desc" class="form-control" placeholder="Description">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label for="date">Interview Date(dd/mm/yyyy)</label>
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                    <div class="form-line" id="bs_datepicker_container">
                                        <input type="date" ng-model="date" class="datepicker form-control" id="date" placeholder="Please choose a date...">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <label>Select Skills</label>
                        <br>
                        <br>
                        <span ng-repeat="x in dto.skills" class="demo-checkbox">
                                <input type="checkbox" name="skillList" id="{{x}}" class="chk-col-red"/>
                                <label for="{{x}}">{{x.replace('_', ' ').charAt(0).toUpperCase() + x.replace('_', ' ').substr(1).toLowerCase()}}</label>
                            </span>
                        <br>
                        <br>
                        <label>Enter Minimum CGPA</label>
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" ng-model="gpa" id="gpa" class="form-control" placeholder="Minimum CGPA">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary m-t-15 waves-effect" ng-click="showCandidates()">SHOW ELIGIBLE CANDIDATES</button>

                        <span ng-show="option == 1">
                        <div class="header">
                            <h2>
                                MARK THE SELECTED CANDIDATES
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="checkAll" name="checkAll" class="filled-in chk-col-blue" ng-click="checkAll()"/>
                                            <label for="checkAll"></label>
                                        </th>
                                        <th>Name</th>
                                        <th>USN</th>
                                        <th>Department</th>
                                        <th>Year of Graduation</th>
                                        <th>Email</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="checkAll2" name="checkAll" class="filled-in chk-col-blue" ng-click="checkAll()"/>
                                            <label for="checkAll2"></label>
                                        </th>
                                        <th>Name</th>
                                        <th>USN</th>
                                        <th>Department</th>
                                        <th>Year of Graduation</th>
                                        <th>Email</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <tr ng-repeat = "y in studentList">
                                        <td>
                                            <input type="checkbox" id="{{y.id}}" name="studentList" class="filled-in chk-col-blue" value="{{y.id}}"/>
                                            <label for="{{y.id}}"></label>
                                        </td>
                                        <td>{{y.firstName + " " + y.lastName}}</td>
                                        <td>{{y.account.username}}</td>
                                        <td>{{y.department}}</td>
                                        <td>{{y.year}}</td>
                                        <td>{{y.email}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button type="button" id="createOpeningId" class="btn btn-primary m-t-15 waves-effect" ng-click="createOpening()">CREATE</button>
                        </span>

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

        /*---------------Get All Info----------------*/

        let getAllInfoAjaxSettings = {
            "url": "<?php echo $backendServer; ?>admin/getAllStats",
            "method": "GET",
            "timeout": 0,
            "headers": {
                "Authorization": "Bearer <?php echo $jwt; ?>"
            },
        };

        $scope.dto = {};

        $.ajax(getAllInfoAjaxSettings).done(function (response) {
            $scope.dto = response;
            $scope.$apply();
            console.log($scope.dto)
        }).fail(function (error) {
            console.log(error);
        });

        /*---------------Show Table----------------*/
        $scope.option = -1
        $scope.studentList = [];

        $scope.showCandidates = function(){

            $scope.option = 1;
            //$scope.$apply();

            $scope.skillList = [];
            $.each($("input[name='skillList']:checked"), function(){
                $scope.skillList.push($(this).attr('id'));
                //$scope.$apply();
            });

            $scope.queryStudents = {};
            $scope.queryStudents.gpa = $scope.gpa;
            $scope.queryStudents.skills = $scope.skillList;

            let queryStudentsAjaxSettings = {
                "url": "<?php echo $backendServer; ?>admin/queryStudents",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Authorization": "Bearer <?php echo $jwt; ?>",
                    "Content-Type": "application/json"
                },
                "data": JSON.stringify($scope.queryStudents),
            };

            $.ajax(queryStudentsAjaxSettings).done(function (response) {
                $scope.studentList = response;
                $scope.$apply();
                console.log($scope.studentList)
            }).fail(function (error) {
                console.log(error);
            });

        }

        /*---------------Table Functions----------------*/

        $scope.check = function(){
            $("#37").attr('checked', true);
        }

        $scope.checkAll = function () {
            if($("input[name='checkAll']:checked").length != 0){

                console.log($("input[name='checkAll']:checked").length);
                for($scope.i = 0;$scope.i<$("input[name='checkAll']").length;$scope.i++)
                    $.each($("input[name='studentList']"), function(){
                        $(this).prop('checked', true);
                        console.log($(this).attr('checked'));
                        //$scope.$apply();
                    });
            }
            else{
                console.log($("input[name='checkAll']:checked").length);
                $.each($("input[name='studentList']"), function(){
                    $(this).prop('checked', false);
                    console.log($(this).attr('checked'));
                    //$scope.$apply();
                });
            }

        }

        /*---------------Update Opening----------------*/

        $scope.idList = [];
        $scope.createOpening = function () {
            $('#createOpeningId').val("Creating..").attr("disabled", true);
            $scope.idList = [];
            $.each($("input[name='studentList']:checked"), function(){
                $scope.idList.push($(this).val());
                //$scope.$apply();
            });
            console.log($scope.idList);

            $scope.createDto = {};
            $scope.createDto.id = null;
            $scope.createDto.company = $scope.company;
            $scope.createDto.description = $scope.description;
            $scope.createDto.studentIdList = $scope.idList;
            $scope.createDto.date = $scope.date;
            $scope.createDto.status = false;

            let createOpeningAjaxSettings = {
                "url": "<?php echo $backendServer; ?>admin/createOpening",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Authorization": "Bearer <?php echo $jwt; ?>",
                    "Content-Type": "application/json"
                },
                "data": JSON.stringify($scope.createDto),
            };

            $.ajax(createOpeningAjaxSettings).done(function (response) {

                notification("Opening Created Successfully", "bg-green");
                $window.location.href = "index.php";


            }).fail(function (error) {
                $('#createOpeningId').val("CREATE").attr("disabled", false);
                notification("Failed to create!", "bg-red");
            });

        }

    });

</script>

</body>
</html>
