<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Services extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_id'];

    public function images(): HasMany
    {
        return $this->hasMany(ServicesImage::class, 'service_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();
        static::deleted(function ($model) {
            $model->images()->delete();
        });
    }
}
