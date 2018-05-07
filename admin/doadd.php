<?php
require '../include/db.php';

$fields = array( 'title', 'h1', 'p', 'span_class', 'span_text', 'img_alt', 'img_src', 'nav_title' );

foreach ( $fields as $field ) {
	if ( ! isset($_POST[ $field ]) || empty( trim( $_POST[ $field ] ) ) ) {
		echo 'All fields are required';
		die;
	}
}

$title      = htmlentities($_POST['title']);
$h1         = htmlentities($_POST['h1']);
$p          = htmlentities($_POST['p']);
$span_class = htmlentities($_POST['span_class']);
$span_text  = htmlentities($_POST['span_text']);
$img_alt    = htmlentities($_POST['img_alt']);
$img_src    = htmlentities($_POST['img_src']);
$nav_title  = htmlentities($_POST['nav_title']);

if ( addPage( $db, $title, $h1, $p, $span_class, $span_text, $img_alt, $img_src, $nav_title ) ) {
	redirectToIndex();
}


