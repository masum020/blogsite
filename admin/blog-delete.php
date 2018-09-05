<?php include_once("inc/function.php");isLogged();?>
<?php include_once("action.php");?>
<?php
  $id = $_GET['id'];
  $action = new action();
	$postDelete = $action->postDelete($id);
?>
