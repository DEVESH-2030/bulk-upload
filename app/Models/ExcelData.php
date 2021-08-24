<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcelData extends Model
{
    use HasFactory;

    protected $table = 'bulk_upload';
    protected $guarded = array();
    protected $fillable = [
        'name',
        'email',
    ];
}
