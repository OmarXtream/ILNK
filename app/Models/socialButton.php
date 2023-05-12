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
        
        switch ($this->platform) {
          case 1:
            $icon = '<i class="fab fa-twitter circulo" style="color:#1DA1F2;"></i>'; // Twitter icon with blue color
            break;
          case 2:
            $icon = '<i class="fab fa-facebook circulo" style="color:#3B5998;"></i>'; // Facebook icon with blue color
            break;
          case 3:
            $icon = '<i class="fab fa-linkedin circulo" style="color:#0A66C2;"></i>'; // LinkedIn icon with blue color
            break;
          case 4:
            $icon = '<i class="fab fa-instagram circulo" style="color:#E4405F;"></i>'; // Instagram icon with pink color
            break;
          case 5:
            $icon = '<i class="fab fa-snapchat circulo" style="color:#FFFC00;"></i>'; // Snapchat icon with yellow color
            break;
          case 6:
            $icon = '<i class="fab fa-tiktok circulo" style="color:#FF2D55;"></i>'; // TikTok icon with red color
            break;
          case 7:
            $icon = '<i class="fab fa-pinterest circulo" style="color:#BD081C;"></i>'; // Pinterest icon with red color
            break;
          case 8:
            $icon = '<i class="fab fa-discord circulo" style="color:#7289DA;"></i>'; // Discord icon with blue color
            break;
          case 9:
            $icon = '<i class="fab fa-github circulo" style="color:#211F1F;"></i>'; // Github icon with black color
            break;
          case 10:
            $icon = '<i class="fab fa-youtube circulo" style="color:#FF0000;"></i>'; // YouTube icon with red color
            break;
          case 11:
            $icon = '<i class="fab fa-twitch circulo" style="color:#6441A4;"></i>'; // Twitch icon with purple color
            break;
          case 12:
            $icon = '<i class="fas fa-map-marker-alt circulo" style="color:#F44336;"></i>'; // Map icon with red color
            break;
          case 13:
            $icon = '<i class="fas fa-globe circulo" style="color:#2196F3;"></i>'; // Website icon with blue color
            break;
          default:
            $icon = ''; // no icon
            break;
        }        
        
        return $icon; // output the icon
        

    }
}
