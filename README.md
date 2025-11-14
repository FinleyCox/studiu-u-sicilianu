# 🎉 Studiu u Sicilianu

### 🚀 シチリア語学習サービス（Laravel + Vue.js）

## 📖 概要
このプロジェクトは、シチリア語を学ぶためのクイズアプリです。  
Laravel（バックエンド）とVue.js（フロントエンド）を使用し、簡単なクイズ機能を実装しています。
また、単語一覧やフレーズなども記載していきます（開発途中）

## 😎 なぜシチリア語なのか
日本語のリソースが殆ど無く、イタリア語とどれほど似ていてどれ程異なっているのかがわからない。    
カンノーリが大好きなのにシチリア語は分からない  
希少な言語なので少しでも残しておきたい  
こんな気持ちから作成を始めました。  

## ✨ 主な機能
- ✅ クイズ形式でシチリア語の単語を学ぶ
- ✅ 正解・不正解を判定
- ✅ **(今後追加予定)** 単語・フレーズページの実装などなど

トップ画面
![sample](./assets/studiuusicilianuvideo-main.gif)
クイズ画面
![sample-2](./assets/studiuusicilianuvideo-quiz.gif)

## 🛠️ 使用技術
- **バックエンド:** Laravel 11, PostgreSQL  
- **フロントエンド:** Vue.js 3, Tailwind CSS  
- **デプロイ:** Render (Docker)

## 🚀 デプロイ方法

### Renderでのデプロイ（推奨）

1. **GitHubにプッシュ**
   ```bash
   git add .
   git commit -m "Initial commit"
   git push origin main
   ```

2. **Renderでデプロイ**
   - [Render](https://render.com)にアクセス
   - GitHubリポジトリを接続
   - `New Web Service`を選択
   - リポジトリを選択
   - 環境変数を設定（必要に応じて）
   - デプロイ開始

3. **環境変数設定**
   - `APP_ENV`: production
   - `APP_DEBUG`: false
   - `DB_CONNECTION`: pgsql
   - その他は自動設定されます

### ローカル開発

```bash
# 依存関係をインストール
composer install
npm install

# 環境設定
cp .env.example .env
php artisan key:generate

# データベース設定
php artisan migrate
php artisan db:seed

# 開発サーバー起動
php artisan serve
npm run dev
```

## 📜 ライセンス
MIT License

## 👤 作者
FinleyCox(inter0370@gmail.com)
- [GitHub](https://github.com/FinleyCox)

