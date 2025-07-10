このプロジェクトは、Laravel + Vue.js + Inertia.js を使用して構築されています。  
以下の機能が含まれます：

- CSV（`resources/form/register.csv`）に基づいたリッチなフォーム構築  
  - リアルタイムバリデーション  
  - サーバー側のバリデーション  
  - 高度なバリデーション設定  
  - 複数条件のバリデーション  
  - 項目間のバリデーション など
- Inertia.js を活用したシングルページアプリケーション（SPA）

以下に、初期セットアップ手順をまとめました。

# Laravel + Vue.js + Inertia.js の簡単セットアップ手順

## 🎬 初期化からデフォルト画面表示まで

以下のコマンドを順に実行してセットアップします。

```bash
composer create-project laravel/laravel myapp
cd myapp
composer require laravel/breeze --dev
php artisan breeze:install vue
npm install
```

### `.env` の編集

データベース接続設定を `.env` に追記または変更します：

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=user
DB_PASSWORD=user
```

### `vite.config.js` の設定

開発サーバーを LAN でもアクセス可能にするため、`defineConfig` 内に以下を追加します：

```js
server: {
  host: "0.0.0.0",
  port: 5173,
  hmr: {
    host: "localhost",
  },
},
```

### `bootstrap/app.php`の設定

api.phpを有効にするため、`withRouting`内に以下を追加します：
```php
api: __DIR__.'/../routes/api.php'
```

### 権限設定（Linuxサーバーの場合）

```bash
chown -R www-data:www-data /var/www/html/myapp/storage
chmod -R 775 /var/www/html/myapp/storage
```

### マイグレーションとビルド

```bash
php artisan migrate
npm run dev
```

---

## 🛠 カスタマイズ方法（画面追加など）

画面を追加する場合は、以下のファイルを作成・編集します：

- `resources/js/Pages/*.vue`  
  → Vue コンポーネント（ページ）の定義ファイル  
    例：`resources/js/Pages/Page1.vue`

- `routes/web.php`  
  → ルーティングの設定  
    例：`Route::get('/page1', [CommonController::class, 'page1']);`

- `app/Http/Controllers/CommonController.php`  
  → コントローラーから Inertia を通じてページを返す  
    例：`return Inertia::render('Page1');` と書くと、`resources/js/Pages/Page1.vue` が描画されます。

- `app/Http/Controllers/ConstructorController.php`  
  → Vue コンポーネントに関するサーバー側の初期化ロジックなどを定義  
    ※Vue には Blade のような「サーバー側コンポーネント処理」がないため、その代替として使用します。  
    ※Vue コンポーネントのファイル名と、このコントローラー内に定義する関数名は一致させるルールとしています。

---

## 💡 補足メモ

- 開発時はポート `5173`（Vite のデフォルト）をファイアウォールや Docker で許可しておく必要があります。