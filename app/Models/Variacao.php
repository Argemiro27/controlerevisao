<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variacao extends Model
{
    use HasFactory;
    protected $table = 'variacao';
    protected $fillable = [
        'estoque',
        'preco',
        'tipovariacao_id',
        'variacao'
    ];

    public function tipoVariacao()
    {
        return $this->belongsTo(TiposVariacao::class, 'tipovariacao_id');
    }
    public function produtos()
    {
        return $this->hasMany(Produtos::class);
    }
}
