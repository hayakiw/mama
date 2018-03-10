<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Item extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'staff_id', 'category_id',
        'title', 'image',
        'price', 'max_hours',
        'location', 'description',
    ];

    protected static $meetingTypes = [
        '対面',
        '電話',
        'メッセージ',
    ];

    protected static $areas = [
        '西部', '中部', '東部',
    ];

    public static function getAreas()
    {
        return static::$areas;
    }

    public static function getMeetingTypes()
    {
        return static::$meetingTypes;
    }

    public function hasImage()
    {
        return isset($this->image) && !empty($this->image);
    }

    public static function getImageDir()
    {
        return public_path(config('my.item.image_path'));
    }

    public function getImagePath()
    {
        return config('my.item.image_path') . '/' . $this->image;
    }

    public function imageUrl()
    {
        if (!$this->image) {
            return null;
        }

        return asset(config('my.item.image_path')) . '/' . $this->image;
    }

    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }
}
