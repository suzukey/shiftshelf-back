<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['*'],    //許可するパスの設定

    'allowed_methods' => ['*'],    //許可するメソッドの設定

    'allowed_origins' => ['*'],    //許可するドメインの設定

    'allowed_origins_patterns' => [],    //許可するドメインのパターン

    'allowed_headers' => ['*'],    //許可するヘッダーの設定

    'exposed_headers' => false,    //レスポンスヘッダーの公開指定

    'max_age' => false,    //ブラウザのキャッシュの保管期間

    'supports_credentials' => false,    //クッキーなどの認証の許可

];
