<?php

namespace App;

use App\Subcategoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;
    protected $table = 'categorias';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nombre',
    ];

    public function subcategorias()
    {
        return $this->hasMany('App\Subcategoria', 'categoria_id', 'id');
    }

}


