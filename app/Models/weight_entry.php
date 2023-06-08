<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class weight_entry extends Model
{
    use HasFactory;

    protected $table='weight_entry';
    protected $primaryKey='sr_no';
    public $timestamps=false;
   
}
