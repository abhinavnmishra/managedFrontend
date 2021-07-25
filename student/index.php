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
            <h2>Your Profile</h2>
        </div>

        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ACADEMICS
                        </h2>
                    </div>
                    <div class="body">
                        <form>
                            <label for="firstName">Enter GPA for each Semester</label>
                            <div class="row clearfix">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <label for="sem1">Semester 1</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" ng-model="dto.academics.sem1" id="sem1" class="form-control" placeholder="Semester 1">
                                    </div>
                                </div>
                            </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <label for="sem2">Semester 2</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" ng-model="dto.academics.sem2" id="sem2" class="form-control" placeholder="Semester 2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <label for="sem3">Semester 3</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" ng-model="dto.academics.sem3" id="sem3" class="form-control" placeholder="Semester 3">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <label for="sem4">Semester 4</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" ng-model="dto.academics.sem4" id="sem4" class="form-control" placeholder="Semester 4">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <label for="sem5">Semester 5</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" ng-model="dto.academics.sem5" id="sem5" class="form-control" placeholder="Semester 5">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <label for="sem6">Semester 6</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" ng-model="dto.academics.sem6" id="sem6" class="form-control" placeholder="Semester 6">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <label for="sem7">Semester 7</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" ng-model="dto.academics.sem7" id="sem7" class="form-control" placeholder="Semester 7">
                                        </div>
                                    </div>
                                </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <label for="sem8">Semester 8</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" ng-model="dto.academics.sem8" id="sem8" class="form-control" placeholder="Semester 8">
                                    </div>
                                </div>
                            </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <label for="cgpa">Current CGPA</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" ng-model="dto.academics.cgpa" id="cgpa" class="form-control" placeholder="CGPA till current Semester">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="firstName">Enter Class X and XII Marks</label>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <label for="hsc">Class XII Marks</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" ng-model="dto.academics.hsc" id="hsc" class="form-control" placeholder="Class XII Marks">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <label for="ssc">Class X Marks</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" ng-model="dto.academics.ssc" id="ssc" class="form-control" placeholder="Class X Marks">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn btn-primary m-t-15 waves-effect" ng-click="addAcademics()">UPDATE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Vertical Layout -->


        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            SKILLS
                        </h2>
                    </div>
                    <div class="body">
                        <form>
                            <label>Enter Skills</label>
                            <br>
                            <br>
                            <span ng-repeat="x in dto.skills" class="demo-checkbox">
                                <input type="checkbox" name="skillList" id="{{x}}" class="chk-col-red" ng-checked="{{dto.student.skills.indexOf(x) !== -1}}"/>
                                <label for="{{x}}">{{x.replace('_', ' ').charAt(0).toUpperCase() + x.replace('_', ' ').substr(1).toLowerCase()}}</label>
                            </span>
                            <br>
                            <button type="button" class="btn btn-primary m-t-15 waves-effect" ng-click="addSkills()">UPDATE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Vertical Layout -->


        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            CERTIFICATES
                            <div class="right align-right">
                                <button type="button" class="btn btn-success waves-effect" id="addC">
                                    <i class="material-icons">add</i>
                                    <span>ADD</span>
                                </button>
                                <button type="button" class="btn btn-danger waves-effect" id="removeC">
                                    <i class="material-icons">remove</i>
                                    <span>REMOVE</span>
                                </button>
                            </div>
                        </h2>
                    </div>
                    <div class="body">

                        <span  ng-repeat="x in dto.certificates">
                            <label>Enter Certificate Title</label>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" ng-model="x.name" id="cname_{{x.id}}" class="form-control" placeholder="Certificate Name" value="{{x.name}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="cdate_{{x.id}}">Date of Completion(dd/mm/yyyy)</label>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                        <div class="form-line" id="bs_datepicker_container">
                                            <input type="date" ng-model="x.date" class="datepicker form-control" id="cdate_{{x.id}}" placeholder="Please choose a date..." value="{{x.date}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="header"></div>
                                <br>
                        </span>

                        <span id="certificate_0"></span>

                            <button type="button" class="btn btn-primary m-t-15 waves-effect" ng-click="addCertificates()">UPDATE</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Vertical Layout -->

        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            PROJECTS
                            <div class="right align-right">
                                <button type="button" class="btn btn-success waves-effect" id="addP">
                                    <i class="material-icons">add</i>
                                    <span>ADD</span>
                                </button>
                                <button type="button" class="btn btn-danger waves-effect" id="removeP">
                                    <i class="material-icons">remove</i>
                                    <span>REMOVE</span>
                                </button>
                            </div>
                        </h2>
                    </div>
                    <div class="body">

                        <span  ng-repeat="x in dto.projects">
                            <label>Enter Project Name</label>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" ng-model="x.name" id="pname_{{x.id}}" class="form-control" placeholder="Project Name" value="{{x.name}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label>Enter Project Description</label>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" ng-model="x.description" id="pdesc_{{x.id}}" class="form-control" placeholder="Project Description" value="{{x.description}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="pdate_{{x.id}}">Date of Project Completion(dd/mm/yyyy)</label>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                        <div class="form-line" id="bs_datepicker_container">
                                            <input type="date" ng-model="x.completionDate" class="datepicker form-control" id="pdate_{{x.id}}" placeholder="Please choose a date..." value="{{x.completionDate}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="header"></div>
                                <br>
                        </span>

                        <span id="project_0"></span>

                        <button type="button" class="btn btn-primary m-t-15 waves-effect" ng-click="addProjects()">UPDATE</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Vertical Layout -->


        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            WORK EXPERIENCE
                            <div class="right align-right">
                                <button type="button" class="btn btn-success waves-effect" id="addE">
                                    <i class="material-icons">add</i>
                                    <span>ADD</span>
                                </button>
                                <button type="button" class="btn btn-danger waves-effect" id="removeE">
                                    <i class="material-icons">remove</i>
                                    <span>REMOVE</span>
                                </button>
                            </div>
                        </h2>
                    </div>
                    <div class="body">

                        <span  ng-repeat="x in dto.experiences">
                            <label>Name of the Organization</label>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" ng-model="x.orgName" id="eorg_{{x.id}}" class="form-control" placeholder="Organization Name" value="{{x.orgName}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label>Your Role</label>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" ng-model="x.role" id="erole_{{x.id}}" class="form-control" placeholder="Your Role" value="{{x.role}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label>Description</label>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" ng-model="x.description" id="edesc_{{x.id}}" class="form-control" placeholder="Description" value="{{x.description}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="esdate_{{x.id}}">Starting Date(dd/mm/yyyy)</label>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                        <div class="form-line" id="bs_datepicker_container">
                                            <input type="date" ng-model="x.startDate" class="datepicker form-control" id="esdate_{{x.id}}" placeholder="Please choose a date..." value="{{x.startDate}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="eedate_{{x.id}}">End Date(dd/mm/yyyy)</label>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                        <div class="form-line" id="bs_datepicker_container">
                                            <input type="date" ng-model="x.endDate" class="datepicker form-control" id="eedate_{{x.id}}" placeholder="Please choose a date..." value="{{x.endDate}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="header"></div>
                                <br>
                        </span>

                        <span id="experience_0"></span>

                        <button type="button" class="btn btn-primary m-t-15 waves-effect" ng-click="addExperiences()">UPDATE</button>
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

        /*---------------ADD ACADEMICS----------------*/


        $scope.addAcademics = function () {
            $scope.nominee = {};
                let addAcademicsAjaxSettings = {
                    "url": "<?php echo $backendServer; ?>student/academics",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Authorization": "Bearer <?php echo $jwt; ?>",
                        "Content-Type": "application/json"
                    },
                    "data": JSON.stringify($scope.dto.academics),
                };

                $.ajax(addAcademicsAjaxSettings).done(function (response) {

                    $scope.dto.academics = response;
                    $scope.$apply();

                    $.ajax(getStudentInfoAjaxSettings).done(function (response) {
                        $scope.dto = response;
                        $scope.$apply();
                    }).fail(function (error) {
                        console.log(error);
                    });
                    notification("Academics Updated!", "bg-green");

                }).fail(function (error) {
                    console.log(error);
                    notification(error, "bg-red");
                });
        }


        /*---------------ADD SKILLS----------------*/

        $scope.addSkills = function () {
            $scope.skillList = [];
            $.each($("input[name='skillList']:checked"), function(){
                $scope.skillList.push($(this).attr('id'));
                //$scope.$apply();
            });
            console.log($scope.skillList);

            let addSkillsAjaxSettings = {
                "url": "<?php echo $backendServer; ?>student/skills",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Authorization": "Bearer <?php echo $jwt;?>",
                    "Content-Type": "application/json"
                },
                "data": JSON.stringify($scope.skillList),
            };

            $.ajax(addSkillsAjaxSettings).done(function (response) {

                $.ajax(getStudentInfoAjaxSettings).done(function (response) {
                    $scope.dto = response;
                    $scope.$apply();
                }).fail(function (error) {
                    console.log(error);
                });
                notification("Skills Updated Successfully!", "bg-green");


            }).fail(function (error) {
                notification("Oops! Some error occurred", "bg-red");
            });

        }

        /*---------------ADD CERTIFICATES----------------*/

        let c = 0;
        let id = "";

        $("#addC").click(function () {
            id = "#certificate_" + c;
            c++;
            $(id).after(
                "<div id=\"certificate_" + c + "\">\n" +
                "                            <label>Enter Certificate Title</label>\n" +
                "                            <div class=\"row clearfix\">\n" +
                "                                <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">\n" +
                "                                    <div class=\"form-group\">\n" +
                "                                        <div class=\"form-line\">\n" +
                "                                            <input type=\"text\" id=\"cname_e_" + c + "\" class=\"form-control\" placeholder=\"Certificate Name\">\n" +
                "                                        </div>\n" +
                "                                    </div>\n" +
                "                                </div>\n" +
                "                            </div>\n" +
                "                            <label for=\"cdate_e_" + c + "\">Date of Completion(dd/mm/yyyy)</label>\n" +
                "                            <div class=\"row clearfix\">\n" +
                "                                <div class=\"col-sm-4\">\n" +
                "                                    <div class=\"input-group\">\n" +
                "                                        <span class=\"input-group-addon\">\n" +
                "                                            <i class=\"material-icons\">date_range</i>\n" +
                "                                        </span>\n" +
                "                                        <div class=\"form-line\" id=\"bs_datepicker_container\">\n" +
                "                                            <input type=\"date\" class=\"datepicker form-control\" id=\"cdate_e_" + c + "\" placeholder=\"Please choose a date...\">\n" +
                "                                        </div>\n" +
                "                                    </div>\n" +
                "                                </div>\n" +
                "                            </div>\n" +
                "                            <div class=\"header\"></div>\n" +
                "                            <br>\n" +
                "                        </div>"
            );
        });

        $("#removeC").click(function () {
            if(c<=0)
                return;
            id = "#certificate_" + c;
            $(id).remove();
            c--;
        });


        $scope.addCertificates = function () {
            $scope.certificateList = [];

            $scope.certificateList = $scope.certificateList.concat($scope.dto.certificates);

            let tempc = c;
            while (tempc > 0){
                let cname = "#cname_e_" + tempc;
                let cdate = "#cdate_e_" + tempc;
                $scope.certificate = {};
                $scope.certificate.id = null;
                $scope.certificate.name = $(cname).val();
                $scope.certificate.date = $(cdate).val();

                $scope.certificateList.push($scope.certificate);
                //$scope.$apply();

                tempc--;
            }

            console.log($scope.certificateList);

            let addCertificatesAjaxSettings = {
                "url": "<?php echo $backendServer; ?>student/certificates",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Authorization": "Bearer <?php echo $jwt;?>",
                    "Content-Type": "application/json"
                },
                "data": JSON.stringify($scope.certificateList),
            };

            $.ajax(addCertificatesAjaxSettings).done(function (response) {

                while (c > 0){
                    $("#removeC").click();
                }
                c = 0;

                $.ajax(getStudentInfoAjaxSettings).done(function (response) {
                    $scope.dto = response;
                    $scope.$apply();
                }).fail(function (error) {
                    console.log(error);
                });
                notification("Certificates Updated Successfully!", "bg-green");


            }).fail(function (error) {
                notification("Oops! Some error occurred", "bg-red");
            });

        }

        /*---------------ADD PROJECTS----------------*/

        let p = 0;
        let idp = "";

        $("#addP").click(function () {
            idp = "#project_" + p;
            p++;
            $(idp).after(
                "<div id=\"project_"+ p +"\">\n" +
                "                            <label>Enter Project Name</label>\n" +
                "                            <div class=\"row clearfix\">\n" +
                "                                <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">\n" +
                "                                    <div class=\"form-group\">\n" +
                "                                        <div class=\"form-line\">\n" +
                "                                            <input type=\"text\" id=\"pname_e_"+ p +"\" class=\"form-control\" placeholder=\"Project Name\">\n" +
                "                                        </div>\n" +
                "                                    </div>\n" +
                "                                </div>\n" +
                "                            </div>\n" +
                "                            <label>Enter Project Description</label>\n" +
                "                            <div class=\"row clearfix\">\n" +
                "                                <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">\n" +
                "                                    <div class=\"form-group\">\n" +
                "                                        <div class=\"form-line\">\n" +
                "                                            <input type=\"text\" id=\"pdesc_e_"+ p +"\" class=\"form-control\" placeholder=\"Project Description\">\n" +
                "                                        </div>\n" +
                "                                    </div>\n" +
                "                                </div>\n" +
                "                            </div>\n" +
                "                            <label for=\"pdate_e_"+ p +"\">Date of Project Completion(dd/mm/yyyy)</label>\n" +
                "                            <div class=\"row clearfix\">\n" +
                "                                <div class=\"col-sm-4\">\n" +
                "                                    <div class=\"input-group\">\n" +
                "                                        <span class=\"input-group-addon\">\n" +
                "                                            <i class=\"material-icons\">date_range</i>\n" +
                "                                        </span>\n" +
                "                                        <div class=\"form-line\" id=\"bs_datepicker_container\">\n" +
                "                                            <input type=\"date\" class=\"datepicker form-control\" id=\"pdate_e_"+ p +"\" placeholder=\"Please choose a date...\">\n" +
                "                                        </div>\n" +
                "                                    </div>\n" +
                "                                </div>\n" +
                "                            </div>\n" +
                "\n" +
                "                            <div class=\"header\"></div>\n" +
                "                                <br>\n" +
                "                            </div>"
            );
        });

        $("#removeP").click(function () {
            if(p<=0)
                return;
            idp = "#project_" + p;
            $(idp).remove();
            p--;
        });


        $scope.addProjects = function () {
            $scope.projectList = [];

            $scope.projectList = $scope.projectList.concat($scope.dto.projects);

            let tempp = p;
            while (tempp > 0){
                let pname = "#pname_e_" + tempp;
                let pdate = "#pdate_e_" + tempp;
                let pdesc = "#pdesc_e_" + tempp;
                $scope.project = {};
                $scope.project.id = null;
                $scope.project.name = $(pname).val();
                $scope.project.description = $(pdesc).val();
                $scope.project.completionDate = $(pdate).val();

                $scope.projectList.push($scope.project);
                //$scope.$apply();

                tempp--;
            }

            console.log($scope.projectList);

            let addProjectsAjaxSettings = {
                "url": "<?php echo $backendServer; ?>student/projects",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Authorization": "Bearer <?php echo $jwt;?>",
                    "Content-Type": "application/json"
                },
                "data": JSON.stringify($scope.projectList),
            };

            $.ajax(addProjectsAjaxSettings).done(function (response) {

                while (p > 0){
                    $("#removeP").click();
                }
                p = 0;

                $.ajax(getStudentInfoAjaxSettings).done(function (response) {
                    $scope.dto = response;
                    $scope.$apply();
                }).fail(function (error) {
                    console.log(error);
                });
                notification("Projects Updated Successfully!", "bg-green");


            }).fail(function (error) {
                notification("Oops! Some error occurred", "bg-red");
            });

        }

        /*---------------ADD EXPERIENCES----------------*/

        let e = 0;
        let ide = "";

        $("#addE").click(function () {
            ide = "#experience_" + e;
            e++;
            $(ide).after(
                "<div id=\"experience_"+ e +"\">\n" +
                "                            <label>Name of the Organization</label>\n" +
                "                            <div class=\"row clearfix\">\n" +
                "                                <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">\n" +
                "                                    <div class=\"form-group\">\n" +
                "                                        <div class=\"form-line\">\n" +
                "                                            <input type=\"text\" id=\"eorg_e_"+ e +"\" class=\"form-control\" placeholder=\"Organization Name\">\n" +
                "                                        </div>\n" +
                "                                    </div>\n" +
                "                                </div>\n" +
                "                            </div>\n" +
                "                            <label>Your Role</label>\n" +
                "                            <div class=\"row clearfix\">\n" +
                "                                <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">\n" +
                "                                    <div class=\"form-group\">\n" +
                "                                        <div class=\"form-line\">\n" +
                "                                            <input type=\"text\" id=\"erole_e_"+ e +"\" class=\"form-control\" placeholder=\"Your Role\">\n" +
                "                                        </div>\n" +
                "                                    </div>\n" +
                "                                </div>\n" +
                "                            </div>\n" +
                "                            <label>Description</label>\n" +
                "                            <div class=\"row clearfix\">\n" +
                "                                <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">\n" +
                "                                    <div class=\"form-group\">\n" +
                "                                        <div class=\"form-line\">\n" +
                "                                            <input type=\"text\" id=\"edesc_e_"+ e +"\" class=\"form-control\" placeholder=\"Description\">\n" +
                "                                        </div>\n" +
                "                                    </div>\n" +
                "                                </div>\n" +
                "                            </div>\n" +
                "                            <label for=\"esdate_e_"+ e +"\">Starting Date(dd/mm/yyyy)</label>\n" +
                "                            <div class=\"row clearfix\">\n" +
                "                                <div class=\"col-sm-4\">\n" +
                "                                    <div class=\"input-group\">\n" +
                "                                        <span class=\"input-group-addon\">\n" +
                "                                            <i class=\"material-icons\">date_range</i>\n" +
                "                                        </span>\n" +
                "                                        <div class=\"form-line\" id=\"bs_datepicker_container\">\n" +
                "                                            <input type=\"date\" class=\"datepicker form-control\" id=\"esdate_e_"+ e +"\" placeholder=\"Please choose a date...\">\n" +
                "                                        </div>\n" +
                "                                    </div>\n" +
                "                                </div>\n" +
                "                            </div>\n" +
                "                            <label for=\"eedate_e_"+ e +"\">End Date(dd/mm/yyyy)</label>\n" +
                "                            <div class=\"row clearfix\">\n" +
                "                                <div class=\"col-sm-4\">\n" +
                "                                    <div class=\"input-group\">\n" +
                "                                        <span class=\"input-group-addon\">\n" +
                "                                            <i class=\"material-icons\">date_range</i>\n" +
                "                                        </span>\n" +
                "                                        <div class=\"form-line\" id=\"bs_datepicker_container\">\n" +
                "                                            <input type=\"date\" class=\"datepicker form-control\" id=\"eedate_e_"+ e +"\" placeholder=\"Please choose a date...\">\n" +
                "                                        </div>\n" +
                "                                    </div>\n" +
                "                                </div>\n" +
                "                            </div>\n" +
                "\n" +
                "                            <div class=\"header\"></div>\n" +
                "                                <br>\n" +
                "                            </div>"
            );
        });

        $("#removeE").click(function () {
            if(e<=0)
                return;
            ide = "#experience_" + e;
            $(ide).remove();
            e--;
        });


        $scope.addExperiences = function () {
            $scope.experienceList = [];

            $scope.experienceList = $scope.experienceList.concat($scope.dto.experiences);

            let tempe = e;
            while (tempe > 0){
                let eorg = "#eorg_e_" + tempe;
                let erole = "#erole_e_" + tempe;
                let esdate = "#esdate_e_" + tempe;
                let eedate = "#eedate_e_" + tempe;
                let edesc = "#edesc_e_" + tempe;
                $scope.experience = {};
                $scope.experience.id = null;
                $scope.experience.orgName = $(eorg).val();
                $scope.experience.role = $(erole).val();
                $scope.experience.description = $(edesc).val();
                $scope.experience.startDate = $(esdate).val();
                $scope.experience.endDate = $(eedate).val();

                $scope.experienceList.push($scope.experience);
                //$scope.$apply();

                tempe--;
            }

            console.log($scope.experienceList);

            let addExperiencessAjaxSettings = {
                "url": "<?php echo $backendServer; ?>student/experience",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Authorization": "Bearer <?php echo $jwt;?>",
                    "Content-Type": "application/json"
                },
                "data": JSON.stringify($scope.experienceList),
            };

            $.ajax(addExperiencessAjaxSettings).done(function (response) {

                while (e > 0){
                    $("#removeE").click();
                }
                e = 0;

                $.ajax(getStudentInfoAjaxSettings).done(function (response) {
                    $scope.dto = response;
                    $scope.$apply();
                }).fail(function (error) {
                    console.log(error);
                });
                notification("Experiences Updated Successfully!", "bg-green");


            }).fail(function (error) {
                notification("Oops! Some error occurred", "bg-red");
            });

        }

    });

</script>

</body>
</html>

