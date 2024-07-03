<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;

    protected $fillable = ['farmer_id', 'consultant_id'];

    public function consultant()
    {
        return $this->belongsTo(\App\Models\Consultant::class, 'consultant_id');
    }
}
