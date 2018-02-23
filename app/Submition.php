<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submition extends Model
{
    protected $table = "event_submitions";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id', 'name', 'lastname','mobile',
    ];
}
