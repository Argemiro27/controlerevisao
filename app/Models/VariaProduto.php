<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariaProduto extends Model
{
    use HasFactory;
    
    protected $table = 'variaproduto';
    
    protected $fillable = [
        'id_produto',
        'id_variacao',
        'tipovariacao_id',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'id_produto');
    }
}