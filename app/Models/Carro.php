<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $table = 'carros';
    protected $fillable = ['marca', 'modelo', 'placa', 'id_proprietario'];

    public function proprietario()
    {
        return $this->belongsTo(Proprietario::class, 'id_proprietario');
    }

    public function revisoes()
    {
        return $this->hasMany(Revisao::class);
    }
}
