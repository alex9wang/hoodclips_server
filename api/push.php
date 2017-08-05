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

define('VALID_TOKEN', '3332d843549baba6bc436f466fcd4685ec7d08eb8c59748d0c686a2e49ccd48c');
define('INVALID_TOKEN', 'ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff');

// Adjust to your timezone
date_default_timezone_set('Europe/Rome');

// Report all PHP errors
//error_reporting(-1);

// Using Autoload all classes are loaded on-demand
require_once 'ApnsPHP/Autoload.php';
require_once '../config.php';
require_once '../include/functions.php';
require_once '../include/user_functions.php';

$push_message = $_GET['PUSH_MESSAGE'];
print_r(json_encode($_GET));
print_r($push_message);
$sql = "INSERT INTO loyalty_notifications(loyalty_notification_content, loyalty_notification_date) VALUES('".mysql_real_escape_string($push_message)."', now())";
mysql_query($sql);

// Instanciate a new ApnsPHP_Push object
$push = new ApnsPHP_Push(
	ApnsPHP_Abstract::ENVIRONMENT_SANDBOX,
	'Loyalty_Push_Certificate_Develop.pem'
);

// Set the Root Certificate Autority to verify the Apple remote peer
//$push->setRootCertificationAuthority('entrust_root_certification_authority.pem');
$push_message = $_GET['PUSH_MESSAGE'];
$sql = "SELECT DEVICE_TOKEN FROM tokens";
//$result['sql'] = $sql;
$list = mysql_query($sql);
$count = 0;

// Connect to the Apple Push Notification Service
$push->connect();

while ($row = mysql_fetch_assoc($list)) {
	// Instantiate a new Message with a single recipient
	$message = new ApnsPHP_Message($row['DEVICE_TOKEN']);

	$message->setText($push_message);
	$message->setBadge(1);
	$message->setSound();
	// Add the message to the message queue
	$push->add($message);
	$count ++;
}

// Send all messages in the message queue
$push->send();

// Disconnect from the Apple Push Notification Service
$push->disconnect();

$push = new ApnsPHP_Push(
	ApnsPHP_Abstract::ENVIRONMENT_PRODUCTION,
	'Loyalty_Push_Certificate_Product.pem'
);

// Set the Root Certificate Autority to verify the Apple remote peer
//$push->setRootCertificationAuthority('entrust_root_certification_authority.pem');
$push_message = $_GET['PUSH_MESSAGE'];
$sql = "SELECT DEVICE_TOKEN FROM tokens";
//$result['sql'] = $sql;
$list = mysql_query($sql);
$count = 0;

// Connect to the Apple Push Notification Service
$push->connect();

while ($row = mysql_fetch_assoc($list)) {
	// Instantiate a new Message with a single recipient
	$message = new ApnsPHP_Message($row['DEVICE_TOKEN']);

	$message->setText($push_message);
	$message->setBadge(1);
	$message->setSound();
	// Add the message to the message queue
	$push->add($message);
	$count ++;
}

// Send all messages in the message queue
$push->send();

// Disconnect from the Apple Push Notification Service
$push->disconnect();

// Examine the error message container
$aErrorQueue = $push->getErrors();
if (!empty($aErrorQueue)) {
	//var_dump($aErrorQueue);
}
?>
<html>
<head></head>
<body>
</body>
<script>
alert("<?php echo $count?> messages are sent. message-content: <?php echo $push_message?>");
</script>
</html>