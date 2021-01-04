<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConferencesActive extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_cm',
        'room_type',
        'room_pin',
            'name',
            'name_url',         
           
            'access_type',
            'lobby_enabled',
            'lobby_description',
            'registration_enabled',
            'status',
            'timezone',
            'timezone_offset',
            'paid_enabled',
            'automated_enabled',
            'created_at',
            'updated_at',
            'type',
            'permanent_room',    
            'room_url',
            'phone_presenter_pin',
            'phone_listener_pin',
            'embed_room_url',
            'widgets_hash',           
            'autologin_hash', 

    ];
    
    
}
