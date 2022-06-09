<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'usersubject', 'user_id' /* de user */, 'subject_id' /* de subject */);
    }
}
