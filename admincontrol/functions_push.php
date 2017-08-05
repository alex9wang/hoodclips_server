<?php
// +------------------------------------------------------------------------+
// | PHP Melody ( www.phpsugar.com )
// +------------------------------------------------------------------------+
// | PHP Melody IS NOT FREE SOFTWARE
// | If you have downloaded this software from a website other
// | than www.phpsugar.com or if you have received
// | this software from someone who is not a representative of
// | PHPSUGAR, you are involved in an illegal activity.
// | ---
// | In such case, please contact: support@phpsugar.com.
// +------------------------------------------------------------------------+
// | Developed by: PHPSUGAR (www.phpsugar.com) / support@phpsugar.com
// | Copyright: (c) 2004-2013 PHPSUGAR. All rights reserved.
// +------------------------------------------------------------------------+
require_once ABSPATH . '/api/ApnsPHP/Autoload.php';

function push_apns($msg, $id) {
	// Instanciate a new ApnsPHP_Push object
	$push = new ApnsPHP_Push(
		ApnsPHP_Abstract::ENVIRONMENT_SANDBOX,
		ABSPATH . '/api/hoodclips-apns-dev.pem'
	);
	
	push_apns_with_push($push, $msg, $id);

	$push = new ApnsPHP_Push(
		ApnsPHP_Abstract::ENVIRONMENT_PRODUCTION,
		ABSPATH . '/api/hoodclips-apns-pro.pem'
	);
	//$push->setLogger();
	push_apns_with_push($push, $msg, $id);
}

function push_apns_with_push($push, $msg, $id)
{
	// Set the Root Certificate Autority to verify the Apple remote peer
	//$push->setRootCertificationAuthority('entrust_root_certification_authority.pem');
	$sql = "SELECT DEVICE_TOKEN FROM pm_tokens";
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
		/*$message->setCustomIdentifier("Message-Badge-3");
		$message->setCustomProperty('id', $id);*/
		$message->setText(strip_tags($msg));
		// Add the message to the message queue
		$message->setBadge(1);
		$message->setSound();
		$message->setCustomProperty('videoid', $id);
		$push->add($message);
		// if ($count == 500) {
		// 	$push->send();
		// 	$push->disconnect();
		// 	$push = new ApnsPHP_Push(
		// 			ApnsPHP_Abstract::ENVIRONMENT_PRODUCTION,
		// 				ABSPATH . '/api/hoodclips-apns-pro.pem'
		// 			);
		// 	$push->connect();
		// 	$count = 0;
		// }
		$count ++;
	}

	if ($count > 0) // Send all messages in the message queue
		$push->send();

	// Disconnect from the Apple Push Notification Service
	$push->disconnect();
}
