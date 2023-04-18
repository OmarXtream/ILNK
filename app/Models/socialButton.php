<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class socialButton extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'platform',
        'url',
        'page_id',
    ];


    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    public function Icon(){
    return 'fab fa-twitter text-info';
    }
}
