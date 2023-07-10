<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revisao extends Model
{
    protected $table = 'revisoes';
    protected $fillable = ['data', 'tipo', 'descricao', 'id_carro'];

    public function carro()
    {
        return $this->belongsTo(Carro::class, 'id_carro');
    }
}
