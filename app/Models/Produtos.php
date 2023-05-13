<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'nome_produto',
        'sku',
        'foto',
        'descricao',
        'estoqueprod',
        'preco',
    ];

    public function usuario()
    {
        return $this->hasMany(Usuarios::class);
    }

    public function variacao()
    {
        return $this->belongsTo(Variacao::class);
    }
    public function variaProduto()
    {
        return $this->hasMany(VariaProduto::class);
    }

}
