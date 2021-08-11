<?php
session_start();
require_once('Facebook/autoload.php');

$FBObject = new \Facebook\Facebook([
	'app_id' => '867430144195607',
	'app_secret' => '7d51a956f3ecbfa89d6d4abfffb81e42',
	'default_graph_version' => 'v2.10'
]);

$handler = $FBObject -> getRedirectLoginHelper();
?>