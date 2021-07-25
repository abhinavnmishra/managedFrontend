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
        <div class="row clearfix" ng-repeat="x in dto.openings">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            {{x.company}}
                        </h2>
                    </div>
                    <div class="body">
                            <label>Company Name</label>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" ng-model="x.company" id="company_{{x.id}}" class="form-control" placeholder="Company Name" value="{{x.company}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label>Description</label>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" ng-model="x.description" id="desc_{{x.id}}" class="form-control" placeholder="Description" value="{{x.description}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="date_{{x.id}}">Interview Date(dd/mm/yyyy)</label>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                        <div class="form-line" id="bs_datepicker_container">
                                            <input type="date" ng-model="x.date" class="datepicker form-control" id="date_{{x.id}}" placeholder="Please choose a date..." value="{{x.date}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <label style="font-size: larger">Status : </label>
                        <br>
                        <button type="button" ng-show="!x.status" class="btn m-t-15 waves-effect bg-orange">In Progress</button>
                        <button type="button" ng-show="x.status" class="btn m-t-15 waves-effect bg-success">Completed</button>

                        <button type="button" class="btn btn-primary m-t-15 waves-effect" ng-click="update(x.id)">UPDATE</button>

                        <span ng-show="x.id == option">
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
                                            <input type="checkbox" id="checkAll{{x.id}}" name="checkAll{{x.id}}" class="filled-in chk-col-blue" ng-click="checkAll()"/>
                                            <label for="checkAll{{x.id}}"></label>
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
                                            <input type="checkbox" id="checkAll2{{x.id}}" name="checkAll{{x.id}}" class="filled-in chk-col-blue" ng-click="checkAll()"/>
                                            <label for="checkAll2{{x.id}}"></label>
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
                                            <input type="checkbox" id="{{x.id.toString() + y.id.toString()}}" name="studentList{{x.id}}" class="filled-in chk-col-blue" value="{{y.id}}"/>
                                            <label for="{{x.id.toString() + y.id.toString()}}"></label>
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
                        <button type="button" id="updateId" class="btn btn-primary m-t-15 waves-effect" ng-click="updateStudentList(x)">SAVE</button>
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

        $scope.update = function(op){

            $scope.option = op;
            //$scope.$apply();

            let getAllInfoAjaxSettings = {
                "url": "<?php echo $backendServer; ?>admin/getAllStudentsByOpeningId?id="+op,
                "method": "GET",
                "timeout": 0,
                "headers": {
                    "Authorization": "Bearer <?php echo $jwt; ?>"
                },
            };

            $.ajax(getAllInfoAjaxSettings).done(function (response) {
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
            $scope.name = 'checkAll' + $scope.option.toString();
            $scope.listName = 'studentList' + $scope.option.toString();
            if($("input[name="+ $scope.name +"]:checked").length != 0){

                console.log($("input[name="+ $scope.name +"]:checked").length);
                for($scope.i = 0;$scope.i<$("input[name="+ $scope.name +"]").length;$scope.i++)
                    $.each($("input[name="+ $scope.listName +"]"), function(){
                        $(this).prop('checked', true);
                        console.log($(this).attr('checked'));
                        //$scope.$apply();
                    });
            }
            else{
                console.log($("input[name="+ $scope.name +"]:checked").length);
                $.each($("input[name="+ $scope.listName +"]"), function(){
                    $(this).prop('checked', false);
                    console.log($(this).attr('checked'));
                    //$scope.$apply();
                });
            }

        }

        /*---------------Update Opening----------------*/

        $scope.idList = [];
        $scope.updateStudentList = function (obj) {
            $('#updateId').val("Updating..").attr("disabled", true);
            $scope.listName = 'studentList' + $scope.option.toString();
            $scope.idList = [];
            $.each($("input[name="+ $scope.listName +"]:checked"), function(){
                $scope.idList.push($(this).val());
                //$scope.$apply();
            });
            console.log($scope.idList);

            $scope.updateDto = {};
            $scope.updateDto.id = obj.id;
            $scope.updateDto.company = obj.company;
            $scope.updateDto.description = obj.description;
            $scope.updateDto.studentIdList = $scope.idList;
            $scope.updateDto.date = obj.date;
            $scope.updateDto.status = true;

            let updateAjaxSettings = {
                "url": "<?php echo $backendServer; ?>admin/updateOpening",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Authorization": "Bearer <?php echo $jwt; ?>",
                    "Content-Type": "application/json"
                },
                "data": JSON.stringify($scope.updateDto),
            };

            $.ajax(updateAjaxSettings).done(function (response) {

                $('#updateId').val("SAVE").attr("disabled", false);

                $.ajax(getAllInfoAjaxSettings).done(function (response) {
                    $scope.dto = response;
                    $scope.$apply();

                }).fail(function (error) {
                    console.log(error);
                });

                $scope.option = -1;

                notification("Opening Status Updated", "bg-green");


            }).fail(function (error) {
                $('#updateId').val("SAVE").attr("disabled", false);
                notification("Failed to update", "bg-red");
            });

        }

    });

</script>

</body>
</html>
