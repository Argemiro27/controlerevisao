<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposVariacao extends Model
{
    use HasFactory;
    protected $table = 'tipos_variacao';
    protected $fillable = [
        'nome',
    ];
    public function variaProduto()
    {
        return $this->hasMany(VariaProduto::class);
    }

    public function variacao()
    {
        return $this->hasMany(Variacao::class);
    }
}
