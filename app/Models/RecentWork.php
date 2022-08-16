<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ImageTrait;

class RecentWork extends Model
{
    use HasFactory, ImageTrait;
    protected $fillable = ['title', 'subTitle', 'background_image', 'user_id','type'];
}
