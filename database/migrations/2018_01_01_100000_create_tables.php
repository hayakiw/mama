<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //--------------------------------------------------
        // テーブル作成
        //--------------------------------------------------
        // 管理者
        Schema::create('admins', function (Blueprint $t) {
            $t->bigIncrements('id');

            $t->string('email');
            $t->string('password', 255);

            $t->rememberToken();

            $t->timestamps();
            $t->softDeletes();
        });

        // スタッフ
        Schema::create('staffs', function (Blueprint $t) {
            $t->bigIncrements('id');

            $t->string('email');
            $t->string('password', 255);

            $t->string('last_name', 255)->nullable();
            $t->string('first_name', 255)->nullable();
            $t->string('image', 255)->nullable()->comment('画像');

            $t->text('description')->comment('自己紹介');
            $t->string('prefecture', 255)->comment('県');
            $t->string('area', 255)->comment('エリア');
            $t->date('birth_at')->nullable()->comment('生年月日');
            $t->string('sex')->nullable()->comment('性別');

            $t->string('bank_name')->nullable()->comment('銀行名');
            $t->string('bank_branch_name')->nullable()->comment('支店名');
            $t->string('bank_account_number')->nullable()->comment('口座番号');
            $t->string('bank_account_last_name')->nullable()->comment('口座名義姓');
            $t->string('bank_account_first_name')->nullable()->comment('口座名義名');

            $t->rememberToken();

            $t->string('confirmation_token')->nullable()->comment('ユーザー登録時トークン');
            $t->datetime('confimarted_at')->nullable()->comment('ユーザー有効日付');
            $t->datetime('confirmation_sent_at')->nullable()->comment('ユーザー登録メール送信日時');

            $t->string('reset_password_token')->nullable()->comment('パスワード再設定用トークン');
            $t->datetime('reset_password_sent_at')->nullable()->comment('パスワード再設定のメール送信日時');

            $t->string('change_email')->nullable()->comment('変更後メールアドレス');
            $t->string('change_email_token')->nullable()->comment('メールアドレス変更用トークン');
            $t->datetime('change_email_sent_at')->nullable()->comment('メールアドレス変更のメール送信日時');

            $t->string('canceled_reason')->nullable()->comment('退会理由');
            $t->string('canceled_other_reason')->nullable()->comment('退会理由その他');
            $t->datetime('canceled_at')->nullable();

            $t->timestamps();
            $t->softDeletes();
        });

        // 利用者
        Schema::create('users', function (Blueprint $t) {
            $t->bigIncrements('id');

            $t->string('email');
            $t->string('password', 255);

            $t->string('last_name', 255)->nullable();
            $t->string('first_name', 255)->nullable();
            $t->date('birth_at')->nullable()->comment('生年月日');
            $t->string('sex')->nullable()->comment('性別');

            $t->rememberToken();

            $t->string('confirmation_token')->nullable()->comment('ユーザー登録時トークン');
            $t->datetime('confimarted_at')->nullable()->comment('ユーザー有効日付');
            $t->datetime('confirmation_sent_at')->nullable()->comment('ユーザー登録メール送信日時');

            $t->string('reset_password_token')->nullable()->comment('パスワード再設定用トークン');
            $t->datetime('reset_password_sent_at')->nullable()->comment('パスワード再設定のメール送信日時');

            $t->string('change_email')->nullable()->comment('変更後メールアドレス');
            $t->string('change_email_token')->nullable()->comment('メールアドレス変更用トークン');
            $t->datetime('change_email_sent_at')->nullable()->comment('メールアドレス変更のメール送信日時');

            $t->string('canceled_reason')->nullable()->comment('退会理由');
            $t->string('canceled_other_reason')->nullable()->comment('退会理由その他');
            $t->datetime('canceled_at')->nullable();

            $t->timestamps();
            $t->softDeletes();
        });

        // サービス
        Schema::create('items', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->bigInteger('staff_id')->unsigned()->comment('ユーザーID');
            $t->bigInteger('category_id')->unsigned()->comment('カテゴリID');

            $t->string('title', 255)->comment('タイトル');
            $t->string('image', 255)->nullable()->comment('画像');

            $t->string('location', 255)->comment('場所の詳細');
            $t->string('price', 10)->comment('1時間あたりの価格');
            $t->string('max_hours', 10)->comment('購入可能な時間');

            $t->text('description')->comment('詳細説明');

            $t->timestamps();
            $t->softDeletes();
        });

        // オーダー
        Schema::create('orders', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->bigInteger('user_id')->unsigned()->comment('ユーザーID');
            $t->bigInteger('item_id')->unsigned()->comment('カテゴリID');

            $t->string('title', 255)->comment('タイトル');

            $t->string('hours', 10)->comment('時間');
            $t->string('price', 10)->comment('価格');
            $t->datetime('prefer_at')->nullable()->comment('希望日時1');
            $t->datetime('prefer_at2')->nullable()->comment('希望日時2');
            $t->datetime('prefer_at3')->nullable()->comment('希望日時3');
            $t->text('comment')->comment('コメント');
            $t->string('ordered_token')->nullable()->comment('決済後確認用トークン');

            $t->datetime('work_at')->nullable()->comment('作業日時');
            $t->text('staff_comment')->nullable()->comment('コメント');

            $t->string('status', 10)->comment('ステータス');

            $t->timestamps();
            $t->softDeletes();
        });

        // 決済
        Schema::create('pays', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->bigInteger('user_id')->unsigned()->comment('ユーザーID');
            $t->bigInteger('order_id')->unsigned()->comment('オーダーID');

            $t->string('token', 255)->comment('トークン');
            $t->integer('amount')->nullable()->unsigned()->comment('金額');
            $t->string('credit_id', 255)->nullable()->comment('与信ID');

            $t->string('status', 10)->comment('ステータス(new, cancel, ng, paid)');
            $t->string('error_message', 255)->nullable()->comment('エラーメッセージ');

            $t->timestamps();
        });
        // カテゴリ
        Schema::create('categories', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->bigInteger('parent_id')->unsigned()->nullable()->comment('親カテゴリID');
            $t->string('name')->comment('カテゴリ名称');

            $t->timestamps();
            $t->softDeletes();
        });

        // お知らせ
        Schema::create('notices', function (Blueprint $t) {
            $t->bigIncrements('id');
            $t->string('title')->comment('タイトル');
            $t->text('content')->comment('内容');
            $t->datetime('start_at')->comment('掲載 開始日時');
            $t->datetime('end_at')->comment('掲載 終了日時');

            $t->timestamps();
            $t->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //--------------------------------------------------
        //テーブル削除
        //--------------------------------------------------
        Schema::dropIfExists('admins');
        Schema::dropIfExists('staffs');
        Schema::dropIfExists('users');
        Schema::dropIfExists('items');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('pays');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('notices');
    }
}
