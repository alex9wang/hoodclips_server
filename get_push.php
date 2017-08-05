<?php
require_once '../config.php';

if (strpos($_SERVER["CONTENT_TYPE"] ,'json')) {
	$_POST = json_decode(file_get_contents("php://input"), true);
	header('Content-Type: application/json');
}
$from = $_POST['from'];

$where = "WHERE 1 = 1";
if (isset($from) && !empty($from)) {
	$where = $where . " AND loyalty_notification_date>'".$from."'";
}
$result=array();
$sql = "SELECT * FROM loyalty_notifications " . $where . " ORDER BY loyalty_notification_date desc ";

$result['from'] = $from;
$result['sql'] = $sql;
$list = mysql_query($sql);
$returnData = array();
while($row = mysql_fetch_assoc($list)) {
	$returnData[] = array(
		id => $row['id'],
		notification => $row['loyalty_notification_content'],
		date => $row['loyalty_notification_date']
	);
}
$result['status'] = 200;
$result['succeeded'] = 'OK';
$result['data'] = $returnData;

print_r (json_encode($result)) ;
?>