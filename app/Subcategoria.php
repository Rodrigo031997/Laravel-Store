<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategoria extends Model
{
    use SoftDeletes;
    protected $table = 'subcategorias';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nombre_subcategoria',
        'categoria_id'
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria', 'categoria_id');
    }
    
}
