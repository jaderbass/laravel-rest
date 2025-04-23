<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    // The table associated with the model.
    public function songs()
    {
        return $this->hasMany(Song::class, 'labels_id_ref');
    }
}
