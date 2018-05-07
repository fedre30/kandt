<?php

/**
 * @details of clicked page
 * @adminPage link
 * @editPage link
 * @deletePage link
 */
include '../include/head.php';
require '../include/db.php';

$id   = $_GET['id'];
$page = getPageID( $db, $id );
?>
<div class="details">
    <p><span class="label-list">ID:</span> <?= $page['id'] ?></p>
    <h2><span style="color: #ac2925">Titre: </span><?= $page['title'] ?></h2>
    <p><span class="label-list">Slug: </span><?= $page['slug'] ?></p>
    <p><span class="label-list">Titre de la page: </span> <?= $page['h1'] ?></p>
    <p><span class="label-list">Text: </span> <?= $page['p'] ?></p>
    <p><span class="label-list">Tag class: </span> <?= $page['span_class'] ?></p>
    <p><span class="label-list">Tag text: </span> <?= $page['span_text'] ?></p>
    <p><span class="label-list">Image description: </span> <?= $page['img_alt'] ?></p>
    <p><span class="label-list">Image source: </span> <?= $page['img_src'] ?></p>
    <p><span class="label-list">Menu title: </span> <?= $page['nav_title'] ?></p>
</div>

<div class="links-wrapper">
    <a href="index.php" class="show-link">Admin Homepage</a><br>
    <a href="edit.php?id=<?= $page['id'] ?>" class="show-link">Edit page</a><br>
    <a href="delete.php?id=<?= $page['id'] ?>" class="show-link">Delete page</a>
</div>


