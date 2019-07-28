<?php
/**
 * @var array $users
 * @var \App\models\User $user
 */

foreach ($users as $user)
{
    echo<<<php
    <a href="?a=user&id={$user->id}">
        {$user->fio}
    </a>
    <a href="?a=delete&id={$user->id}">
        Удалить
    </a>  
    <hr>
php;


}
