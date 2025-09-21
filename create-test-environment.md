# テスト用WordPress環境の作成方法

## 🚀 クイックセットアップ

### 1. Local by Flywheel（推奨）
- **ダウンロード**: https://localwp.com/
- **特徴**: ワンクリックでWordPress環境を構築
- **URL**: 通常 `http://your-site.local/wp-admin/`

### 2. XAMPP + WordPress
1. **XAMPPをダウンロード**: https://www.apachefriends.org/
2. **WordPressをダウンロード**: https://ja.wordpress.org/download/
3. **htdocs フォルダに展開**
4. **アクセス**: `http://localhost/wordpress/wp-admin/`

### 3. Docker Compose（上級者向け）
```yaml
version: '3.8'
services:
  wordpress:
    image: wordpress:latest
    ports:
      - "8080:80"
    environment:
      WORDPRESS_DB_HOST: db
      WORDPRESS_DB_NAME: wordpress
      WORDPRESS_DB_USER: wordpress
      WORDPRESS_DB_PASSWORD: password
  db:
    image: mysql:5.7
    environment:
      MYSQL_DATABASE: wordpress
      MYSQL_USER: wordpress
      MYSQL_PASSWORD: password
      MYSQL_ROOT_PASSWORD: rootpassword
```

**アクセス**: `http://localhost:8080/wp-admin/`

### 4. オンラインテスト環境
- **WordPress.com**: 無料でテスト可能
- **InstaWP**: 一時的なWordPress環境
- **Tastewp**: 1時間限定のテスト環境

## 📝 テスト手順

1. **WordPress環境を起動**
2. **プラグインファイルをアップロード**
3. **プラグインを有効化**
4. **管理画面にアクセス**: `/wp-admin/`
5. **プラグインメニューを確認**: 左サイドバーの「Jグランツ・インポーター」

## 🔗 直接アクセス用URL例

```
# ダッシュボード
http://localhost/wp-admin/

# プラグイン管理画面
http://localhost/wp-admin/admin.php?page=grant-insight-jgrants-importer-improved

# デバッグページ
http://localhost/wp-admin/plugins.php?giji_debug=1
```