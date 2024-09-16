# sample-laravel-fulltext-search
Laravelで全文検索を試す

## 使い方

### meilisearchサーバ起動

```bash
# localhost:7700でサーバが起動する
docker compose up -d
```

### meilisearchへのデータindex

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

### indexの削除

```bash
curl \
  -X DELETE 'http://localhost:7700/indexes/users'
```

または

```bash
php artisan scout:flush "App\Models\User"
```
