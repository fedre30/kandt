<?php
require '../include/db.php';


$fields = array( 'title', 'h1', 'p', 'span_class', 'span_text', 'img_alt', 'img_src', 'nav_title' );

foreach ( $fields as $field ) {
	if (!isset( $_POST[ $field ]) || empty( trim( $_POST[ $field ]))) {
		echo 'All fields are required';
		die;
	}
}
$id         = $_POST['id'];
$title      = $_POST['title'];
$h1         = $_POST['h1'];
$p          = $_POST['p'];
$span_class = $_POST['span_class'];
$span_text  = $_POST['span_text'];
$img_alt    = $_POST['img_alt'];
$img_src    = $_POST['img_src'];
$nav_title  = $_POST['nav_title'];


if ( editPage( $db, $id, $title, $h1, $p, $span_class, $span_text, $img_alt, $img_src, $nav_title ) ) {
	redirectToIndex();
}
