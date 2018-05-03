<?php

require_once "../send/header.php";

$username=$_POST[username];
$password=$_POST[password];

/*
$sql     = "SELECT * FROM `login` WHERE `login`.`username`='$username' AND `login`.`password`='$password'";
$result  = $mysqli->query($sql) or die($mysqli->connect_error);
$goods = $result->fetch_assoc();
*/

$userreal  = 'ddm8102';
$passwordreal = 'wow2018';

print strcasecmp($username, $userreal);
print '<\br>';
print strcasecmp($password, $passwordreal);

if(strcasecmp($username, $userreal)==0 && stristr($password, $passwordreal)==0){
    setcookie("ddm_xyz", "ddm2018", time()+3600);
    header("location:management.php");
}else{
    header("location:../entrance.php");
}



/*
if(!empty($goods)){
    setcookie("jaan_xyz", "jaan", time()+3600);
    header("location:management.php");
    
}else{
    header("location:../entrance.php");
}
*/
