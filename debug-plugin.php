<?php
/**
 * プラグイン動作確認用デバッグスクリプト
 * 
 * このファイルをWordPressプラグインディレクトリに設置して
 * WordPressの管理画面からアクセスできるかテストします。
 */

// セキュリティ: 直接アクセスを防ぐ
if (!defined('ABSPATH')) {
    exit;
}

/**
 * プラグイン動作確認関数
 */
function giji_debug_plugin_status() {
    $plugin_file = 'grant-insight-jgrants-importer-improved/grant-insight-jgrants-importer-improved.php';
    $plugin_path = WP_PLUGIN_DIR . '/' . dirname($plugin_file);
    
    $status = array(
        'plugin_active' => is_plugin_active($plugin_file),
        'plugin_dir_exists' => is_dir($plugin_path),
        'main_file_exists' => file_exists($plugin_path . '/grant-insight-jgrants-importer-improved.php'),
        'admin_class_exists' => class_exists('GIJI_Admin_Manager'),
        'current_user_can_manage' => current_user_can('manage_options'),
        'current_user_can_edit' => current_user_can('edit_posts'),
        'is_admin' => is_admin(),
        'plugin_path' => $plugin_path
    );
    
    return $status;
}

/**
 * デバッグ情報表示用のフック（管理画面でのみ）
 */
if (is_admin() && current_user_can('manage_options')) {
    add_action('admin_notices', function() {
        if (isset($_GET['giji_debug']) && $_GET['giji_debug'] == '1') {
            $status = giji_debug_plugin_status();
            
            echo '<div class="notice notice-info is-dismissible">';
            echo '<h3>Grant Insight Jグランツ・インポーター デバッグ情報</h3>';
            echo '<table style="border-collapse: collapse; width: 100%;">';
            
            foreach ($status as $key => $value) {
                $display_value = is_bool($value) ? ($value ? '✓ はい' : '✗ いいえ') : esc_html($value);
                $color = is_bool($value) ? ($value ? 'green' : 'red') : 'black';
                
                echo '<tr>';
                echo '<td style="border: 1px solid #ddd; padding: 8px; font-weight: bold;">' . esc_html($key) . '</td>';
                echo '<td style="border: 1px solid #ddd; padding: 8px; color: ' . $color . ';">' . $display_value . '</td>';
                echo '</tr>';
            }
            
            echo '</table>';
            echo '<p><strong>デバッグURL:</strong> <code>' . admin_url('plugins.php?giji_debug=1') . '</code></p>';
            echo '</div>';
        }
    });
}

// 手動でプラグインフックをテスト
add_action('admin_menu', function() {
    if (isset($_GET['giji_debug']) && $_GET['giji_debug'] == '1') {
        add_menu_page(
            'GIJI デバッグテスト',
            'GIJI デバッグ',
            'manage_options',
            'giji-debug-test',
            function() {
                echo '<div class="wrap">';
                echo '<h1>GIJI デバッグテスト</h1>';
                echo '<p>このページが表示されれば、WordPressプラグインの基本機能は動作しています。</p>';
                
                $status = giji_debug_plugin_status();
                echo '<h2>プラグイン状態</h2>';
                echo '<ul>';
                foreach ($status as $key => $value) {
                    $display_value = is_bool($value) ? ($value ? 'はい' : 'いいえ') : $value;
                    echo '<li><strong>' . esc_html($key) . ':</strong> ' . esc_html($display_value) . '</li>';
                }
                echo '</ul>';
                
                echo '</div>';
            },
            'dashicons-admin-tools',
            99
        );
    }
}, 5);