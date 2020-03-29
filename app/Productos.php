<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Productos extends Model
{
    use SoftDeletes;
    protected $table = 'productos';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'stock',
        'precio',
        'u_m'
    ];

    public function subcategorias()
    {
        return $this->belongsTo('App\Subcategoria', 'subcategoria_id', 'id');
    }

}
