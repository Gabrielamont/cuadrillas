<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsejoComunal extends Model
{
    protected $table    = "consejos_comunales";
    protected $fillable = ["nombre", "descripcion", "comuna_id"];

    public function comuna()
    {
        return $this->belongsTo("App\Comuna", "comuna_id");
    }

    public function sectores()
    {
        return $this->hasMany("App\Sectores", "cc_id");
    }
}
