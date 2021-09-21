<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $fillable = [
        'nome_pais',
        'sigla',
        'continente'
    ];

    /**
     * estabelecendo a associação entre as classes
     * 'Pais' e 'Corona'
     */
    public function corona() {
        // retornando o tipo de associação entre as classes
        return $this->hasMany(Corona::class);
    }
}
