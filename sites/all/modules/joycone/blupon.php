<?php
$idname ="joycone_blupon";
session_name($idname); 
session_start();
$id = session_id($idname);
$ipi = getenv("REMOTE_ADDR");
$httprefi = getenv ("HTTP_REFERER");
if ($httprefi==""){$httprefi="Direct to URL";};
$httpagenti = getenv ("HTTP_USER_AGENT");
function curPageURL(){
    $isHTTPS = (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on");
    $port = (isset($_SERVER["SERVER_PORT"]) && ((!$isHTTPS && $_SERVER["SERVER_PORT"] != "80") || ($isHTTPS && $_SERVER["SERVER_PORT"] != "443")));
    $port = ($port) ? ':'.$_SERVER["SERVER_PORT"] : '';
    $url = ($isHTTPS ? 'https://' : 'http://').$_SERVER["SERVER_NAME"].$port.$_SERVER["REQUEST_URI"];
return $url;}
$hit = curPageURL();
$hit = urldecode($hit);

$utm_medium     = htmlspecialchars($_REQUEST['utm_medium'], ENT_QUOTES);
$utm_source     = htmlspecialchars($_REQUEST['utm_source'], ENT_QUOTES);
$utm_campaign   = htmlspecialchars($_REQUEST['utm_campaign'], ENT_QUOTES);
$utm_term       = htmlspecialchars($_REQUEST['utm_term'], ENT_QUOTES);
$utm_content    = htmlspecialchars($_REQUEST['utm_content'], ENT_QUOTES);
$service        = "$utm_source $utm_content";

$denid  = array("+", "\\", "/", "'", "\"", "#", "%", "&", ":", "<", ".", "@", " ", "\n");
$served = str_replace($denid, "", $service);
$serv   = "$served"."$id";

if ($serv == ""){
$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
$random_string_length = 50;
$string = '';
for ($i = 0; $i < $random_string_length; $i++) {
  $string .= $characters[rand(0, strlen($characters) - 1)];
}
$serv       = "$string";
};

$serv       = substr($serv, 0, 49);
$serv       = trim($serv);


$redirect   = true; //true = REDIRECT TO COUPONS.COM : false = STAY ON PAGE AND ECHO URL's INFO
// $username   = "blupon_alva";
// $password   = "n5%6foQCLw&C";
// $database   = "blupon_alva";
$table      = "joycone_blupon";
// $host       = "localhost"; 
$register   = "$httprefi";
$analytics  = "UA-11859753-2";
$pinCode    = "$serv"; //


// if(stristr(strtolower($utm_campaign),  "13-AA-0154")){
    // $offerCode  = '116898';
    // $checkCode  = 'AC';
    // $shortKey   = '42qboprt6x';
    // $longKey    = 'ircKxUNsRdMqLuJkSTltID1CFp3EzAVnvHQZw9GYj74yXOemWgP826Babfh5o';
    $redirect   = true;


// }else{
//     echo '<html><body style="text-align:center;"><h1>It appears your link is corrupted, please go back and try again.</h1>Error: '.$utm_term.'</body></html>';
//     die;
// };


/*

CREATE TABLE IF NOT EXISTS `joycone_blupon` (
  `ID` int(8) NOT NULL auto_increment,
  `hit` varchar(255) collate ascii_bin NOT NULL,
  `ipi` varchar(20) collate ascii_bin NOT NULL,
  `httprefi` varchar(255) collate ascii_bin NOT NULL,
  `httpagenti` varchar(150) collate ascii_bin NOT NULL,
  `utm_medium` varchar(30) collate ascii_bin NOT NULL,
  `utm_source` varchar(30) collate ascii_bin NOT NULL,
  `utm_campaign` varchar(30) collate ascii_bin NOT NULL,
  `utm_term` varchar(30) collate ascii_bin NOT NULL,
  `utm_content` varchar(30) collate ascii_bin NOT NULL,
  `datetime` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=0 ;


Generate the DENY ARRAY to block automated requests
SELECT `httprefi`, COUNT( * ) c FROM `bcprat` GROUP BY `httprefi` HAVING c >29 ORDER BY c DESC LIMIT 0 , 1000
SELECT `ipi` , COUNT( * ) c FROM `bcprat` WHERE `httprefi` = 'Direct to URL' GROUP BY `ipi` HAVING c >29 ORDER BY c DESC LIMIT 0 , 1000
*/

/*$deny_array = array('aceuac','_uac','adpage','adjuggler','adnxs','adyielder','adserver','adiframe','ad-frame','/admeld','adnetwork','adfrontiers','activeads','da-ads.','iframe_ads','yieldmanager','advertising.','/advertisement/','textnowads','//ad.','//ads.','/ad/','/ads/','/adv/','/advertising/','imp.bid','ad-ifr','externalhit','pointrollads','rubiconproject','imgclck.','/gameframe/','openx.','/openx/','/ifrm?','blupon');
$matched=FALSE;
foreach( $deny_array as $item )
{
    $match = strstr(strtolower($httprefi),$item);
    if($match){$matched=TRUE;}### there is a match for a hit from the ad networks    
}&& !$matched */

# Start SEND TO SERVER  
if($redirect){error_reporting(0);}else{error_reporting(1);}
/**/
if ( (count($_REQUEST)>4) && ($redirect) ) {
//if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $db = mysql_connect($host,$username,$password) or die("Database error");
    // if (!$db) {
    //     echo "Unable to connect to DB: " . mysql_error();
    //     exit;} 
    // if (!mysql_select_db($database)) {
    //     echo "Unable to select mydbname: " . mysql_error();
    //     exit;}
    
    $query = "INSERT INTO $table SET
        hit         ='".addslashes($hit)."',
        ipi         ='".addslashes($ipi)."',
        httprefi    ='".addslashes($httprefi)."',
        httpagenti  ='".addslashes($httpagenti)."',
        utm_medium  ='".addslashes($utm_medium)."',
        utm_source  ='".addslashes($utm_source)."',
        utm_campaign='".addslashes($utm_campaign)."',
        utm_term    ='".addslashes($utm_term)."',
        utm_content ='".addslashes($utm_content)."'
        ";

    // $result = mysql_query($query);  
    $result = db_query($query);  
    if (!$result) 
    {
        // echo " Error updating DB:($query)" . mysql_error();
        exit;
    }/**/
    // mysql_close($db);
}

# Start SEND FOR COUPON
function EncodeCPT($pinCode, $offerCode, $shortKey, $longKey){ // 6 digit offer code
    $decodeX = " abcdefghijklmnopqrstuvwxyz0123456789!$%()*+,-.@;<=>?[]^_{|}~";
    $encodeModulo = array_fill(0, 256, 0);
    $vob[0] = $offerCode % 100;
    $vob[1] = ($offerCode / 100) % 100;
    for ($i = 0; $i < 61; $i++)
        $encodeModulo[substr($decodeX, $i, 1)] = $i;
    $pinCode = strtolower($pinCode) . strval($offerCode);
    if (strlen($pinCode) < 20){
        $pinCode .= ' couponsincproduction';
        $pinCode = substr($pinCode, 0, 20);
    }
    $q = 0;
    $j = strlen($pinCode);
    $k = strlen($shortKey);
    $s1 = $s2 = $s3 = null;
    $cpt = '';
    for ($i = 0; $i < $j; $i++){
    $s1 = $encodeModulo[substr($pinCode, $i, 1)];
    $s2 = 2 * $encodeModulo[substr($shortKey, $i % $k, 1)];
    $s3 = $vob[$i % 2];
    $q = ($q + $s1 + $s2 + $s3) % 61;
    $cpt .= substr($longKey, $q, 1);
}
return $cpt;
}
/*
# Start SEND FOR COUPON
function EncodeCPT($pinCode, $offerCode, $shortKey, $longKey){// 5 digit offer code
  $decodeX = " abcdefghijklmnopqrstuvwxyz0123456789!$%()*+,-.@;<=>?[]^_{|}~";
  $ocode = null;
  foreach(range(0, 255) as $i) $encodeModulo[$i] = null;

  if (strlen(strval($offerCode)) == 5)
    $ocode = $offerCode % 10000;
  else
    $ocode = $offerCode;

  $vob[0] = $ocode % 100;
  $vob[1] = ($ocode - $vob[0]) / 100;

  for ($i = 0; $i < 61; $i++)
    $encodeModulo[ord(substr($decodeX, $i, 1))] = $i;

  $pinCode = strtolower($pinCode) . strval($offerCode);
  if (strlen($pinCode) < 20){
    $pinCode = $pinCode . ' couponsincproduction';
    $pinCode = substr($pinCode, 0, 20);
  }

  $q = 0;
  $j = strlen($pinCode);
  $k = strlen($shortKey);
  $s1 = $s2 = $s3 = null;

  $cpt = '';

  for ($i = 0; $i < $j; $i++){
    $s1 = $encodeModulo[ord(substr($pinCode, $i, 1))];
    $s2 = 2 * $encodeModulo[ord(substr($shortKey, $i % $k, 1))];
    $s3 = $vob[$i % 2];
    $q = ($q + $s1 + $s2 + $s3) % 61;
    $cpt .= substr($longKey, $q, 1);
  }
  return $cpt;
}
*/

$scramble = EncodeCPT($pinCode, $offerCode, $shortKey, $longKey);
//header("Location: http://bricks.coupons.com/enable.asp?eb=1&o=".$offerCode."&c=".$checkCode."&p=".$pinCode."&cpt=".$scramble."");
$leave = 'http://bricks.coupons.com/enable.asp?eb=1&o='.$offerCode.'&c='.$checkCode.'&p='.$pinCode.'&cpt='.$scramble;
//

if ($redirect){header( "refresh:10;url=$leave" );};
?>
<!DOCTYPE html>
<html>
<head>

<script type="text/javascript">
<!--//GOOGLE ANALYTICS CODE BEGINS
<?php if ($redirect){ ?>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', '<?php echo $analytics;?>']);
    _gaq.push(['_trackPageview']);
    //_gaq.push(['_setAllowLinker', true]);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
<?php }?>//GOOGLE ANALYTICS CODE ENDS
function myfuncDelay(){setTimeout("myfunc()", 1000);} //wait(give google a sec)
function myfunc () {window.location = '<?php echo $leave;?>';}
<?php if ($redirect){echo "window.onload = myfuncDelay;";};?>
 // -->
</script>
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<META NAME="ROBOTS" CONTENT="NONE">
<META NAME="GOOGLEBOT" CONTENT="NOARCHIVE">  
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<title>BLUPONs COUPONs</title>
<?php if ($redirect){echo "<meta http-equiv=\"refresh\" content=\"2;url=$leave\">";};?>
</head>
<body>
<div style="text-align:center; width:100%; font-family:Arial, Helvetica, sans-serif; margin-top:5%;">
<?php if ($redirect){ ?>
One moment please.<br />
You are being redirected to your coupon printing page.<br /><br />
<noscript>You should have javascript enabled to use this resource.<br />
If you are not redirected in 5 seconds please <a href="<?php echo "$leave";?>">click here</a>
</noscript>
<?php }?>

<?php 
if (!$redirect){
    echo "REDIRECT IS DISABLED<br><br>";
    echo "LINK: <a href='".$leave."' target='_blank'>".$leave."</a><br><br>";
    echo "SESSION: ".$id."<br><br>";
    echo "IP: $ipi"."<br><br>".
    "BROWSER: $httpagenti"."<br><br>".
    "REFFERED FROM: $httprefi"."<br><br>".
    "LANDED: $hit"."<br><br>".
    "SERVICE:  $service"."<br><br>".
    "USER ID: $utm_campaign"."<br><br>".
    "OFFER CODE: $offerCode"."<br><br>".
    "CHECK CODE: $checkCode"."<br><br>".
    "SELECTOR: $utm_content"."<br><br>".
    "PIN: $pinCode"."<br><br>" .
    "GA: $analytics"."<br><br>";
echo "<br><br><br><a href='$hit'>GO</a>";
};
?>

</div>
</body>
</html>
<?php
session_destroy($idname);

/*session_write_close($idname); 
if (isset($_SESSION[$idname]))
    {$_SESSION[$idname] = $tip;
    echo $tip."!!!";
    };
exit;*/

?>