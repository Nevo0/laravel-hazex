<?php

namespace App\Models;

use App\Models\ConferencesInactive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Session extends Model
{
    use HasFactory;
    public function conInActiv (){
        // https://youtu.be/MFh0Fd7BsjE?t=5072
        return $this->belongsTo(ConferencesInactive::class);
    }
}
