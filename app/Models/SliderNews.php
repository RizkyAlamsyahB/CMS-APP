<?php

namespace App\Models;

use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SliderNews extends Model
{
    use HasFactory;
    public function news()
    {
        return $this->hasOne(News::class, 'slider_news_id');
    }
}
