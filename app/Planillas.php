<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planillas extends Model
{
    public function consejo()
    {
        return $this->belongsTo("App\ConsejoComunal", "cc_id");
    }

    public function comuna()
    {
        return $this->belongsTo("App\Comuna", "comuna_id");
    }

    public function sectores()
    {
        return $this->belongsTo("App\Sectores", "cc_id");
    }

    public function participantesTotal()
    {
        return $this->hasMany("App\Participantes", "planilla_id")->count();
    }

    public function participantes()
    {
        return $this->hasMany("App\Participantes", "planilla_id");
    }
}
