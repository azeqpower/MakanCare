<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use App\Models\User;

class FoodBankRequest extends Model
{
    protected $fillable = [
        'name', 'latitude','longitude', 'description', 'status'
    ];
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}