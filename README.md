# sample-laravel-fulltext-search
Laravelで全文検索を試す

## セットアップ

### php

localのphpを利用します。
appディレクトリに移動してライブラリをセットアップ後、laravelを起動してください。

```bash
cd app

# ライブラリインストール
composer install

# laravel起動
php artisan serve
```

### meilisearch

#### サーバ起動

```bash
# localhost:7700でサーバが起動する
docker compose up -d
```

#### データindex

```bash
php artisan scout:import "App\Models\User"
```

- typo tolerance設定

```bash
# 確認
curl localhost:7700/indexes/users/settings/typo-tolerance

# 無効化
curl \
  -X PATCH 'http://localhost:7700/indexes/users/settings/typo-tolerance' \
  -H 'Content-Type: application/json' \
  --data-binary '{ "enabled": false }'
```

#### indexの削除

```bash
curl \
  -X DELETE 'http://localhost:7700/indexes/users'
```

または

```bash
php artisan scout:flush "App\Models\User"
```

## 使い方

### Databaseを用いた検索

```bash
http://localhost:8000/users/search?keyword=%E5%B1%B1%E7%94%B0
```

### Meilisearchを用いた検索

```bash
http://localhost:8000/users/fuzzy-search?keyword=%E5%B1%B1%E7%94%B0
```
