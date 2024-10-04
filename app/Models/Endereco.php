<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Endereco extends Model {

    use HasFactory;

    //força a exibição o UUID na lista da blade
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'enderecos';

    //usado para populas as datas na tabela automáticamente
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        "id",
        "user_id",
        "cep",
        "logradouro",
        "complemento",
        "bairro",
        "cidade",
        "estado",
        "endereco_tipo",
    ];

    public static function boot() {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }
}
