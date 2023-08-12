<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // TODO: conventions are important
    // TODO: put the uses at the top
    protected $fillable = ['name' , 'email' , 'subject' , 'message' , 'answered'];
    use HasFactory;

}
