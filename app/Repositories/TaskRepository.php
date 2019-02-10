<?php
/**
 * Created by PhpStorm.
 * User: dasha
 * Date: 10.02.19
 * Time: 7:50
 */


namespace App\Repositories;

use App\User;

class TaskRepository
{
    /**
     * Получить все задачи заданного пользователя.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return $user->tasks()
            ->orderBy('created_at', 'asc')
            ->get();
    }
}