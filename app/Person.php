<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Person extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_ap'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

    /**
     * @param Person $person
     * @return string
     */
    public function displayAddress(Person $person)
    {
        $states = DB::table('us_states')->lists('code');
        return $person->address . ' ' . $person->address_2
                            . ' ' . $person->city . ', ' . $states[$person->state]
                            . ' ' . $person->zip_code;
    }
}
