<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Staff extends Authenticatable
{
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($user) {
            //$user->items()->delete();
        });
    }

    protected $table = 'staffs';

    protected $fillable = [
        'email', 'password',
        'last_name', 'first_name', 'description', 'prefecture', 'area',
        'birth_at', 'sex',
        'confirmation_token', 'confirmation_sent_at',
        'confimarted_at',
        'bank_name',
        'bank_branch_name',
        'bank_account_number',
        'bank_account_last_name',
        'bank_account_first_name',
    ];

    protected $hidden = [
        'password',
        'reset_password_token',
        'remember_token',
        'change_email_token',
    ];

    protected static $areas = [
        '鳥取県' => ['西部', '中部', '東部'],
        '島根県' => ['西部', '中部', '東部'],
    ];

    protected static $sexs = [
        '男',
        '女',
    ];

    public static function getPrefuctuers()
    {
        return array_keys(static::$areas);
    }

    public static function getPrefuctuerAreas($prefucture)
    {
        if (!isset(static::$areas[$prefucture])) return null;

        return static::$areas[$prefucture];
    }

    public static function getAreas()
    {
        return ['西部', '中部', '東部'];
    }

    public static function getSexs()
    {
        return static::$sexs;
    }

    public function isConfimarted()
    {
        return !empty($this->confimarted_at);
    }

    public function items(){
        return $this->hasMany('App\Item');
    }

    public function getName()
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    public function getFullBankAccountName()
    {
        return $this->bank_account_last_name . ' ' . $this->bank_account_first_name;
    }

    public function saveImage($image)
    {
        if (!$this->id) {
            return false;
        }

        $this->image = $this->id . '.' . $image->guessExtension();

        if (!is_dir($this->imageDir())) {
            if (!mkdir($this->imageDir(), 0777, true)) {
                throw new Exception('Can not create directory: ' . $this->imageDir());
            }
        }

        $image->move($this->imageDir(), $this->image);

        \Image::make($this->imagePath())
            ->resize(480, null, function ($constraint) {
                $constraint->aspectRatio();
            }
        );

        $this->save();

        return true;
    }

    public function imageUrl()
    {
        if (!$this->image) {
            return null;
        }

        return asset(config('my.staff.image_path')) . '/' . $this->image;
    }

    public function imageDir()
    {
        return public_path(config('my.staff.image_path'));
    }

    public function imagePath()
    {
        return $this->imageDir() . '/' . $this->image;
    }
}
