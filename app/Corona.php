<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corona extends Model
{
    protected $fillable = [
        'country_id',
        'symptoms',
        'cases'
    ];

    /**
     * estabelecendo a associação entre as classes
     * 'Corona' e 'Pais'
     */
    public function pais() {
        return $this->belongsTo(Pais::class, 'country_id');
    }
}
