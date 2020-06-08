# laravel_sample

Qiita の記事を見ながらサンプルを作成し、そこから色々いじっていく

## Laravel のインストール

```console
composer create-project --prefer-dist laravel/laravel sample
```

## laravel/ui のインストール

スカフォールドとかいうやつは別途インストールするらしい。  
画面周りの部品？  
公式をまるっとコピーすると以下

```console
// 下準備
composer require laravel/ui
// 基本的なスカフォールドを生成（どれか一つでいいっぽい）
php artisan ui bootstrap
php artisan ui vue
php artisan ui react

// ログイン／ユーザー登録スカフォールドを生成（どれか一つ）
php artisan ui bootstrap --auth
php artisan ui vue --auth
php artisan ui react --auth
```

npm が必要なので、 Node.js をインストールする必要もあるみたい。  
上のコマンドだけじゃ CSS ができないみたいなので、以下のコマンドで生成するのかな？

```console
npm install
npm run dev
```

今回は bootstrap を選びましたが、 CDN で使ってるやつとは違ってアイコンとかないっぽい・・・？

## 起動方法

```console
php artisan serve --port=80 --host=192.168.33.52
```

## ルーティング定義一覧

```console
php artisan route:list
```

## マイグレーションファイル作成

books テーブル作成のテンプレートファイルを生成するコマンド  
ファイル名は `YYYY_MM_DD_hhmmss_create_books_table.php` になる  
database/migrations ディレクトリ内にファイルができる

```console
php artisan make:migration create_books_table --create=books
```

migration の書き方は下記参照

> https://readouble.com/laravel/5.5/ja/migrations.html

## マイグレーションの実行

```console
php artisan migrate
```

## マイグレーションのロールバック

直前のみ取り消す

```console
php artisan migrate:rollback
```

すべてのマイグレーションを取り消す

```console
php artisan migrate:reset
```


## モデルクラスの作成

テーブル名を単数系にしてモデルクラスを命名する

```console
php artisan make:model Book
```

app ディレクトリ内にモデルクラスのファイルができる

## シーディング

マスタデータなどのアプリケーション起動時に必要なレコードを登録する仕組み

シーダーファイルの作成

```console
php artisan make:seeder UserSeeder
```

database/seeds ディレクトリ内にファイルができるので、頑張って書く

## シーダの実行

シーダクラスを書き上げたら、 Composer のオートローダを再生成する必要があるらしい。コマンドは以下

```console
composer dump-autoload
```

その後、データベースへの初期値登録を実施

```console
php artisan db:seed
```

## マイグレーションのやり直しとデータ登録を一発でやる方法

```console
php artisan migrate:fresh --seed
```

## ルーティングの記載先

`routes/web.php` に記載されている。  
view は `resources/views/` 配下にある

コントローラは `app/Http/Controllers` 配下にあるらしい

## コントローラの作成

```console
php artisan make:controller BookController
php artisan make:controller UserController
```

## ビューの作成

これは artisan が使えないっぽい。 HTML だし仕方ないか  
ただし、ビューを作成後、コンパイルしておかないとパフォーマンスに悪い影響があるらしい。  
パフォーマンスを上げるため、デプロイする際は以下のコマンドを実施する必要がある

```console
php artisan view:cache
```

## フォームリクエストバリデーション

```console
php artisan make:request BookRequest
```
