<?php
require_once __DIR__ . '/vendor/autoload.php';
	session_start();
	$fb = new Facebook\Facebook([
	  'app_id'                => '572827406692590',
	  'app_secret'            => '73ed10e718ff34c3edc24c9c6b2de651',
	  'default_graph_version' => 'v2.10',
	]);
?>