<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assists extends Model
{
    use HasFactory;

    protected $table = 'assists';

    protected $fillable = [
        'employee_id',
        'date',
        'entry_time',
        'exit_time'
    ];
}
