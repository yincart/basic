<?php
//[create login.php]
session_start();
$_SESSION['loginuser'] = $userName;

//[create main.php]
session_start();
if( $_SESSION['loginuser'] == '' ) {
    die("<script>window.open('user/login','_parent');</script>");
}

?>
<?php
$this->breadcrumbs=array(
	'会员中心',
);
?>

<div class="box">
    <div class="box-title">会员中心</div>
    <div class="box-content">
        欢迎来到会员中心。
    </div>
</div>