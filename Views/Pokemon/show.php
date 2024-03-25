<main class="my-6 py-6 mx-3" >
    <div>
        <?php
        $today=new DateTime();
        $strtoday=$today->format("Y-m-d");
        if(isset($_GET["cutdate"])){
            $cutdate=$_GET["cutdate"];
            $cutdate=new DateTime($cutdate);
            $diff=$cutdate->diff($today);
            $diff=$diff->days;
        }
        if(isset($diff)){
            if($diff<2){
                $randpokenumber=array(700,350,282,475,);
                $key=array_rand($randpokenumber,1);
                $pokenumber=$randpokenumber[$key];
            }
            elseif($diff<10){
                $randpokenumber=array(133,136,38);
                $key=array_rand($randpokenumber,1);
                $pokenumber=$randpokenumber[$key];
            }
            elseif($diff<20){
                $randpokenumber=array(16,21,58,519,677);
                $key=array_rand($randpokenumber,1);
                $pokenumber=$randpokenumber[$key];
            }
            elseif($diff<30){
                $randpokenumber=array(571,17,59,520,200);
                $key=array_rand($randpokenumber,1);
                $pokenumber=$randpokenumber[$key];
            }
            elseif($diff<40){
                $randpokenumber=array(51,180,18,398,405);
                $key=array_rand($randpokenumber,1);
                $pokenumber=$randpokenumber[$key];
            }
            elseif($diff<50){
                $randpokenumber=array(435,465,607,817,421,676);
                $key=array_rand($randpokenumber,1);
                $pokenumber=$randpokenumber[$key];
            }
            elseif($diff>=50){
                $randpokenumber=array(971,972,633,634,860,861,221,711);
                $key=array_rand($randpokenumber,1);
                $pokenumber=$randpokenumber[$key];
            }
            $pokenumber=strval($pokenumber);
            $urlname = "https://pokeapi.co/api/v2/pokemon-species/".$pokenumber;
            $urlimage="https://pokeapi.co/api/v2/pokemon/".$pokenumber;

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
        }
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


        ?>
        <div class="box">
            <div class="box">
                <p class="title">現在の経過日数</p>
                <p class="is-size-3"><?php if(isset($diff)){echo($diff)."日";}else{echo("");}?></p>
            </div>
            <div class="box">
                <form class="form" action="index.php">
                    <p class="title">散髪日更新フォーム</p>
                    <div class="field mr-6">
                        <label class="label">日付</label>
                        <p class="control">
                            <input class="input is-info" type="date" name="cutdate" value="<?php echo($strtoday);?>" max="<?php echo($strtoday);?>"/>
                        </p>
                    </div>
                    <input type="submit" class="button is-primary" value="更新"/>
                </form>
            </div>
            <div class="box">
                <?php if(isset($diff)){?>
                    <p class="title">あなたの経過日数に応じたポケモンは…</p>
                    <div class="has-text-centered">
                        <img src=<?php echo($image);?> alt="ポケモンの画像">
                    </div>
                    <p class="title has-text-centered"><?php echo($name);?>です</p>
                <?php }?>
                <?php if(!isset($diff)){?>
                    <p class="title is-centered">散髪日を更新してみよう！</p>
                <?php }?>
            </div>
        </div>

    </div>
</main>