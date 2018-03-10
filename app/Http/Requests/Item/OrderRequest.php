<?php

namespace App\Http\Requests\Item;

use App\Http\Requests\Request;
use App\Item;

class OrderRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $item = Item::findOrFail($this->item_id);


        return [
            'item_id' => [
                'required',
                'integer',
            ],
            'hours' => [
                'required',
                'integer',
                'max:' . $item->max_hours,
            ],
            'prefer_date' => [
                'required',
                'date',
                'after:yesterday',
            ],
            'prefer_hour' => [
                'required',
                'regex:/^([0-9]{2}:[0-9]{2})$/',
            ],
            'prefer_date2' => [
                'date',
                'after:yesterday',
            ],
            'prefer_hour2' => [
                'regex:/^([0-9]{2}:[0-9]{2})$/',
            ],
            'prefer_date3' => [
                'date',
                'after:yesterday',
            ],
            'prefer_hour3' => [
                'regex:/^([0-9]{2}:[0-9]{2})$/',
            ],
        ];
    }

    /**
     * Get the validation error messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'item_id.required' => '"商品"は必ず選択してください',
            'hours.required' => '"利用時間"は必ず入力してください',
            'hours.integer' => '"利用時間"は整数をしてください',
            'hours.max' => '"利用時間"は:max時間以内で入力してください',
            'prefer_date.required' => '"希望日時(日)"は必ず入力してください',
            'prefer_date.date' => '"希望日時(日)"は日付を入力してください',
            'prefer_date.after' => '"希望日時(日)"は今日以降の日付を入力してください',
            'prefer_hour.required' => '"希望日時(時間)"は必ず入力してください',
            'prefer_hour.regex' => '"希望日時(時間)"は時間(hh:mm)をしてください',
            'prefer_date2.date' => '"希望日時(日)"は日付を入力してください',
            'prefer_date2.after' => '"希望日時(日)"は今日以降の日付を入力してください',
            'prefer_hour2.regex' => '"希望日時(時間)"は時間(hh:mm)をしてください',
            'prefer_date3.date' => '"希望日時(日)"は日付を入力してください',
            'prefer_date3.after' => '"希望日時(日)"は今日以降の日付を入力してください',
            'prefer_hour3.regex' => '"希望日時(時間)"は時間(hh:mm)をしてください',
        ];
    }
}
