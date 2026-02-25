<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'responsable',
        'description',
        'location',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
    ];

    /**
     * Relation : un événement possède plusieurs shifts.
     */
    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }

    /**
     * Relation : un événement possède plusieurs entrées de main courante.
     */
    public function entries()
    {
        return $this->hasMany(MainCourante::class, 'event_id');
    }

    /**
     * Relation indirecte : les utilisateurs assignés via les shifts.
     */
    public function users()
    {
        return $this->hasManyThrough(User::class, Shift::class);
    }

    public function mainCouranteEntries()
    {
        return $this->hasMany(MainCourante::class, 'event_id');
    }

}
