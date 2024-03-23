<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>髪の毛チェックアプリ</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
        <script>
            document.addEventListener('DOMContentLoaded', () => {
            
            // ナビゲーションバーガー（navbar-burgerクラスを持つすべての要素）を取得します。
            const $navbarBurgers = document.querySelectorAll('.navbar-burger');
            
            // ナビゲーションバーガーがあるかどうかを確認します。
            if ($navbarBurgers.length > 0) {
            
                // すべてのナビゲーションバーガーをループします。
                $navbarBurgers.forEach( el => {
            
                // ナビゲーションバーガーにクリックイベントを追加します。
                el.addEventListener('click', () => {
            
                    // ナビゲーションバーガーのdata-target属性の値を取得します。
                    const target = el.dataset.target;
                    // メニュー（data-target属性の値をIDとして持つ要素）を取得します。
                    const $target = document.getElementById(target);
            
                    // ナビゲーションバーガーでis-activeクラスを切り替えます。
                    el.classList.toggle('is-active');
                    // メニューでis-activeクラスを切り替えます。
                    $target.classList.toggle('is-active');
            
                });
                });
            }
            });
        </script>
    </head>
    <body>
        <header>
            <nav class=" navbar is-light is-fixed-top " role="navigation" aria-label="main navigation">
                <div class="navbar-brand">
                    <a class="navbar-item " href="">
                        <img src="cutdate-min.svg">
                    </a>
                    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="targetMenu">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>
                <div id="targetMenu" class="navbar-menu">
                    <div class="navbar-start">
                        <a class=" navbar-item">
                            <span class="icon-text has-text-link">
                                <span class="icon">
                                    <i class="fas fa-home"></i>
                                </span>
                                <span>ホーム</span>
                            </span>
                        </a>
                        <a class=" navbar-item" >
                            <span class="icon-text has-text-success">
                                <span class="icon">
                                    <i class="fas fa-home"></i>
                                </span>
                                <span>新規登録</span>
                            </span>
                        </a>
                    </div>

                    <div class="navbar-end">
                        <div class="navbar-item">
                            <a class="button is-primary is-outlined">
                                <span class="icon">
                                    <i class="fas fa-sign-in-alt"></i>
                                </span>
                                <span>ログイン</span>
                            </a>
                        </div>
                        <div class="navbar-item">
                            <form action="">
                                <button class="button is-danger is-outlined">
                                    <span class="icon">
                                        <i class="fas fa-sign-out-alt"></i>
                                    </span>
                                    <span>ログアウト</span>
                                </button>
                            </form>
                        </div>    
                    </div>
                </div>
            </nav>
        </header>