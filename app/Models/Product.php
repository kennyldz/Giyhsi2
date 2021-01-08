<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    function  getCategory(){

     return   $this->hasOne('app\Models\category','id','categoryID');

    }


    function Products(){

        return   $this->hasMany('app\Models\category','id','categoryID');
    }




}
