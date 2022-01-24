<?php
$link = $_SERVER['REQUEST_URI'];
$linkP = substr($link, strrpos($link,'/')+1);
?>

<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info" style="background-color: deeppink;">
            <div class="image" style="margin-bottom: 40px;">

            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["adminFirstName"]." ".$_SESSION["adminLastName"]; ?></div>
<div class="email"> <?php echo $_SESSION["username"] ?> </div>
<div class="btn-group user-helper-dropdown">
    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
    <ul class="dropdown-menu pull-right">
        <li><a id="sign_out_button" ng-click="logout();"><i class="material-icons">input</i>Sign Out</a></li>
    </ul>
</div>
</div>
</div>
<!-- #User Info -->
<!-- Menu -->


<div class="menu">
    <ul class="list">
        <li class="<?php if($linkP=="index.php") {echo "active";} ?>">
            <a href="index.php">
                <i class="material-icons">home</i>
                <span>Home</span>
            </a>
        </li>
        <li class="<?php if($linkP=="createOpening.php") {echo "active";} ?>">
            <a href="createOpening.php">
                <i class="material-icons">add_box</i>
                <span>Create Opening</span>
            </a>
        </li>
        <li class="<?php if($linkP=="report.php") {echo "active";} ?>">
            <a href="report.php">
                <i class="material-icons">assessment</i>
                <span>Report</span>
            </a>
        </li>
    </ul>
</div>
<!-- #Menu -->
</section>

<?php require_once"../htmlParts/notification.php"; ?>
<?php require_once"../htmlParts/dialog.php"; ?>
