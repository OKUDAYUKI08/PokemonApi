<?php
// 乱数を生成
$rand=rand(1,150);
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
echo($name);


?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <img src=<?echo($image);?> alt="ポケモンの画像" >
</body>
</html>
