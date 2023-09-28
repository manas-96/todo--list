<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class to_do_list extends Model
{
    use HasFactory;
    protected $table="to_do_lists";
    protected $primarykey ="id";
}
