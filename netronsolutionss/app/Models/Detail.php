<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'middlename',
        'icon',
        'type',
        'user_id',

    ];
    public function comments ()
    {
      return $this->hasMany(User::class , 'id' , 'user_id');
    }
}
