<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vocero extends Model
{
    protected $table = "voceros";
    protected $fillable = ["nombre", "apellido", "cedula", "telefono", "cc_id"];
    
    public function cc(){
      return $this->belongsTo("App\ConsejoComunal", "cc_id");
    } 
}
