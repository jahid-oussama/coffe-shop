<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodacts extends Model
{
    use HasFactory;
    protected $fillable=['name','category_id','description','image','prix'];

    public function category(){
        //relation one to one berween id(users) and user_id(categories)
        return $this->hasOne(category::class,'id','user_id');
    }
}
