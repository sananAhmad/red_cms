<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subTitle', 'user_id'];

    public function clientReview(): HasMany
    {
        return $this->hasMany(ClientReview::class, 'client_id', 'id');
    }
    protected static function boot()
    {
        parent::boot();
        static::deleted(function ($model) {
            $model->clientReview()->delete();
        });
    }
}
