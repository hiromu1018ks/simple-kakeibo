<?php

// Laravelのマイグレーションクラスを使用しています。
// このクラスはデータベースにテーブルを作成・削除するための機能を提供します。

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// 無名クラスを使用したマイグレーションクラスの定義
return new class extends Migration
{
    /**
     * マイグレーションの適用時に実行される処理です。
     * データベースにテーブルを作成します。
     */
    public function up(): void
    {
        // 'entries' という名前のテーブルを作成します。
        Schema::create('entries', function (Blueprint $table) {
            // テーブルに自動インクリメントの主キーを設定します。
            $table->id();
            // 'user_id' 外部キーを作成します。
            // 他テーブルの 'id' と関連付け、関連データが削除された場合に連動して削除されるよう 'cascade' を設定します。
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // 'type' 列を作成します。
            // 値は「+」または「-」のいずれかのみが許容されます。
            $table->enum('type', ['+', '-']);
            // 'amount' 列を作成します。この列は整数値を保存します。
            $table->integer('amount');
            // 'category' 列を作成します。この列は文字列を保存し、カテゴリ情報を管理します。
            $table->string('category');
            // 'spent_on' 列を作成します。この列は日付情報を保存し、費用を使った日付を管理します。
            $table->date('spent_on');
            // 'created_at' と 'updated_at' (作成日時と更新日時) 用のタイムスタンプを自動的に設定します。
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * マイグレーションのロールバック（取り消し）時に実行される処理です。
     * 作成したテーブルを削除します。
     */
    public function down(): void
    {
        // 'entries' テーブルを削除します。
        Schema::dropIfExists('entries');
    }
};
