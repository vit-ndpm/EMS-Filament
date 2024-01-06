<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    
        protected $fillable=[
            'name',
            'slug',
        ];
public function employee(){
    return $this->hasMany(Employee::class);
}
  public function department(){
    return $this->belongsTo(Team::class);
  }      
}
