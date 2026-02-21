<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MainCourante;


class Event extends Model
{
    protected $fillable = [
        'name', 'responsable', 'start_date', 'end_date', 'description'
    ];

    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }

    public function entries()
    {
        return $this->hasMany(MainCourante::class, 'event_id');
    }

}

