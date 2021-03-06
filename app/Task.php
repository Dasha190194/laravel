<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    //разрешаем заполнять
    protected $fillable = ['name'];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
