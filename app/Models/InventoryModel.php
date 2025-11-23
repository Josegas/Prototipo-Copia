<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryModel extends Model
{
    protected $table = 'inventarios';
    protected $fillable = ['id_cadena', 'id_sucursal', 'id_medicamento', 'stock_minimo', 'stock_maximo', 'stock_actual','precio_actual'];
    public $timestamps = false;

    public $incrementing = false;
    protected $primaryKey = null;
}