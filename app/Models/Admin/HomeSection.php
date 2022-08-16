<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ImageTrait;

class HomeSection extends Model
{
    use HasFactory, ImageTrait;
    protected $fillable = [
        'title', 'subTitle', 'background_image', 'user_id'
    ];
}
