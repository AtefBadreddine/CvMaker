<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

class CV extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "user_id",
        "title",
        "uuid",
        "lang",
        "template",
        "color",
        "cv_data",
        "path"
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'cv_data' => 'object'
    ];

    function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function getCvDataAttribute($json)
    {
        return json_decode($json, JSON_UNESCAPED_UNICODE);
    }

    public function langDetails()
    {
        $langDetails = array_filter(\App\Utils\CV::LANGUAGES, fn($lang) => $this->lang == $lang['code']);
        if(count($langDetails) == 0) return NULL;
        Log::info('lang ' . json_encode($langDetails));
        return array_values($langDetails)[0];
    }
}
