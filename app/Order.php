<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Order extends Model
{
    use SoftDeletes;

    const ORDER_STATUS_NEW = 'new';
    const ORDER_STATUS_OK = 'ok';
    const ORDER_STATUS_NG = 'ng';
    const ORDER_STATUS_PAID = 'paid';
    const ORDER_STATUS_ENDED = 'ended';

    protected static $status = [
        self::ORDER_STATUS_NEW => '依頼中',
        self::ORDER_STATUS_OK => '成立',
        self::ORDER_STATUS_NG => '不成立',
        self::ORDER_STATUS_PAID => '申請中',
        self::ORDER_STATUS_ENDED => '終了',
    ];

    protected $fillable = [
        'user_id', 'item_id',
        'title', 'hours', 'price',
        'prefer_at', 'prefer_at2', 'prefer_at3',
        'work_at',
        'status', 'comment', 'staff_comment', 'ordered_token'
    ];

    protected static $meetingTypes = [
        '対面',
        '電話',
        'メッセージ',
    ];

    public static function getMeetingTypes()
    {
        return static::$meetingTypes;
    }

    public function getStatus()
    {
        return self::$status[$this->status];
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function item()
    {
        return $this->belongsTo('App\Item');
    }

    public function pay()
    {
        return $this->hasOne('App\Pay');
    }
}
