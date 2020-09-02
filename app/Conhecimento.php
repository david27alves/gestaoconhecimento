<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conhecimento extends Model
{
    protected $fillable = ['titulo', 'descricao', 'anexos', 'id_categoria', 'id_usuario'];

    public function categoria() {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
