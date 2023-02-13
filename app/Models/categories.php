<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $fillable = [
        'user_id',
        'name',
    ];
    public function user(){
        //relation one to one berween id(users) and user_id(categories)
        return $this->hasOne(User::class,'id','user_id');
    }
    use HasFactory;
}
