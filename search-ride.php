<?php

use Service\Post\PostService;

require_once 'app.php';

if(isset($_POST['searchRide'])){
    $townFrom = intval($_POST['searchFrom']);
    $townTo = intval($_POST['searchDestination']);
    $departureDate = new DateTime($_POST['searchDate']);
    $seats = intval($_POST['searchSeats']);

    $postsService = new PostService($db);
    /** @var $searchResult \Data\Posts\AllPostsViewData */
    $searchResult = $postsService->findSearched($townFrom, $townTo, $departureDate, $seats);

}
?>
<?php $found = false; ?>
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
    <?php foreach ($searchResult->getPosts() as $post): ?>
        <?php $found = true; ?>
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
    <?php if(!$found): ?>
        <h1>No matches found</h1>
    <?php endif; ?>
</tbody>
</table>