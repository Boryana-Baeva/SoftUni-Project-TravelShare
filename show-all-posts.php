<?php

use Service\Post\PostService;

require_once 'app.php';


$postsService = new PostService($db);

/** @var $posts \Data\Posts\AllPostsViewData */
$posts = $postsService->findAll();

?>

<table border="1" cellspacing="2" cellpadding="5">
    <thead>
    <tr>
        <th>Потребител</th>
        <th>Публикувано на</th>
        <th>От</th>
        <th>До</th>
        <th>Дата и час на тръгване</th>
        <th>Цена</th>
        <th>Свободни места</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($posts->getPosts() as $post): ?>
        <tr>
            <td><?= $post->getAuthor(); ?></td>
            <td><?= $post->getDatePublished(); ?></td>
            <td><?= $post->getTownFrom(); ?></td>
            <td><?= $post->getTownTo(); ?></td>
            <td><?= $post->getDepartureTime(); ?></td>
            <td><?= $post->getPrice(); ?></td>
            <td><?= $post->getSeats(); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
