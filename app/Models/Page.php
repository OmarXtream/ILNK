<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'logo',
        'des',
        'bgColor',
        'bgImg',
        'menuType',
        'menuLink',
        'menuTitle',
        'theme_id',
        'status',
    ];


    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }

 
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
