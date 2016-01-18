<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [
        'id',
        'in_or_out',
        'user',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'due_date',
        'created_at',
        'updated_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equipment()
    {
        return $this->belongsTo('App\Equipment', 'equipment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo('App\Person', 'person_id');
    }

    /**
     * @param $query
     * @param $id
     * @return mixed
     */
    public function scopeFindLatest($query, $id)
    {
        return $query->where('equipment_id', $id)->orderBy('created_at', 'desc')->first();
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