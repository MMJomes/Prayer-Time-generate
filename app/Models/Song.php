<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $table = 'songs';
    protected $fillable = [
        'name',
        'subscriber_id',
        'box_id',
        'prayerzone',
        'prayertimedate',
        'prayertimeseq',
        'prayertime',
    ];

    public function box(){
        return $this->belongsTo(Box::class, 'box_id');
    }
    public function subscriber(){
        return $this->belongsTo(Subscriber::class, 'subscriber_id');
    }

}
