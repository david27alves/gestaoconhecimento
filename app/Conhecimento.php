<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conhecimento extends Model
{
    protected $fillable = ['titulo', 'descricao', 'anexos', 'id_categoria'];

    public function categoria() {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
