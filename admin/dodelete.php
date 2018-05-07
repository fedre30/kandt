<?php
require '../include/db.php';

if(isset($_POST['id'])){
	$id = $_POST['id'];
}

if (deletePage($db, $id)) {
	redirectToIndex();
}