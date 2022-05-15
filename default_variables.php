<?php
	session_start();
	require_once 'functions.class.php';
	$rid =	$_REQUEST['id'];
	$do =	$_REQUEST['do']; 
	$mode =	$_REQUEST['mode']; 
	$prefix = $_REQUEST['prefix'];
?>