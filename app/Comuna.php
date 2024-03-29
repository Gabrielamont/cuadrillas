<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    protected $table = "comunas";
    
    protected $fillable = ["nombre", "descripcion"];
    
    public function cc()
    {
      return $this->hasMany("App\ConsejoComunal", "comuna_id");
    }
    
    public function ccTotal()
    {
      return $this->cc()->count();
    }
}
