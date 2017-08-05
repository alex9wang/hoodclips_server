<?php
/**
 * @file
 * sample_push.php
 *
 * Push demo
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://code.google.com/p/apns-php/wiki/License
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to aldo.armiento@gmail.com so we can send you a copy immediately.
 *
 * @author (C) 2010 Aldo Armiento (aldo.armiento@gmail.com)
 * @version $Id: sample_push.php 65 2010-12-13 18:38:39Z aldo.armiento $
 */

// Report all PHP errors
//error_reporting(-1);

// Using Autoload all classes are loaded on-demand
require_once 'ApnsPHP/Autoload.php';
require_once '../config.php';
require_once '../include/functions.php';
require_once '../include/user_functions.php';

$result = mysql_query("SELECT id, video_id, message FROM pm_messages WHERE is_sent = 0 LIMIT 1");

if (!$result) {
	echo("exited!");
	exit;
	echo("exited!");
}
$message = mysql_fetch_assoc($result);
//$message = $row_message["id"];
print_r($message);
$message_id = (string)$message["id"];
$push_message = (string)$message["message"];
$video_id = (string)$message["video_id"];

echo($message_id. ": ". $push_message. ": " . $video_id."\n");
// Instanciate a new ApnsPHP_Push object
$push = new ApnsPHP_Push(
	ApnsPHP_Abstract::ENVIRONMENT_PRODUCTION,
	'hoodclips-apns-pro.pem'
);

/*  for development
$push = new ApnsPHP_Push(
	ApnsPHP_Abstract::ENVIRONMENT_SANDBOX,
	'hoodclips-apns-dev.pem'
);
*/

// Set the Root Certificate Autority to verify the Apple remote peer
//$push->setRootCertificationAuthority('entrust_root_certification_authority.pem');
$push_message = $_POST['PUSH_MESSAGE'];
$sql = "SELECT id, DEVICE_TOKEN FROM pm_tokens WHERE SEND_FLAG = 0 LIMIT 500";
//$result['sql'] = $sql;
$list = mysql_query($sql);
$count = 0;

// Connect to the Apple Push Notification Service
$push->connect();

while ($row = mysql_fetch_assoc($list)) {
	// Instantiate a new Message with a single recipient
	if (empty($row["DEVICE_TOKEN"])) {
		continue;
	}
	$message = new ApnsPHP_Message($row['DEVICE_TOKEN']);
	print_r($row["id"]."\n");
	$message->setText($push_message);
	$message->setBadge(1);
	$message->setSound();
	$message->setCustomProperty('videoid', $video_id);
	// Add the message to the message queue
	$push->add($message);
	$count ++;
}

// send_flag would be set 1 if those are added to queue.
mysql_query("UPDATE pm_tokens SET SEND_FLAG = 1 WHERE SEND_FLAG = 0 LIMIT 500");
// Send all messages in the message queue
if ($count > 0) {

	$push->send();
}
else {
	// all send_flag would be reset if one messsage would be sent for all deveices
	mysql_query("UPDATE pm_tokens SET SEND_FLAG = 0 WHERE SEND_FLAG = 1");
	// the message which is already sent, the is_send flag would be set 1
	mysql_query("UPDATE pm_messages SET is_sent = 1 WHERE id = $messgae_id");
}

// Disconnect from the Apple Push Notification Service
$push->disconnect();

// Examine the error message container
$aErrorQueue = $push->getErrors();
if (!empty($aErrorQueue)) {
	//var_dump($aErrorQueue);
}

?>
