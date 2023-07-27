<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ledger extends Model
{
    use HasFactory;
    protected $table='ledger';
    protected $primaryKey='t_index';
    public $timestamps=false;

}
