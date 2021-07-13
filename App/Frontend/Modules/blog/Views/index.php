<?php

foreach($newsList as $news)
{
    ?>
        <h2><a href="news-<?= $news['_id'] ?>.html"><?= $news['_title'] ?></a></h2>
        <p><?= nl2br($news['_ntext']) ?></p>
    <?php
}