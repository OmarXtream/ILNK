<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class menuProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'img',
        'price',
        'page_id',
    ];


    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
    

    public function image(){
        return \Storage::url($this->page->user->username."/".$this->img);
    }

}
