<?php

namespace Etieneabasi\MyTaskManager\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function task()
    {
        return $this->hasMany("\Etieneabasi\MyTaskManager\Models\Task", "Category_id");
    }
}
