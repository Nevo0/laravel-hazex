<?php

namespace App\Models;

// use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body'
    ];

    public function user (){
        // https://youtu.be/MFh0Fd7BsjE?t=5072
        return $this->belongsTo(User::class);
    }

}
