
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

画面を追加する場合は以下のファイルを作成・編集します：

- `resources/js/Pages/*.vue`  
  → Vueコンポーネント（ページ）の定義ファイル

- `routes/web.php`  
  → ルーティング設定（例：`Route::get('/page2', [CommonController::class, 'page2']);`）

- `app/Http/Controllers/CommonController.php`  
  → コントローラーから Inertia を通じてページを返す

- `resources/js/VueConstructor.js`（任意）  
  → Vue コンポーネントの共通ロジックなどを定義したい場合に使用

---

## 💡 補足メモ

- コントローラーで `return Inertia::render('Page1');` と書くと、  
  `resources/js/Pages/Page1.vue` が描画されます。
- ルート定義と `.vue` ファイル名は必ず一致させましょう。
- 開発時はポート 5173（Viteのデフォルト）をファイアウォールやDockerで許可しておく必要があります。

