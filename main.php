<html>
<head>
    <meta charset="utf-8" />
<style type="text/css">
    
    img{
        max-width: 400px;;
    }
    div{
        max-width: 400px;
    }
    
    
    
    </style>

<?php

function getMeta($name,  $now){
    return explode("\"",explode("content=\"", explode("property=\"".$name."\"", $now)[1])[1])[0];
}


$as=array("5","17","18","22","34","35","36","37","38", "43","44","45","46","82","84","100","102","133","134","135","136","137","139","140","141","160", "83", "85", "101", "171", "242", "243", "244");

$aa=array("flv [240p]","3gp [144p]","mp4 [360p]","mp4 [720p]","flv [360p]","flv [480p]","3gp [240p]","mp4 [1080p]","webm [360p]","webm [480p]","webm [720p]","webm [1080p]", "MP4 [1080p]", "mp4 [360p] (3D)","mp4 [720p] (3D)","webm [360p] (3D)","webm [720p] (3D)","mp4 [240p] (Video Only)","mp4 [360p] (Video Only)","mp4 [480p] (Video Only)","mp4 [720p] (Video Only)","mp4 [1080p] (Video Only)","mp4 [48k] (Audio)","mp4 [128k] (Audio)","mp4 [256k] (Audio)","mp4 [192p] (Video only)", "mp4 [480p] (3D)", "mp4 [1080p] (3D)", "webm [480p] (3D)", "webm [128k] (Audio)", "webm [240p] (Video Only)", "webm [360p] (Video Only)", "webm [480p] (Video Only)");



$title="Tubesget | Download Youtube Videos easily!";


$l=$_GET["u"];
    if($l){
        if(strlen($l)>25)
            $uu=explode("&", explode("?v=",$l)[1])[0];
        else
            $uu=$l;
            
$u="https://www.youtube.com/watch?v=".$uu;
$now = file_get_contents($u);
if($now){
$title="Tubesget | Download ".getMeta("og:title", $now);
$k= explode("\",\"",explode("\"url_encoded_fmt_stream_map\":\"", $now)[1])[0];
$q= explode("\",\"",explode("\"adaptive_fmts\":\"", $now)[1])[0];
$f =  explode("url=", $k);
$ff =  explode("url=", $q);
$s="";


for($i=0;$i<sizeof($f)-1;$i++){
    $r=$f[$i+1];
    $url=urldecode(explode("\\u0026",explode(",",$r)[0])[0]);
    $itag= explode("&",explode("itag=", $url)[1])[0];
    $in=array_search($itag, $as);
    if($in>-1)
    $info=$aa[$in];
    else
        $info="Unknown Quality";
$s=$s.'<div ><a href="'.$url.'"> Download </a> '.$info.'<br/><input type="text" value="http://tubesget.appspot.com/dl.php?u='.$uu.'&i='.$itag.'" style="width:200px" onmouseover="this.select()"/></div><br/>';
};
            
for($i=0;$i<sizeof($ff)-1;$i++){
    $r=$ff[$i+1];
    $url=urldecode(explode("\\u0026",explode(",",$r)[0])[0]);
    $itag= explode("&",explode("itag=", $url)[1])[0];
    $in=array_search($itag, $as);
    if($in>-1)
    $info=$aa[$in];
    else
        $info="Unknown Quality";
$s=$s.'<div ><a href="'.$url.'"> Download </a> '.$info.'<br/><input type="text" value="http://tubesget.appspot.com/dl.php?u='.$uu.'&i='.$itag.'" style="width:200px" onmouseover="this.select()"/></div><br/>';
}

    }
        else
            echo "Not Found!";
        
    }
echo "<title>".$title."</title>";
?>
   

</head>
<body>
<center>

<form>
Youtube url: <input type="text" name="u" width="70" value="https://www.youtube.com/watch?v=aKdV5FvXLuI" /> <input type="submit" value="Get Video" />
</form> 
    
<?php


if($now){            
echo '<h2>'.getMeta("og:title", $now).'</h2><img alt="'.getMeta("og:description", $now).'" src="'.getMeta("og:image",  $now).'" /> <br/><br/>'.getMeta("og:description",  $now);

echo '<br/><br/><u><b>Download Links</b>:</u><br/>'.$s."<br/><br/><br/>";
}

?>
    
    <script type="text/javascript">
    
    </script>



    </center>


    
    </body>



</html>











