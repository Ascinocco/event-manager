<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Event extends Model
{
    use Notifiable;

    /**
     * Attribute that are mass assignable
     */
    protected $fillable = [
        'title', 'description', 'location',
        'attire', 'date'
    ];

    /**
     * Get the users associated with the events
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}