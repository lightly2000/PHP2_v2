<?php
/**
 * @var array $goods
 * @var \App\models\Good $good
 */

foreach ($goods as $good)
{
    $goodName = $good->name;
    $goodId = $good->id;
    $link = "<a href=" . "?c=good&a=good&id=" . $goodId . ">" . $goodName . "</a>";
    //  var_dump($link);
    echo $link . "<hr>";
}