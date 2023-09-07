<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "events";

    protected $fillable = [
        "name",
        "donor",
        "contact",
        "address",
        "description",
        "thumbnail",
        "begin",
        "finish",
    ];

}
