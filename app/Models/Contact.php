<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\RandomColorHelper;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

     protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'gender',
        'birthday',
        'company_name',
        'job_title',
        'photo',
        'user_id',
        'team_id',
        'starred',
        'pinned',
        'calendar_color'
    ];
}
