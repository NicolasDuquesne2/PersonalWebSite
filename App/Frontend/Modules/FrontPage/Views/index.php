<?php

foreach($descriptionsList as $describ)
{
    ?>
        <?= "<div class='texts' id='".$describ['_idcss']."'>"?>
            <div class="titles">
            <?='<img src="images/'.$describ['_imageArray']['source'].'" alt="'.$describ['_imageArray']['alt'].'" title="'.$describ['_imageArray']['title'].'" >'?>
            
                <h2><?= $describ['_title'] ?></h2>
            </div>
            <div class="texts_1">
                <p>
                    <?= $describ['_textsArray'][0]?>
                </p>
            </div>
            <div class="texts_2">
                <p>
                    <ul>
                    <?php
                        $max = count($describ['_textsArray'])-1;
                        for($i = 1; $i<=$max; $i++){?>
                        <li><?= $describ['_textsArray'][$i] ?></li>
                    <?php } ?>
                    </ul>
                </p>
            </div>
        </div >
        <div class="clear"></div>
    <?php
}   ?>