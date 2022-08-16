<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Traits\ImageTrait;

class About extends Model
{
    use HasFactory, ImageTrait;

    protected $fillable = ['title', 'description', 'image_field', 'user_id'];

    public function aboutProgress(): HasMany
    {
        return $this->hasMany(AboutProgress::class, 'about_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();
        static::deleted(function ($model) {
            $model->aboutProgress()->delete();
        });
    }
}
