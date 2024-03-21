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
    <body >
        <header>
            <nav class=" navbar is-light is-fixed-top " role="navigation" aria-label="main navigation">
                <div class="navbar-brand">
                    <a class="navbar-item " href="#">
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
                        <a class=" navbar-item">
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
                            <a class="button is-danger is-outlined">
                                <span class="icon">
                                    <i class="fas fa-sign-out-alt"></i>
                                </span>
                                <span>ログアウト</span>
                            </a>
                        </div>    
                    </div>
                </div>


            </nav>
        </header>
        <main class="my-6 py-6 mx-3" >
            <div >
                <?php
                // 乱数を生成
                $rand=rand(1,900);
                // string型に変換
                $randtext=strval($rand);
                $urlname = "https://pokeapi.co/api/v2/pokemon-species/".$randtext;
                $urlimage="https://pokeapi.co/api/v2/pokemon/".$randtext;

                // jsonファイルを読みとる前の処理
                function pokemonapiurljson($url){
                    $ch = curl_init(); // はじめ
                    //オプション
                    curl_setopt($ch, CURLOPT_URL, $url); 
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    $file = curl_exec($ch);
                    curl_close($ch); //終了
                    $file = json_decode($file);
                    return $file;
                }
                // ポケモンの日本語名が入ったjsonファイルを読み取る処理
                function pokemonname($file){
                    $pokemonname=$file->names[0]->name;
                    return $pokemonname;
                }
                function pokemonimg($file){
                    $official_artwork="official-artwork";
                    $pokemonimage=$file->sprites->other->$official_artwork->front_default;
                    return $pokemonimage;
                }
                $name=pokemonname(pokemonapiurljson($urlname));
                $image=pokemonimg(pokemonapiurljson($urlimage));
                $number=1;
                ?>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
                <style>
                    /* img{
                        width: 30%;
                        height: auto;
                    } */
                    .pokeimg img{
                        width: 50%;
                    }
                </style>
                <div class="box">
                    <div class="box">
                       <p class="title">現在の経過日数</p>
                       <p class="is-size-3"><?echo($number);?>日</p>
                    </div>
                    <div class="box">
                        <form class="form" action="date.php">
                            <p class="title">散髪日更新フォーム</p>
                            <div class="field mr-6">
                                <label class="label">日付</label>
                                <p class="control">
                                    <input class="input is-info" type="date">
                                </p>
                            </div>
                            <button class="button is-primary ">更新</button>
                        </form>


                    </div>
                    <div class="box">
                        <p class="title">あなたの経過日数に応じたポケモンは…</p>
                        <div class="has-text-centered">
                            <img src=<?echo($image);?> alt="ポケモンの画像">
                        </div>
                        <p class="title has-text-centered"><?echo($name);?>です</p>
                    </div>
                </div>

            </div>
        </main>
        
        <footer class="footer">
            <div class="content has-text-centered">
                <nav class="level">
                    <div class="level-item has-text-centered">
                        <a href="#">
                        プライバシー
                        </a>
                    </div>
                </nav>
                <div>
                © 岡崎奥田
                </div>
            </div>
        </footer>
    </body>
</html>