# Grant Insight Jグランツ・インポーター 改善版 - インストールガイド

## 📋 プラグインのインストール方法

### 方法1: 既存のWordPressサイトにインストール

1. **プラグインファイルをアップロード**
   ```
   プラグインディレクトリ全体を以下の場所にアップロード：
   /wp-content/plugins/grant-insight-jgrants-importer-improved/
   ```

2. **必要なファイル一覧**
   ```
   grant-insight-jgrants-importer-improved/
   ├── grant-insight-jgrants-importer-improved.php (メインファイル)
   ├── acf-fields-improved.php
   ├── debug-plugin.php (デバッグ用)
   ├── admin/
   │   └── class-admin-manager-improved.php
   ├── includes/
   │   ├── class-automation-controller-improved.php
   │   ├── class-grant-data-processor-improved.php
   │   ├── class-jgrants-api-client-improved.php
   │   ├── class-logger.php
   │   ├── class-security-manager.php
   │   └── class-unified-ai-client-improved.php
   └── assets/
       ├── admin.css
       └── admin.js
   ```

3. **WordPressダッシュボードでアクティベート**
   - `/wp-admin/plugins.php` にアクセス
   - 「Grant Insight Jグランツ・インポーター 改善版」を有効化

### 方法2: FTP/cPanelを使用してアップロード

1. **FTPクライアントまたはcPanelファイルマネージャーを使用**
2. **WordPressインストールディレクトリに移動**
3. **`/wp-content/plugins/`フォルダ内に新しいフォルダを作成**
   ```
   フォルダ名: grant-insight-jgrants-importer-improved
   ```
4. **すべてのプラグインファイルをアップロード**

## 🔧 アクセス方法

### WordPressダッシュボード
```
http://あなたのサイト/wp-admin/
```

### プラグイン管理画面（直接アクセス）
```
http://あなたのサイト/wp-admin/admin.php?page=grant-insight-jgrants-importer-improved
```

### サブページ
- **設定**: `/wp-admin/admin.php?page=giji-improved-settings`
- **プロンプト管理**: `/wp-admin/admin.php?page=giji-improved-prompts`
- **ログ**: `/wp-admin/admin.php?page=giji-improved-logs`
- **統計**: `/wp-admin/admin.php?page=giji-improved-statistics`

### デバッグページ
```
http://あなたのサイト/wp-admin/plugins.php?giji_debug=1
```

## 🛠️ トラブルシューティング

### 管理画面が表示されない場合

1. **プラグインがアクティベートされているか確認**
2. **ユーザー権限を確認**
   - 最低でも「編集者」権限が必要
   - 設定変更には「管理者」権限が必要

3. **デバッグモードを有効化**
   ```php
   wp-config.phpに以下を追加：
   define('WP_DEBUG', true);
   define('WP_DEBUG_LOG', true);
   ```

4. **エラーログを確認**
   ```
   /wp-content/debug.log
   ```

### よくある問題と解決方法

1. **「権限がありません」エラー**
   - ユーザー権限を「編集者」以上に設定

2. **「ページが見つかりません」エラー**
   - プラグインが正しくアクティベートされているか確認
   - ファイルが正しい場所にアップロードされているか確認

3. **白い画面（WSOD）**
   - PHPエラーログを確認
   - プラグインを一時的に無効化してテスト

## 📞 サポート

問題が解決しない場合は、以下の情報を含めてお問い合わせください：

1. WordPressのバージョン
2. PHPのバージョン
3. エラーメッセージ（あれば）
4. デバッグログの内容
5. 他にアクティブなプラグイン一覧

## 🔒 セキュリティ注意事項

- プラグインファイルの権限を適切に設定（644 または 755）
- デバッグファイルは本番環境では削除することを推奨
- API キーなどの機密情報は適切に保護