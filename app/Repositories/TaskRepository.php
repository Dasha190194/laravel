<?php
/**
 * Created by PhpStorm.
 * User: dasha
 * Date: 10.02.19
 * Time: 7:50
 */


namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\Cache;

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
        $count = $user->tasks()->count();
        $tasks = Cache::tags('count'.$count)->remember('task', 200, function () use ($user){
            return $user->tasks()
                ->orderBy('created_at', 'asc')
                ->get();
        });
        return $tasks;
    }

}