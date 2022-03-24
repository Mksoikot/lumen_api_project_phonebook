<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class registationModel extends Model
{
    protected $table = "registation";
    protected $primarykey = "id";
    public $incrementing = true;
    protected $keyType = "int";
    public $timestamps = false;
}