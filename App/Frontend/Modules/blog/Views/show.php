<p>Par <em><?= $news['_author'] ?></em>, le <?= $news['_creatDate']->format('d/m/Y à H\hi') ?></p>
<h2><?= $news['_title'] ?></h2>
<p><?= nl2br($news['_ntext']) ?></p>

<?php if ($news['_creatDate'] != $news['_modDate']) { ?>
  <p style="text-align: right;"><small><em>Modifiée le <?= $news['_modDate']->format('d/m/Y à H\hi') ?></em></small></p>
<?php } ?>