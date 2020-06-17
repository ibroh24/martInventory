<?php

namespace App;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    use Notifiable;

    protected $fillable = [
        'uomname', 'uomdescription', 'uomslug'
    ];
}
