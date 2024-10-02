<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Evento extends Model {

    use HasFactory;

    //força a exibição o UUID na lista da blade
    public $incrementing = false;
    protected $keyType = 'string';

    //usado para populas as datas na tabela automáticamente
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'id',
        'titulo',
        'evento',
        'data',
        'hora',
        'local'
    ];

    public static function boot() {
        parent::boot();
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }
}
