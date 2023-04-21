<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customButton extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'page_id',
    ];


    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}


