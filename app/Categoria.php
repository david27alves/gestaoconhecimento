<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['descricao'];

    public function conhecimento() {
        return $this->hasMany(\App\Models\Conhecimento::Class);
    }
}
