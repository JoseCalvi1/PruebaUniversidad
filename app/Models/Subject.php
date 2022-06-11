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
        return $this->belongsToMany(User::class, 'usersubject', 'subject_id' /* de subject */, 'user_id' /* de user */);
    }

    public function degrees()
    {
        return $this->belongsTo(Degree::class, 'degree_id');
    }
}
