<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whether extends Model
{
    use HasFactory;

    protected $table = 'wethers';

    protected $fillable = [
        'datename',
        'weather',
        'text',
        'update_at',
        'create_at',
    ];
}
