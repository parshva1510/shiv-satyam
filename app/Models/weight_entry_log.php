<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class weight_entry_log extends Model
{
    use HasFactory;
    protected $table = 'weight_entry_log';
    protected $primaryKey = 'sr_no';
    public $timestamps = false;
}
