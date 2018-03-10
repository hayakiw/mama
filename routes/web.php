<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
    'as' => 'root.index',
    'uses' => 'RootController@index',
]);

// サービス一覧（カテゴリ、都道府県、タグ別に絞込み可）
Route::get('items', [
    'as' => 'item.index',
    'uses' => 'ItemController@index',
]);

// サービス詳細
Route::get('item/{item}', [
    'as' => 'item.show',
    'uses' => 'ItemController@show',
])->where('item', '[0-9]+');

// スタッフプロフィール
Route::get('staff/{staff}', [
    'as' => 'staff.show',
    'uses' => 'StaffController@show',
])->where('staff', '[0-9]+');

// お問い合わせ
Route::resource(
    'contact',
    'ContactController',
    ['only' => ['index','store']]
);


// 利用規約
Route::get('agreement', [
    'as' => 'static.agreement',
    function () {
        return view('static/agreement');
    }
]);

// プライバシーポリシー
Route::get('privacy', [
    'as' => 'static.privacy',
    function () {
        return view('static/privacy');
    }
]);

// 特定商取引法に基づく表記
Route::get('commercial', [
    'as' => 'static.commercial',
    function () {
        return view('static/commercial');
    }
]);


Route::group(['middleware' => ['guest:web']], function () {
    Route::get('signin', [
        'as' => 'auth.signin_form',
        'uses' => 'AuthController@signinForm',
    ]);

    Route::post('signin', [
        'as' => 'auth.signin',
        'uses' => 'AuthController@signin',
    ]);

    // パスワード再設定
    Route::get('reset_password/request', [
        'as' => 'reset_password.request_form',
        'uses' => 'ResetPasswordController@requestForm',
    ]);

    Route::post('reset_password/request', [
        'as' => 'reset_password.request',
        'uses' => 'ResetPasswordController@request',
    ]);

    Route::get('reset_password/reset/{token?}', [
        'as' => 'reset_password.reset_form',
        'uses' => 'ResetPasswordController@resetForm',
    ]);

    Route::put('reset_password/reset', [
        'as' => 'reset_password.reset',
        'uses' => 'ResetPasswordController@reset',
    ]);

    // 会員登録
    Route::get('user/create', [
        'as' => 'user.create',
        'uses' => 'UserController@create',
    ]);

    Route::post('user', [
        'as' => 'user.store',
        'uses' => 'UserController@store',
    ]);
});

Route::group(['middleware' => ['auth:web']], function () {
    Route::get('signout', [
        'as' => 'auth.signout',
        'uses' => 'AuthController@signout',
    ]);

    Route::post('item/order', [
        'as' => 'item.order',
        'uses' => 'ItemController@order',
    ]);

    Route::post('item/pay', [
        'as' => 'item.pay',
        'uses' => 'ItemController@pay',
    ]);

    // お知らせ
    Route::resource('orders', 'OrderController', ['only' => [
        'show', 'index',
    ]]);

    Route::get('user/cancel', [
        'as' => 'user.cancel_form',
        'uses' => 'UserController@cancelForm',
    ]);

    Route::delete('user/cancel', [
        'as' => 'user.cancel',
        'uses' => 'UserController@cancel',
    ]);
});


Route::group(['namespace' => 'Staff', 'prefix' => 'staff'], function () {
    Route::group(['middleware' => ['guest:staff']], function () {
        Route::get('signin', [
            'as' => 'staff.auth.signin_form',
            'uses' => 'AuthController@signinForm',
        ]);

        Route::post('signin', [
            'as' => 'staff.auth.signin',
            'uses' => 'AuthController@signin',
        ]);

        // パスワード再設定
        Route::get('reset_password/request', [
            'as' => 'staff.reset_password.request_form',
            'uses' => 'ResetPasswordController@requestForm',
        ]);

        Route::post('reset_password/request', [
            'as' => 'staff.reset_password.request',
            'uses' => 'ResetPasswordController@request',
        ]);

        Route::get('reset_password/reset/{token?}', [
            'as' => 'staff.reset_password.reset_form',
            'uses' => 'ResetPasswordController@resetForm',
        ]);

        Route::put('reset_password/reset', [
            'as' => 'staff.reset_password.reset',
            'uses' => 'ResetPasswordController@reset',
        ]);

        // 会員登録
        Route::get('user/create', [
            'as' => 'staff.user.create',
            'uses' => 'UserController@create',
        ]);

        Route::post('user', [
            'as' => 'staff.user.store',
            'uses' => 'UserController@store',
        ]);

        Route::get('user/confirmation/{token?}', [
            'as' => 'staff.user.confirmation',
            'uses' => 'UserController@confirmation',
        ]);
    });

    Route::group(['middleware' => ['auth:staff']], function () {

        Route::get('signout', [
            'as' => 'staff.auth.signout',
            'uses' => 'AuthController@signout',
        ]);

        Route::get('/', [
            'as' => 'staff.root.index',
            'uses' => 'RootController@index',
        ]);

        Route::get('user/show', [
            'as' => 'staff.user.show',
            'uses' => 'UserController@show',
        ]);

        // プロフィール編集
        Route::get('user/edit', [
            'as'   => 'staff.user.edit',
            'uses' => 'UserController@edit',
        ]);

        // プロフィール更新
        Route::put('user/update', [
            'as'   => 'staff.user.update',
            'uses' => 'UserController@update',
        ]);

        //口座情報 編集
        Route::get('user/edit_bank', [
            'as' => 'staff.user.edit_bank',
            'uses' => 'UserController@editBank',
        ]);

        //口座情報 更新
        Route::put('user/update_bank', [
            'as' => 'staff.user.update_bank',
            'uses' => 'UserController@updateBank',
        ]);


        //ユーザー メール変更
        Route::get('user/edit_email', [
            'as' => 'staff.user.edit_email',
            'uses' => 'UserController@editEmail',
        ]);


        //ユーザー メール変更 メール送信
        Route::put('user/request_email', [
            'as' => 'staff.user.request_email',
            'uses' => 'UserController@requestEmail',
        ]);

        //ユーザー メール変更 更新
        Route::get('user/update_email/{token?}', [
            'as' => 'staff.user.update_email',
            'uses' => 'UserController@updateEmail',
        ]);


        //ユーザー パスワード変更
        Route::get('user/edit_password', [
            'as' => 'staff.user.edit_password',
            'uses' => 'UserController@editPassword',
        ]);

        //ユーザー パスワード変更 更新
        Route::put('user/update_password', [
            'as' => 'staff.user.update_password',
            'uses' => 'UserController@updatePassword',
        ]);

        // マイページ
        Route::get('my', [
            'as' => 'staff.my.index',
            'uses' => 'MyController@index',
        ]);

        // 認証の必要なItemページ（作成、編集、削除）
        Route::resource('item', 'ItemController', [
            'as' => 'staff',
            'expect' => [
                'show',
            ],
        ]);

        // 認証の必要なItemページ（作成、編集、削除）
        Route::resource('orders', 'OrderController', [
            'as' => 'staff',
            'only' => [
                'show', 'index', 'update',
            ]
       ]);
    });
});

Route::group(['namespace' => '_Admin', 'prefix' => '_admin'], function () {

    Route::group(['middleware' => ['guest:admin']], function () {

        Route::get('signin', [
            'as' => '_admin.auth.signin_form',
            'uses' => 'AuthController@signinForm',
        ]);

        Route::post('signin', [
            'as' => '_admin.auth.signin',
            'uses' => 'AuthController@signin',
        ]);

    });


    Route::group(['middleware' => ['auth:admin']], function () {

        Route::get('signout', [
            'as' => '_admin.auth.signout',
            'uses' => 'AuthController@signout',
        ]);

        Route::get('/', [
            'as' => '_admin.root.index',
            'uses' => 'RootController@index',
        ]);

        // お知らせ
        Route::resource('notices', 'NoticeController', ['only' => [
            'show', 'index', 'store', 'create', 'edit', 'update', 'destroy',
        ]]);

        // カテゴリ
        Route::resource('categories', 'CategoryController', ['except' => [
            'show', 'index', 'create',
        ]]);

        Route::get('categories/{parent?}', [
            'as' => 'categories.index',
            'uses' => 'CategoryController@index',
        ])->where('parent', '[0-9]+');

        Route::get('categories/create/{parent?}', [
            'as' => 'categories.create',
            'uses' => 'CategoryController@create',
        ])->where('parent', '[0-9]+');

        // 管理者管理
        Route::resource('admins', 'AdminController');

        // スタッフ管理
        Route::resource('staffs', 'StaffController');

        // スタッフ管理
        Route::resource('users', 'UserController');

        Route::post('staffs/cancel/{staff?}', [
            'as' => 'staffs.cancel',
            'uses' => 'StaffController@cancel',
        ])->where('staff', '[0-9]+');

    });

});
