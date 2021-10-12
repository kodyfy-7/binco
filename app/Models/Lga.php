<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    use HasFactory;

    //Table Name
    protected $table = 'lga';

    // Primary Key
    public $primaryKey = 'lga_id';

    public function polling_units()
    {
        return $this->hasMany(PollingUnit::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

}
