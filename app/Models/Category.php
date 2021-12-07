<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getLists(){
        $categories = Category::pluck('name','id');
        return $categories;
    }
}
