<?php

$ip_blacklist = [
	'124.12.333.09',
	'124.13.333.09',
	'124.14.333.09',
	];
// write here the ips you want to ban

function isIpBlack($blacklist) {
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
    $ip = $_SERVER['REMOTE_ADDR'];
	}
	if (in_array($ip, $blacklist)) {
		return false;
	} else {
		return true;
	}
}

if (isIpBlack($blacklist)) {
	die('your ip is banned.');
} else {
	echo 'welcome to my website, you good friend!';
}
