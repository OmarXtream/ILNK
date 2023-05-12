<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function url(){
        return "/".$this->user->username;
    }

    public function logoPath(){
        $path = $this->user->username."/".$this->logo;

        return \Storage::url($path);
        // if(\Storage::disk('public')->exists($path)){

        // }else{
        // return "https://h.top4top.io/p_26556of4t1.png";
        // }
    }

    public function bgPath(){
        return \Storage::url($this->user->username."/".$this->bgImg);
    }


    public function socialButtons(): HasMany
    {
        return $this->hasMany(socialButton::class);
    }

    public function customButtons(): HasMany
    {
        return $this->hasMany(customButton::class);
    }

    public function menuProducts(): HasMany
    {
        return $this->hasMany(menuProduct::class);
    }


}
