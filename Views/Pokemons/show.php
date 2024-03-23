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
        <?
        $today=new DateTime();
        $strtoday=$today->format("Y-m-d");

        ?>
        <div class="box">
            <div class="box">
                <p class="title">現在の経過日数</p>
                <p class="is-size-3">
                <?
                if(isset($_GET["cutdate"])){
                    $cutdate=$_GET["cutdate"];
                    $cutdate=new DateTime($cutdate);
                    $diff=$cutdate->diff($today);
                    echo($diff->days);
                };?>
                日</p>
            </div>
            <div class="box">
                <form class="form" action="index.php">
                    <p class="title">散髪日更新フォーム</p>
                    <div class="field mr-6">
                        <label class="label">日付</label>
                        <p class="control">
                            <input class="input is-info" type="date" name="cutdate" value="<?echo($strtoday);?>"/>
                        </p>
                    </div>
                    <input type="submit" class="button is-primary" value="更新"/>
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