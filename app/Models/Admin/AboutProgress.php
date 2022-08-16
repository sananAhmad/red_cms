<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AboutProgress extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'percentage', 'about_id'];

    public function about(): BelongsTo
    {
        return $this->belongsTo(About::class, 'about_id', 'id');
    }
}
