<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncedPuResult extends Model
{
    use HasFactory;

    //Table Name
    protected $table = 'announced_pu_results';

    protected $guarded = [];

    //Timestamps
    public $timestamps = false;

}
