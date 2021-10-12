<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollingUnit extends Model
{
    use HasFactory;

    //Table Name
    protected $table = 'polling_unit';

    protected $guarded = [];

    //Timestamps
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'polling_unit_number';
    }

    public function lga()
    {
        return $this->belongsTo(Lga::class);
    }
}
