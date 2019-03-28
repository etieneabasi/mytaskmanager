<?php

namespace Etieneabasi\MyTaskManager\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    public function task()
    {
        return $this->hasMany("\Etieneabasi\MyTaskManager\Models\Task", "Category_id");
    }
}
