<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;
    protected $table = 'boxes';
    protected $fillable = [
        'name',
        'prayerzone',
        'subscriber_id',
    ];

    public function subscriber(){
        return $this->belongsTo(Subscriber::class, 'subscriber_id');
    }
}
