<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'team_id',
        
        'name',
    ];
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }   // employees()

    public function emoloyee(){
        return $this->hasMany(Employee::class);
    }
    public function team(){
        return $this->belongsTo(Team::class);
    }
}
