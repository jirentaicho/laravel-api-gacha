## about

ガチャを回す簡単なWEB API  
Laravel 9.4.1

## Userテーブル

* stone_amtカラムを追加

初期データでテーブルの作成

> php artisan migrate

## Characterテーブル作成

モデルクラスとマイグレーションファイルを同時に作成する

> php artisan make:model Character --migration

## コントローラー作成

> php artisan make:controller GachaController

## サービスプロバイダの登録

サービスプロバイダの作成

> php artisan make:provider GachaServiceProvider

以下のようにしてバインド

```php
$this->app->bind(GachaService::class,GachaServiceImpl::class);
```


config/app.phpにクラスを登録

```php
    App\Providers\GachaServiceProvider::class,
```

## サービスコンテナ

app()でサービスコンテナを利用できます。もしもbindを文字列で行った場合は以下のようにして取得できます
※通常はインターフェースでバインドします

```php
$gachaService = app()->make('GachaService');
```


## EloquentModel

DBアクセス用に使ってます(Daoみたいな感じ)

app\Models

## Domain Model

app\Domain\Model


## 配列操作

配列は型の指定ができないため高階関数で型を指定する

### array_map

以下のようにして取得する

```php
$characters = Character::get()->all();
```

array_mapで安全に変換する

```php
    public function addCharactersToData(array $characters){
        $mapper = new CharacterDataMapper();
        $list = array_map(function(Character $character) use ($mapper) {
            return $mapper->toCharacterData($character);
        },$characters);
    }
```

## json

apiなのでjsonで返却する

```php
    response()->json();
```

連想配列にして渡してあげます

## Event

* App\Providers\EventServiceProvider.phpの修正
  * 作成予定となるファイルのクラスを記載する
* コマンドの実施

useのパスに出力される
```php

```

> php artisan event:generate

イベントの発火

```php
UsedStone::dispatch($userData->getStoneAmt(), $type);
```

## 例外処理

* 作成
  * php artisan make:exception ApiException
* 処理
  * renderメソッドにてjsonを返すだけ

