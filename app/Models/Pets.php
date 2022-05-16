<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pets extends Model
{
    protected $fillable = [
        'name_of_pet', 'animal_type', 'owner', 'address_of_owner'
      ];
}
