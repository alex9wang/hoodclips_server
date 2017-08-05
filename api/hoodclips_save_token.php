<?php
require_once '../config.php';
require_once '../include/functions.php';
require_once '../include/user_functions.php';


if (strpos($_SERVER["CONTENT_TYPE"] ,'json')) {
	$_POST = json_decode(file_get_contents("php://input"), true);
	header('Content-Type: application/json');
}
$result = array();
$device_token = $_POST['token'];
$sql = "SELECT COUNT(DEVICE_TOKEN) as DEVICE_COUNT FROM pm_tokens WHERE DEVICE_TOKEN='".$device_token."'";
//$result['sql1'] = $sql;
$list = mysql_query($sql);
$count = mysql_fetch_assoc($list)['DEVICE_COUNT'];
if ($count == 0) {
	$sql = "INSERT INTO pm_tokens(DEVICE_TOKEN) VALUES('".$device_token."')";
	//$result['sql2'] = $sql;
	mysql_query($sql);
}
$result['status'] = 'success';
print_r(json_encode($result));
?>