<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'farmers_id',
        'consultants_id',
        'date',
    ];

    public function consultant()
    {
        return $this->belongsTo('App\Models\Consultant', 'consultants_id');
    }

    public function farmer()
    {
        return $this->belongsTo('App\Models\Farmer', 'farmers_id');
    }
}
