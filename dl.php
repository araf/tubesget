<html>
<head>
    

<?php

function getMeta($name,  $now){
    return explode("\"",explode("content=\"", explode("property=\"".$name."\"", $now)[1])[1])[0];
}

$l=$_GET["u"];
$d=$_GET["i"];
$ok=false;
if($l&&$d){
    $u=$l;
$now = file_get_contents("https://www.youtube.com/watch?v=".$u);
$k= explode("\",\"",explode("\"url_encoded_fmt_stream_map\":\"", $now)[1])[0];
$f =  explode("url=", $k);
$s="";
    $url="";
for($i=0;$i<sizeof($f)-1;$i++){
    $r=$f[$i+1];
    $url=urldecode(explode("\\u0026",explode(",",$r)[0])[0]);
    $itag= explode("&",explode("itag=", $url)[1])[0];
    if($itag==$d){
        $ok=true;
        echo '<meta http-equiv="refresh" content="0; url='.$url.'" />'; 
        break;
    }
}

}
if($ok)
echo '<title>Downloading Youtube Video:'.getMeta("og:title", $now).'</title>';
else
echo '<title>Downloading Error!</title>';

?>
    
    
</head>
    <body>
        
        
<?php

if($ok)
echo '<h3>Downloading Video....</h3><h2>'.getMeta("og:title", $now).'</h2>';
else
echo '<h3>Downloading Video....</h3><h2>Error</h2>';

echo 'If download doesn\'t start automatically, <a href="'.$url.'">click here</a>!';


?>
        
    
    </body>



</html>











