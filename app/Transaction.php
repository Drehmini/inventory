<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillabe = [
        'in_or_out',
        'due_date',
        'equipment_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equipment()
    {
        return $this->belongsTo('App\Equipment', 'equipment_id');
    }

    public function person()
    {
        return $this->belongsTo('App\Person');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function scopeFindLatest($query, $id)
    {
        return $query->where('equipment_id', $id)->orderBy('created_at', 'desc')->firstOrFail();
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeGetOrdered($query)
    {
        return $query->orderBy('created_at', 'desc')->get();
    }
}