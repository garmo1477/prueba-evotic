<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Propietario;

class Coche extends Model
{
    use HasFactory;

    protected $fillable = ['propietario_id','modelo','marca','color','caballos'];

    public function propietario()
    {
        return $this->belongsTo(Propietario::class, 'propietario_id');
    }
}
