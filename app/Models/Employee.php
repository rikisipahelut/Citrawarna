<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Employee extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
