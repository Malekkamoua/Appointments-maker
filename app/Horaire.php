<?php

namespace App;

use App\Date;
use App\Fiche;
use Illuminate\Database\Eloquent\Model;

class Horaire extends Model
{
    public $timestamps = false;

    public function fiche() {
        return $this->hasOne(Fiche::class);
    }
}
