<?php

namespace Etieneabasi\MyTaskManager\Models;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{


    public function category()
    {
        return $this->belongsTo("\Etieneabasi\MyTaskManager\Models\Category");
    }
   
}
