<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sectores extends Model
{
    public $table = "sectores";

    protected $fillable = ["nombre", "descripcion", "cc_id"];

    public function consejo()
    {
        return $this->belongsTo("App\ConsejoComunal", "cc_id");
    }
}
