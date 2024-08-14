<?php
$PNH = new PNH;
$MEMO_PREFIX        = $PNH->site('noidung_naptien');
$site_gmail_momo    = $PNH->site('email');
$site_pass_momo     = $PNH->site('pass_email');

$config = [
    'version'   => '1.1.0',
    'ip_server' => '127.0.0.1',
];


function insert_options($name, $value)
{
    global $PNH;
    if(!$PNH->get_row("SELECT * FROM `options` WHERE `name` = '$name' "))
    {
        $PNH->insert("options", [
            'name'  => $name,
            'value' => $value
        ]);
    }
}
function insert_lang($id, $vn, $en)
{
    global $PNH;
    if(!$PNH->get_row("SELECT * FROM `lang` WHERE `id` = '$id' "))
    {
        $PNH->insert("lang", [
            'id'    => $id,
            'vn'    => $vn,
            'en'    => $en
        ]);
    }
}
function convert_name($str) {
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    $str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
    $str = preg_replace("/( )/", '-', $str);
    return $str;
}
function generate_license($suffix = null) {
    // Default tokens contain no "ambiguous" characters: 1,i,0,o
    if(isset($suffix)){
        // Fewer segments if appending suffix
        $num_segments = 3;
        $segment_chars = 6;
    }else{
        $num_segments = 4;
        $segment_chars = 5;
    }
    $tokens = '1671ddd553c8ad098766e4ff574b8945';
    $license_string = '';
    // Build Default License String
    for ($i = 0; $i < $num_segments; $i++) {
        $segment = '';
        for ($j = 0; $j < $segment_chars; $j++) {
            $segment .= $tokens[rand(0, strlen($tokens)-1)];
        }
        $license_string .= $segment;
        if ($i < ($num_segments - 1)) {
            $license_string .= '-';
        }
    }
    // If provided, convert Suffix
    if(isset($suffix)){
        if(is_numeric($suffix)) {   // Userid provided
            $license_string .= '-'.strtoupper(base_convert($suffix,10,36));
        }else{
            $long = sprintf("%u\n", ip2long($suffix),true);
            if($suffix === long2ip($long) ) {
                $license_string .= '-'.strtoupper(base_convert($long,10,36));
            }else{
                $license_string .= '-'.strtoupper(str_ireplace(' ','-',$suffix));
            }
        }
    }
    return $license_string;
}
function format_currency($amount)
{
    if(isset($_SESSION['lang']))
    {
        if($_SESSION['lang'] == 'en')
        {
            return '$'.number_format($amount / 23000, 2, '.', '');
        }
        else
        {
            return format_cash($amount, 'đ');
        }
    }
    else
    {
        return format_cash($amount, 'đ');
    }
}
function lang($id)
{   
    global $PNH;
    if(isset($_SESSION['lang']))
    {
        if($_SESSION['lang'] == 'en')
        {
            return $PNH->get_row("SELECT * FROM `lang` WHERE `id` = '$id' ")['en'];
        }
        else
        {
            return $PNH->get_row("SELECT * FROM `lang` WHERE `id` = '$id' ")['vn'];
        }
    }
    else
    {
        return $PNH->get_row("SELECT * FROM `lang` WHERE `id` = '$id' ")['vn'];
    }
}
function format_date($time){
    return date("H:i:s d/m/Y", $time);
}
function current_weekdaymb() {
    $weekday = date("l");
    $datedd = date('d-m-Y H:i:s');
    $timestamp = strtotime($datedd);  
    $fromdate = date('H:i:s', $timestamp);
    if($fromdate > '17:15:00'){
        $t = strtotime('+1 day', time());
        $weekday = date("l", $t);
    }
    $weekday = strtolower($weekday);
    switch($weekday) {
        case 'monday':
            $weekday = 'monday';
            break;
        case 'tuesday':
            $weekday = 'tuesday';
            break;
        case 'wednesday':
            $weekday = 'wednesday';
            break;
        case 'thursday':
            $weekday = 'thursday';
            break;
        case 'friday':
            $weekday = 'friday';
            break;
        case 'saturday':
            $weekday = 'saturday';
            break;
        default:
            $weekday = 'sunday';
            break;
    }
    return $weekday;
}
function current_weekdaymnam() {
    $weekday = date("l");
    $datedd = date('d-m-Y H:i:s');
    $timestamp = strtotime($datedd);  
    $fromdate = date('H:i:s', $timestamp);
    if($fromdate > '16:15:00'){
        $t = strtotime('+1 day', time());
        $weekday = date("l", $t);
    }
    $weekday = strtolower($weekday);
    switch($weekday) {
        case 'monday':
            $weekday = 'monday';
            break;
        case 'tuesday':
            $weekday = 'tuesday';
            break;
        case 'wednesday':
            $weekday = 'wednesday';
            break;
        case 'thursday':
            $weekday = 'thursday';
            break;
        case 'friday':
            $weekday = 'friday';
            break;
        case 'saturday':
            $weekday = 'saturday';
            break;
        default:
            $weekday = 'sunday';
            break;
    }
    return $weekday;
}

function current_weekhoantra($t) {
    $dag = date("l", $t);
    $weekday = strtolower($dag);
    switch($weekday) {
        case 'monday':
            $weekday = 'Thứ Hai';
            break;
        case 'tuesday':
            $weekday = 'Thứ Ba';
            break;
        case 'wednesday':
            $weekday = 'Thứ Tư';
            break;
        case 'thursday':
            $weekday = 'Thứ Năm';
            break;
        case 'friday':
            $weekday = 'Thứ Sáu';
            break;
        case 'saturday':
            $weekday = 'Thứ Bảy';
            break;
        default:
            $weekday = 'Chủ Nhật';
            break;
    }
    return $weekday;
}
function curl_getxs($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $data = curl_exec($ch);
    
    curl_close($ch);
    return $data;
}
function getsosao($sosao){
    if($sosao == 5):
        echo '<img src="template/img/star-fill.svg" alt="Star">
        <img src="template/img/star-fill.svg" alt="Star">
        <img src="template/img/star-fill.svg" alt="Star">
        <img src="template/img/star-fill.svg" alt="Star">
        <img src="template/img/star-fill.svg" alt="Star">';
        elseif($sosao > 4):
            echo '<img src="template/img/star-fill.svg" alt="Star">
            <img src="template/img/star-fill.svg" alt="Star">
            <img src="template/img/star-fill.svg" alt="Star">
            <img src="template/img/star-fill.svg" alt="Star">
            <img src="template/img/star-half.svg" alt="Star">';
            elseif($sosao == 4):
                echo '<img src="template/img/star-fill.svg" alt="Star">
                <img src="template/img/star-fill.svg" alt="Star">
                <img src="template/img/star-fill.svg" alt="Star">
                <img src="template/img/star-fill.svg" alt="Star">
                <img src="template/img/star-outline.svg" alt="Star">';
                elseif($sosao > 3):
                    echo '<img src="template/img/star-fill.svg" alt="Star">
                    <img src="template/img/star-fill.svg" alt="Star">
                    <img src="template/img/star-fill.svg" alt="Star">
                    <img src="template/img/star-half.svg" alt="Star">
                    <img src="template/img/star-outline.svg" alt="Star">';
                    elseif($sosao == 3):
                        echo '<img src="template/img/star-fill.svg" alt="Star">
                        <img src="template/img/star-fill.svg" alt="Star">
                        <img src="template/img/star-fill.svg" alt="Star">
                        <img src="template/img/star-outline.svg" alt="Star">
                        <img src="template/img/star-outline.svg" alt="Star">';
                        elseif($sosao > 2):
                            echo '<img src="template/img/star-fill.svg" alt="Star">
                            <img src="template/img/star-fill.svg" alt="Star">
                            <img src="template/img/star-half.svg" alt="Star">
                            <img src="template/img/star-outline.svg" alt="Star">
                            <img src="template/img/star-outline.svg" alt="Star">';
                            elseif($sosao == 2):
                                echo '<img src="template/img/star-fill.svg" alt="Star">
                                <img src="template/img/star-fill.svg" alt="Star">
                                <img src="template/img/star-outline.svg" alt="Star">
                                <img src="template/img/star-outline.svg" alt="Star">
                                <img src="template/img/star-outline.svg" alt="Star">';
                                elseif($sosao > 1):
                                    echo '<img src="template/img/star-fill.svg" alt="Star">
                                    <img src="template/img/star-half.svg" alt="Star">
                                    <img src="template/img/star-outline.svg" alt="Star">
                                    <img src="template/img/star-outline.svg" alt="Star">
                                    <img src="template/img/star-outline.svg" alt="Star">';
                                    elseif($sosao == 1):
                                        echo '<img src="template/img/star-fill.svg" alt="Star">
                                        <img src="template/img/star-outline.svg" alt="Star">
                                        <img src="template/img/star-outline.svg" alt="Star">
                                        <img src="template/img/star-outline.svg" alt="Star">
                                        <img src="template/img/star-outline.svg" alt="Star">';
                                        else:
                                            echo '<img src="template/img/star-outline.svg" alt="Star">
                                            <img src="template/img/star-outline.svg" alt="Star">
                                            <img src="template/img/star-outline.svg" alt="Star">
                                            <img src="template/img/star-outline.svg" alt="Star">
                                            <img src="template/img/star-outline.svg" alt="Star">';
                                            endif;
}
function getsosaokhoahoclq($id){
    global $PNH;
    $count5 = 0; 
    $total5 = 0; 
    $count4 = 0; 
    $total4 = 0;
    $count3 = 0; 
    $total3 = 0;
    $count2 = 0; 
    $total2 = 0;
    $count1 = 0; 
    $total1 = 0;
    foreach ($PNH->get_list(" SELECT * FROM `reviewkhoahoc` WHERE `idkhoahoc` = '" .$id. "' ") as $reviewkhoahoc) { 
        if($reviewkhoahoc['ratestar'] == 5){
            $total5 = $total5 + $reviewkhoahoc['ratestar'];
            $count5++;
        }elseif ($reviewkhoahoc['ratestar'] == 4) {
            $total4 = $total4 + $reviewkhoahoc['ratestar'];
            $count4++;
        }elseif ($reviewkhoahoc['ratestar'] == 3) {
            $total3 = $total3 + $reviewkhoahoc['ratestar'];
            $count3++;
        }elseif ($reviewkhoahoc['ratestar'] == 2) {
            $total2 = $total2 + $reviewkhoahoc['ratestar'];
            $count2++;
        }elseif ($reviewkhoahoc['ratestar'] == 1) {
            $total1 = $total1 + $reviewkhoahoc['ratestar'];
            $count1++;
        }
    }
    $counttotal = $count1 + $count2 + $count3 + $count4 + $count5;
    if($counttotal > 0){
        $sosao = round($count5 / $counttotal * 5 + $count4 / $counttotal * 4 + $count3 / $counttotal * 3 + $count2 / $counttotal * 2 + $count1 / $counttotal * 1, 1);
    }else{
        $sosao = 0;
    }
    return $sosao;
}    
function getsaokhoahoclq($id){
    global $PNH;
    $count5 = 0; 
    $total5 = 0; 
    $count4 = 0; 
    $total4 = 0;
    $count3 = 0; 
    $total3 = 0;
    $count2 = 0; 
    $total2 = 0;
    $count1 = 0; 
    $total1 = 0;
    foreach ($PNH->get_list(" SELECT * FROM `reviewkhoahoc` WHERE `idkhoahoc` = '" .$id. "' ") as $reviewkhoahoc) { 
        if($reviewkhoahoc['ratestar'] == 5){
            $total5 = $total5 + $reviewkhoahoc['ratestar'];
            $count5++;
        }elseif ($reviewkhoahoc['ratestar'] == 4) {
            $total4 = $total4 + $reviewkhoahoc['ratestar'];
            $count4++;
        }elseif ($reviewkhoahoc['ratestar'] == 3) {
            $total3 = $total3 + $reviewkhoahoc['ratestar'];
            $count3++;
        }elseif ($reviewkhoahoc['ratestar'] == 2) {
            $total2 = $total2 + $reviewkhoahoc['ratestar'];
            $count2++;
        }elseif ($reviewkhoahoc['ratestar'] == 1) {
            $total1 = $total1 + $reviewkhoahoc['ratestar'];
            $count1++;
        }
    }
    $counttotal = $count1 + $count2 + $count3 + $count4 + $count5;
    if($counttotal > 0){
        $sosao = round($count5 / $counttotal * 5 + $count4 / $counttotal * 4 + $count3 / $counttotal * 3 + $count2 / $counttotal * 2 + $count1 / $counttotal * 1, 1);
    }else{
        $sosao = 0;
    }
    if($sosao == 5):
            echo '<img src="template/img/star-fill.svg" alt="Star">
            <img src="template/img/star-fill.svg" alt="Star">
            <img src="template/img/star-fill.svg" alt="Star">
            <img src="template/img/star-fill.svg" alt="Star">
            <img src="template/img/star-fill.svg" alt="Star">';
            elseif($sosao > 4):
                echo '<img src="template/img/star-fill.svg" alt="Star">
                <img src="template/img/star-fill.svg" alt="Star">
                <img src="template/img/star-fill.svg" alt="Star">
                <img src="template/img/star-fill.svg" alt="Star">
                <img src="template/img/star-half.svg" alt="Star">';
                elseif($sosao == 4):
                    echo '<img src="template/img/star-fill.svg" alt="Star">
                    <img src="template/img/star-fill.svg" alt="Star">
                    <img src="template/img/star-fill.svg" alt="Star">
                    <img src="template/img/star-fill.svg" alt="Star">
                    <img src="template/img/star-outline.svg" alt="Star">';
                    elseif($sosao > 3):
                        echo '<img src="template/img/star-fill.svg" alt="Star">
                        <img src="template/img/star-fill.svg" alt="Star">
                        <img src="template/img/star-fill.svg" alt="Star">
                        <img src="template/img/star-half.svg" alt="Star">
                        <img src="template/img/star-outline.svg" alt="Star">';
                        elseif($sosao == 3):
                            echo '<img src="template/img/star-fill.svg" alt="Star">
                            <img src="template/img/star-fill.svg" alt="Star">
                            <img src="template/img/star-fill.svg" alt="Star">
                            <img src="template/img/star-outline.svg" alt="Star">
                            <img src="template/img/star-outline.svg" alt="Star">';
                            elseif($sosao > 2):
                                echo '<img src="template/img/star-fill.svg" alt="Star">
                                <img src="template/img/star-fill.svg" alt="Star">
                                <img src="template/img/star-half.svg" alt="Star">
                                <img src="template/img/star-outline.svg" alt="Star">
                                <img src="template/img/star-outline.svg" alt="Star">';
                                elseif($sosao == 2):
                                    echo '<img src="template/img/star-fill.svg" alt="Star">
                                    <img src="template/img/star-fill.svg" alt="Star">
                                    <img src="template/img/star-outline.svg" alt="Star">
                                    <img src="template/img/star-outline.svg" alt="Star">
                                    <img src="template/img/star-outline.svg" alt="Star">';
                                    elseif($sosao > 1):
                                        echo '<img src="template/img/star-fill.svg" alt="Star">
                                        <img src="template/img/star-half.svg" alt="Star">
                                        <img src="template/img/star-outline.svg" alt="Star">
                                        <img src="template/img/star-outline.svg" alt="Star">
                                        <img src="template/img/star-outline.svg" alt="Star">';
                                        elseif($sosao == 1):
                                            echo '<img src="template/img/star-fill.svg" alt="Star">
                                            <img src="template/img/star-outline.svg" alt="Star">
                                            <img src="template/img/star-outline.svg" alt="Star">
                                            <img src="template/img/star-outline.svg" alt="Star">
                                            <img src="template/img/star-outline.svg" alt="Star">';
                                            else:
                                                echo '<img src="template/img/star-outline.svg" alt="Star">
                                                <img src="template/img/star-outline.svg" alt="Star">
                                                <img src="template/img/star-outline.svg" alt="Star">
                                                <img src="template/img/star-outline.svg" alt="Star">
                                                <img src="template/img/star-outline.svg" alt="Star">';
                                                endif;
}


function livefb($data)
{
    if ($data == 'DIE')
    {
        $show = '<span class="badge bg-danger">DIE</span>';
    }
    else if ($data == 'LIVE')
    {
        $show = '<span class="badge bg-success">LIVE</span>';
    }
    return $show;
}


function sendCSM($mail_nhan,$ten_nhan,$chu_de,$noi_dung,$bcc)
{
    global $site_gmail_momo, $site_pass_momo;
        // PHPMailer Modify
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;
        $mail->Debugoutput = "html";
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $site_gmail_momo; // GMAIL STMP
        $mail->Password = $site_pass_momo; // PASS STMP
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom($site_gmail_momo, $bcc);
        $mail->addAddress($mail_nhan, $ten_nhan);
        $mail->addReplyTo($site_gmail_momo, $bcc);
        $mail->isHTML(true);
        $mail->Subject = $chu_de;
        $mail->Body    = $noi_dung;
        $mail->CharSet = 'UTF-8';
        $send = $mail->send();
        return $send;
}
function parse_order_id($des)
{
    global $MEMO_PREFIX;
    $re = '/'.$MEMO_PREFIX.'\d+/im';
    preg_match_all($re, $des, $matches, PREG_SET_ORDER, 0);
    if (count($matches) == 0 )
        return null;
    // Print the entire match result
    $orderCode = $matches[0][0];
    $prefixLength = strlen($MEMO_PREFIX);
    $orderId = intval(substr($orderCode, $prefixLength ));
    return $orderId ;
}


function BASE_URL($url)
{
    global $base_url;
    return $base_url.$url;
}
function gettime()
{
    return date('Y/m/d H:i:s', time());
}
function check_string($data)
{
    return trim(htmlspecialchars(addslashes($data)));
    //return str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($data))));
}

function format_cash($number, $suffix = '') {
    return number_format($number, 0, ',', '.') . "{$suffix}";
}
function curl_get($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    
    curl_close($ch);
    return $data;
}
function random($string, $int)
{  
    return substr(str_shuffle($string), 0, $int);
}
function pheptru($int1, $int2)
{
    return $int1 - $int2;
}
function phepcong($int1, $int2)
{
    return $int1 + $int2;
}
function phepnhan($int1, $int2)
{
    return $int1 * $int2;
}
function phepchia($int1, $int2)
{
    return $int1 / $int2;
}
function check_img($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("png","jpeg","jpg","PNG","JPEG","JPG","gif","GIF");
    if(in_array($ext, $valid_ext))
    {
        return true;
    }
}
/*
function msg_success2($text)
{
    return die('<div class="alert alert-success alert-dismissible error-messages">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'.$text.'</div>');
}
function msg_error2($text)
{
    return die('<div class="alert alert-danger alert-dismissible error-messages">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'.$text.'</div>');
}
function msg_warning2($text)
{
    return die('<div class="alert alert-warning alert-dismissible error-messages">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'.$text.'</div>');
}
function msg_success($text, $url, $time)
{
    return die('<div class="alert alert-success alert-dismissible error-messages">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'.$text.'</div><script type="text/javascript">setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function msg_error($text, $url, $time)
{
    return die('<div class="alert alert-danger alert-dismissible error-messages">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'.$text.'</div><script type="text/javascript">setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function msg_warning($text, $url, $time)
{
    return die('<div class="alert alert-warning alert-dismissible error-messages">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'.$text.'</div><script type="text/javascript">setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
*/
function msg_success3($text, $url)
{
    return die('<script type="text/javascript">Swal.fire({icon: "error",title: "Thất bại",text: "'.$text.'",footer: `<a href="'.$url.'">Ấn vào đây để liên hệ CSKH!</a>`});</script>');
}
function msg_success2($text)
{
    return die('<script type="text/javascript">Swal.fire("'.lang(96).'", "'.$text.'","success");</script>');
}
function msg_error2($text)
{
    return die('<script type="text/javascript">Swal.fire("'.lang(95).'", "'.$text.'","error");</script>');
}
function msg_warning2($text)
{
    return die('<script type="text/javascript">Swal.fire("'.lang(97).'", "'.$text.'","warning");</script>');
}
function msg_success($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("'.lang(96).'", "'.$text.'","success");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function msg_error($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("'.lang(95).'", "'.$text.'","error");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function msg_warning($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("'.lang(97).'", "'.$text.'","warning");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}

function admin_msg_success($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("'.lang(96).'", "'.$text.'","success");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function admin_msg_error($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("'.lang(95).'", "'.$text.'","error");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function admin_msg_warning($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("'.lang(97).'", "'.$text.'","warning");
    setTimeout(function(){ location.href = "'.$url.'" },'.$time.');</script>');
}
function display_banned($data)
{
    if ($data == 1)
    {
        $show = '<span class="badge badge-danger">Banned</span>';
    }
    else if ($data == 0)
    {
        $show = '<span class="badge badge-success">Hoạt động</span>';
    }
    return $show;
}
function display_loaithe($data)
{
    if ($data == 0)
    {
        $show = '<span class="label label-warning">Bảo trì</span>';
    }
    else 
    {
        $show = '<span class="label label-success">Hoạt động</span>';
    }
    return $show;
}
function display_ruttien($data)
{
    if ($data == 'xuly')
    {
        $show = '<span class="label label-info">Đang xử lý</span>';
    }
    else if ($data == 'hoantat')
    {
        $show = '<span class="label label-success">Đã thanh toán</span>';
    }
    else if ($data == 'huy')
    {
        $show = '<span class="label label-danger">Hủy</span>';
    }
    return $show;
}
function XoaDauCach($text)
{
    return trim(preg_replace('/\s+/',' ', $text));
}
function display($data)
{
    if ($data == 'HIDE')
    {
        $show = '<span class="badge badge-danger">ẨN</span>';
    }
    else if ($data == 'SHOW')
    {
        $show = '<span class="badge badge-success">HIỂN THỊ</span>';
    }
    return $show;
}
function status($data)
{
    if ($data == 'xuly'){
        $show = '<span class="label label-info">Đang xử lý</span>';
    }
    else if ($data == 'hoantat'){
        $show = '<span class="label label-success">Hoàn tất</span>';
    }
    else if ($data == 'thanhcong'){
        $show = '<span class="label label-success">Thành công</span>';
    }
    else if ($data == 'success'){
        $show = '<span class="label label-success">Success</span>';
    }
    else if ($data == 'thatbai'){
        $show = '<span class="label label-danger">Thất bại</span>';
    }
    else if ($data == 'error'){
        $show = '<span class="label label-danger">Error</span>';
    }
    else if ($data == 'loi'){
        $show = '<span class="label label-danger">Lỗi</span>';
    }
    else if ($data == 'huy'){
        $show = '<span class="label label-danger">Hủy</span>';
    }
    else if ($data == 'dangnap'){
        $show = '<span class="label label-warning">Đang đợi nạp</span>';
    }
    else if ($data == 2){
        $show = '<span class="label label-success">Hoàn tất</span>';
    }
    else if ($data == 1){
        $show = '<span class="label label-info">Đang xử lý</span>';
    }
    else{
        $show = '<span class="label label-warning">Khác</span>';
    }
    return $show;
}
function getHeader(){
    $headers = array();
    $copy_server = array(
        'CONTENT_TYPE'   => 'Content-Type',
        'CONTENT_LENGTH' => 'Content-Length',
        'CONTENT_MD5'    => 'Content-Md5',
    );
    foreach ($_SERVER as $key => $value) {
        if (substr($key, 0, 5) === 'HTTP_') {
            $key = substr($key, 5);
            if (!isset($copy_server[$key]) || !isset($_SERVER[$key])) {
                $key = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', $key))));
                $headers[$key] = $value;
            }
        } elseif (isset($copy_server[$key])) {
            $headers[$copy_server[$key]] = $value;
        }
    }
    if (!isset($headers['Authorization'])) {
        if (isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) {
            $headers['Authorization'] = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
        } elseif (isset($_SERVER['PHP_AUTH_USER'])) {
            $basic_pass = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';
            $headers['Authorization'] = 'Basic ' . base64_encode($_SERVER['PHP_AUTH_USER'] . ':' . $basic_pass);
        } elseif (isset($_SERVER['PHP_AUTH_DIGEST'])) {
            $headers['Authorization'] = $_SERVER['PHP_AUTH_DIGEST'];
        }
    }
    return $headers;
}

function check_username($data)
{
    if (preg_match('/^[a-zA-Z0-9_-]{3,16}$/', $data, $matches))
    {
        return True;
    }
    else
    {
        return False;
    }
}
function check_email($data)
{
    if (preg_match('/^.+@.+$/', $data, $matches))
    {
        return True;
    }
    else
    {
        return False;
    }
}
function check_phone($data)
{
    if (preg_match('/^\+?(\d.*){3,}$/', $data, $matches))
    {
        return True;
    }
    else
    {
        return False;
    }
}
function check_url($url)
{
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $url);
    curl_setopt($c, CURLOPT_HEADER, 1);
    curl_setopt($c, CURLOPT_NOBODY, 1);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_FRESH_CONNECT, 1);
    if(!curl_exec($c))
    {
        return false;
    }
    else
    {
        return true;
    }
}
function check_zip($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("zip","ZIP");
    if(in_array($ext, $valid_ext))
    {
        return true;
    }
}
function TypePassword($string)
{
    global $PNH;
    if($PNH->site('TypePassword') == 'md5')
    {
        return md5($string);
    }
    else if($PNH->site('TypePassword') == 'sha1')
    {
        return sha1($string);
    }
    else if($PNH->site('TypePassword') == '')
    {
        return $string;
    }
    else
    {
        return md5($string);
    }
}
function phantrang($url, $start, $total, $kmess)
{
    $out[] = '<nav aria-label="Page navigation example"><ul class="pagination pagination-lg">';
    $neighbors = 2;
    if ($start >= $total) $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
    else $start = max(0, (int)$start - ((int)$start % (int)$kmess));
    $base_link = '<li class="page-item"><a class="page-link" href="' . strtr($url, array('%' => '%%')) . 'page=%d' . '">%s</a></li>';
    $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '<i class="fa fa-chevron-circle-left" aria-hidden="true"></i>');
    if ($start > $kmess * $neighbors) $out[] = sprintf($base_link, 1, '1');
    if ($start > $kmess * ($neighbors + 1)) $out[] = '<li class="page-item"><a class="page-link">...</a></li>';
    for ($nCont = $neighbors;$nCont >= 1;$nCont--) if ($start >= $kmess * $nCont) {
        $tmpStart = $start - $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    $out[] = '<li class="page-item active"><a class="page-link">' . ($start / $kmess + 1) . '</a></li>';
    $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
    for ($nCont = 1;$nCont <= $neighbors;$nCont++) if ($start + $kmess * $nCont <= $tmpMaxPages) {
        $tmpStart = $start + $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages) $out[] = '<li class="page-item"><a class="page-link">...</a></li>';
    if ($start + $kmess * $neighbors < $tmpMaxPages) $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
    if ($start + $kmess < $total)
    {
        $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
        $out[] = sprintf($base_link, $display_page, '<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
        ');
    }
    $out[] = '</ul></nav>';
    return implode('', $out);
}
function myip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))     
    {  
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];  
    }  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))    
    {  
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
    else  
    {  
        $ip_address = $_SERVER['REMOTE_ADDR'];  
    }
    return $ip_address;
}
function timeAgo($time_ago)
{
    $time_ago   = date("Y-m-d H:i:s", $time_ago);
    $time_ago   = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60)
    {
        return "$seconds giây trước";
    }
    //Minutes
    else if($minutes <= 60)
    {
        return "$minutes phút trước";
    }
    //Hours
    else if($hours <= 24)
    {
        return "$hours tiếng trước";
    }
    //Days
    else if($days <= 7)
    {
        if($days == 1)
        {
            return "Hôm qua";
        }
        else
        {
            return "$days ngày trước";
        }
    }
    //Weeks
    else if($weeks <= 4.3)
    {
        return "$weeks tuần trước";
    }
    //Months
    else if($months <=12)
    {
        return "$months tháng trước";
    }
    //Years
    else
    {
        return "$years năm trước";
    }
}
function dirToArray($dir) {
  
    $result = array();
 
    $cdir = scandir($dir);
    foreach ($cdir as $key => $value)
    {
       if (!in_array($value,array(".","..")))
       {
          if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
          {
             $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
          }
          else
          {
             $result[] = $value;
          }
       }
    }
   
    return $result;
 }

 function realFileSize($path)
{
    if (!file_exists($path))
        return false;

    $size = filesize($path);
   
    if (!($file = fopen($path, 'rb')))
        return false;
   
    if ($size >= 0)
    {//Check if it really is a small file (< 2 GB)
        if (fseek($file, 0, SEEK_END) === 0)
        {//It really is a small file
            fclose($file);
            return $size;
        }
    }
   
    //Quickly jump the first 2 GB with fseek. After that fseek is not working on 32 bit php (it uses int internally)
    $size = PHP_INT_MAX - 1;
    if (fseek($file, PHP_INT_MAX - 1) !== 0)
    {
        fclose($file);
        return false;
    }
   
    $length = 1024 * 1024;
    while (!feof($file))
    {//Read the file until end
        $read = fread($file, $length);
        $size = bcadd($size, $length);
    }
    $size = bcsub($size, $length);
    $size = bcadd($size, strlen($read));
   
    fclose($file);
    return $size;
}
function FileSizeConvert($bytes)
{
    $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

    foreach($arBytes as $arItem)
    {
        if($bytes >= $arItem["VALUE"])
        {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
}
function GetCorrectMTime($filePath)
{

    $time = filemtime($filePath);

    $isDST = (date('I', $time) == 1);
    $systemDST = (date('I') == 1);

    $adjustment = 0;

    if($isDST == false && $systemDST == true)
        $adjustment = 3600;
   
    else if($isDST == true && $systemDST == false)
        $adjustment = -3600;

    else
        $adjustment = 0;

    return ($time + $adjustment);
}
function DownloadFile($file) { // $file = include path
    if(file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);
        exit;
    }
}
