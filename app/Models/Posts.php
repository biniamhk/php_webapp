<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];
    //we need to make relationship between user and post tables inorder to access ¨
    //the data of a user through the foreignkey
    public function userConnection(){
        return $this->belongsTo(User::class,'user_id');
    }
}
