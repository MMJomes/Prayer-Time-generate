<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentSluggable\Sluggable;

class Resume extends Model
{
    use HasFactory,Notifiable,Sluggable;
    protected $table = 'resumes';
    protected $fillable = [
        'name',
        'nickname',
        'phone',
        'email',
        'dob',
        'line',
        'gender',
        'address',
        'nationality',
        'language',
        'description',
        'school',
        'degree',
        'major',
        'gpa',
        'hobby',
        'finish_date',
        'company',
        'position',
        'start_date',
        'end_date',
        'worked_address',
        'photo',

    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
