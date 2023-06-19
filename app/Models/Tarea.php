<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $table = "tareas";

    protected $fillable = [
        "id",
        "titulo",
        "descripcion",
        "estado",
        "proyecto_id",
        "user_id"
    ];

    public function proyecto() {
        return $this->belongsTo(Proyecto::class,'proyecto_id');
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }
}
