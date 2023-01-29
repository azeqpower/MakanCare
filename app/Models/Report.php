<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\Marker;
Use App\Models\ReportCategory;
Use App\Models\User;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'marker_id','categories_id', 'description', 'status'
    ];
    protected $primaryKey = 'id';

    public function marker(){
        return $this->belongsTo(Marker::class);
    }

    public function reportcategory(){
        return $this->belongsTo(ReportCategory::class);
  
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
