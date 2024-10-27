<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supir extends Model
{
    use HasFactory;
    protected $table = 'supir';
	protected $guarded = ['id'];
	protected $primaryKey = 'id';
}