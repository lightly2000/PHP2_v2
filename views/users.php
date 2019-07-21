<?php
/**
 * @var array $users
 * @var \App\models\User $user
 */

foreach ($users as $user)
{
    $userName = $user->fio;
    $userId = $user->id;
    $link = "<a href=" . "?c=user&a=user&id=" . $userId . ">" . $userName . "</a>";
    //  var_dump($link);
    echo $link . "<hr>";
}