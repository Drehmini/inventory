<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillabe = [
        'first_name',
        'last_name',
        'email',
        'address',
        'address_2',
        'city',
        'state',
        'zip_code',
        'phone_number',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
}
