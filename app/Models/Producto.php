<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $timestamps = false;
    #####################
    ### métodos de relaciones
    public function relTipo()
    {
        return $this->belongsTo(
                    Tipo::class,
                    'tipo',
                    'id'
                );
    }

        
}
