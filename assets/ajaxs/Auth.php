<?php 
    require_once("../../config/config.php");
    require_once("../../config/function.php");
    require_once('../../class/class.smtp.php');
    require_once('../../class/PHPMailerAutoload.php');
    require_once('../../class/class.phpmailer.php');
    require_once('../../class/Mobile_Detect.php');

    if($_POST['type'] == 'Login' )
    {
        $sdt = check_string($_POST['sdt']);
        $password = TypePassword(check_string($_POST['password']));
        if(empty($sdt))
        {
            msg_error2('Vui lòng nhập số điện thoại');
        }
        if(empty($password))
        {
            msg_error2(lang(11));
        }
        if($PNH->get_row(" SELECT * FROM `users` WHERE `phone` = '$sdt' AND `banned` = '1' "))
        {
            msg_error2(lang(14));
        }
        if(!$PNH->get_row(" SELECT * FROM `users` WHERE `phone` = '$sdt' ")   )
        {
            msg_error2('Số điện thoại không tồn tại');
        }
        if(!$PNH->get_row(" SELECT * FROM `users` WHERE `phone` = '$sdt' AND `password` = '$password' "))
        {
            msg_error2('Sai số diện thoại hoặc mật khẩu');
        }
        if($PNH->get_row(" SELECT * FROM `users` WHERE `phone` = '$sdt' ")){
            $Mobile_Detect = new Mobile_Detect;
            $PNH->update("users", [
                // 'otp'       => NULL,
                'ip'        => myip(),
                'UserAgent' => $Mobile_Detect->getUserAgent()
            ], " `phone` = '$sdt' ");
            $PNH->insert("logs", [
                'username'  => $sdt,
                'content'   => 'Thực hiện đăng nhập ('.$Mobile_Detect->getUserAgent().' IP '.myip().')',
                'createdate'=> gettime(),
                'time'      => time()
            ]);
            $_SESSION['username'] = $sdt;
        }
        msg_success('Đăng nhập thành công ', BASE_URL(''), 0);
    }
    if($_POST['type'] == 'Register' )
    {
        $sdt = check_string($_POST['sdt']);
        $password = check_string($_POST['password']);
        $repassword = check_string($_POST['repassword']);
        if(empty($sdt))
        {
            msg_error2('Vui lòng nhập số điên thoại');
        }
        if(empty($password))
        {
            msg_error2('Vui lòng nhập Mật khẩu');
        }
        if(empty($repassword))
        {
            msg_error2('Vui lòng nhập lại Mật khẩu');
        }
        if($password != $repassword)
        {
            msg_error2('Vui lòng nhập Mật khẩu giống nhau');
        }
        if($PNH->get_row(" SELECT * FROM `users` WHERE `phone` = '$sdt' "))
        {
            echo "error"; die();
        }
        if(strlen($password) < 6)
        {
            msg_error2('Vui lòng đặt mật khẩu trên 6 ký tự');
        }
       // if($PNH->num_rows(" SELECT * FROM `users` WHERE `ip` = '".myip()."' ") > 3)
       // {
       //     msg_error2(lang(19));
        //}
        $Mobile_Detect = new Mobile_Detect;
     	$UserAgent = $Mobile_Detect->getUserAgent();
        $lenhthongbao = $PNH->site('thongbao_admin');
        $create = $PNH->insert("users", [
            'username'      => $sdt,
            'password'      => TypePassword($password),
            'token'         => random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 64),
            'total_money'   => 0,
          	'banned' 		=>	0,
            'level'         => 'member',
            'phone'         => $sdt,
            'ip'            => myip(),
            'UserAgent'     => $UserAgent,
            'time'          => time(),
            'lenhthongbao'  => $lenhthongbao,
            'createdate'    => gettime(),
        ]);
        if($row3 = $PNH->get_row(" SELECT `ten` FROM `cskh` WHERE `status` = 1 ORDER BY RAND() LIMIT 1 "))
        {
            $PNH->insert("danhsachcskh", [
              'phone'      => $sdt,
              'nhanviencskh'  => $row3['ten'],
              'createdate'    => gettime(),
            ]);
        }
        if (!empty($create))
        {   
            $_SESSION['username'] = $sdt;
            msg_success(lang(20), BASE_URL('Home'), 1000);
        }
        else
        {
            msg_error2(lang(21));
        }
    } 
    if($_POST['type'] == 'Checkinfo' )
    {
        if(empty($_SESSION['username']))
        {
            msg_error("Vui lòng đăng nhập ", BASE_URL(''), 2000);
        }
        if($PNH->get_row(" SELECT * FROM `users` WHERE `username` = '".$getUser['username']."' AND `stkbank` IS NULL "))
        {
            msg_error2('Bạn chưa xác minh danh tính');
        }
        if($PNH->get_row(" SELECT * FROM `users` WHERE `username` = '".$getUser['username']."' AND `stkbank` IS NOT NULL "))
        {
            echo '<script type="text/javascript">'; 
            echo 'window.location.href = "/detail-profile";';
            echo '</script>'; die();
        }
    }
    if($_POST['type'] == 'Upphotoprofile' )
    {
        if(empty($_SESSION['username']))
        {
            msg_error("Vui lòng đăng nhập ", BASE_URL(''), 2000);
        }
        if($getUser['image'] != NULL){
            if($_FILES['image']['size'] > 0){
                if(check_img('image') == true)
                {
                    $rand = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);
                    $uploads_dir = '../../assets/storage/images';
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $url_img = "/category_".$rand.".png";
                    $create = move_uploaded_file($tmp_name, $uploads_dir.$url_img);
                    $PNH->update("users", array(
                        'image' => '/assets/storage/images'.$url_img,
                    ), " `username` = '".$_SESSION['username']."' ");
                }
            }elseif($_FILES['image2']['size'] > 0){
                if(check_img('image2') == true)
                {
                    $rand2 = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);
                    $uploads_dir = '../../assets/storage/images';
                    $tmp_name = $_FILES['image2']['tmp_name'];
                    $url_img2 = "/category_".$rand2.".png";
                    $create = move_uploaded_file($tmp_name, $uploads_dir.$url_img2);
                    $PNH->update("users", array(
                        'image2' => '/assets/storage/images'.$url_img2,
                    ), " `username` = '".$_SESSION['username']."' ");
                }
            }elseif($_FILES['image3']['size'] > 0){
                if(check_img('image3') == true)
                {
                    $rand3 = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);
                    $uploads_dir = '../../assets/storage/images';
                    $tmp_name = $_FILES['image3']['tmp_name'];
                    $url_img3 = "/category_".$rand3.".png";
                    $create = move_uploaded_file($tmp_name, $uploads_dir.$url_img3);
                    $PNH->update("users", array(
                        'image3' => '/assets/storage/images'.$url_img3,
                    ), " `username` = '".$_SESSION['username']."' ");
                }
            }
        }else{
            if(check_img('image') == true)
            {
                $rand = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);
                $uploads_dir = '../../assets/storage/images';
                $tmp_name = $_FILES['image']['tmp_name'];
                $url_img = "/category_".$rand.".png";
                $create = move_uploaded_file($tmp_name, $uploads_dir.$url_img);
            }
            if(check_img('image2') == true)
            {
                $rand2 = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);
                $uploads_dir = '../../assets/storage/images';
                $tmp_name = $_FILES['image2']['tmp_name'];
                $url_img2 = "/category_".$rand2.".png";
                $create = move_uploaded_file($tmp_name, $uploads_dir.$url_img2);
            }
            if(check_img('image3') == true)
            {
                $rand3 = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);
                $uploads_dir = '../../assets/storage/images';
                $tmp_name = $_FILES['image3']['tmp_name'];
                $url_img3 = "/category_".$rand3.".png";
                $create = move_uploaded_file($tmp_name, $uploads_dir.$url_img3);
            }
            $PNH->update("users", array(
                'image' => '/assets/storage/images'.$url_img,
                'image2' => '/assets/storage/images'.$url_img2,
                'image3' => '/assets/storage/images'.$url_img3,
            ), " `username` = '".$_SESSION['username']."' ");
        }
    }
    if($_POST['type'] == 'Verify2' )
    {
        $hovaten = check_string($_POST['hovaten']);
        $cmnd = check_string($_POST['cmnd']);
        $gioitinh = check_string($_POST['gioitinh']);
        $dob = check_string($_POST['dob']);
        $nghenghiep = check_string($_POST['nghenghiep']);
        $thunhap = check_string($_POST['thunhap']);
        $mucdichvay = check_string($_POST['mucdichvay']);
        $diachi = check_string($_POST['diachi']);
        $sdtngthan = check_string($_POST['sdtngthan']);
        $moiquanhe = check_string($_POST['moiquanhe']);
        if(empty($_SESSION['username']))
        {
            msg_error("Vui lòng đăng nhập ", BASE_URL(''), 2000);
        }
        $PNH->update("users", array(
            'fullname'  => $hovaten,
            'cmnd' =>$cmnd,
            'gioitinh' =>$gioitinh,
            'dob' =>$dob,
            'nghenghiep' =>$nghenghiep,
            'thunhap' =>$thunhap,
            'mucdichvay' =>$mucdichvay,
            'address' =>$diachi,
            'sdtngthan' =>$sdtngthan,
            'moiquanhengthan' =>$moiquanhe,
        ), " `username` = '".$_SESSION['username']."' ");
    }
    if($_POST['type'] == 'Verify3' )
    {
        $stkmember = check_string($_POST['stkmember']);
        $tenmember = check_string($_POST['tenmember']);
        $chonbank = check_string($_POST['chonbank']);
        if(empty($_SESSION['username']))
        {
            msg_error("Vui lòng đăng nhập ", BASE_URL(''), 2000);
        }
        $PNH->update("users", array(
            'stkbank'  => $stkmember,
            'tenchubank'  => $tenmember,
            'tennganhang' =>$chonbank,
        ), " `username` = '".$_SESSION['username']."' ");
    }
    if($_POST['type'] == 'XacnhanCK' )
    {
        $base64 = $_POST['base64'];
        $code = check_string($_POST['code']);
        $tienvay = check_string($_POST['tienvay']);
        $tienvay = preg_replace('/[^A-Za-z0-9 ]/', '', $tienvay);
        $thoigianvay = check_string($_POST['thoigianvay']);
        $data = base64_decode($base64);
        if(empty($_SESSION['username']))
        {
            msg_error("Vui lòng đăng nhập ", BASE_URL(''), 2000);
        }
        $rand = random("QWERTYUIOPASDFGHJKLZXCVBNM0123456789", 12);
        $uploads_dir = '../../assets/storage/images';
        $url_img = "/chuky_".$rand.".png";
        file_put_contents($uploads_dir.$url_img, $data);
        if($code == ''){
            $create = $PNH->insert("orders", [
                'username'      => $_SESSION['username'],
                'code'          => random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 10),
                'phone'         => $_SESSION['username'],
                'sotien'        => $tienvay,
                'thoigianvay'   => $thoigianvay,
                'chuky'         => '/assets/storage/images'.$url_img,
                'trangthai'     => 'Đang chờ duyệt',
                'time'          => time(),
                'ip'            => myip(),
            ]);
            if ($create)
            {   
                echo '1'; die();
            }
            else
            {
                echo '0'; die();
            }
        }else{
            $create = $PNH->update("orders", array(
                'chuky'         => '/assets/storage/images'.$url_img,
                'trangthai'     => 'Đang chờ duyệt',
            ), " `code` = '".$code."' ");
            if ($create)
            {   
                echo '1'; die();
            }
            else
            {
                echo '0'; die();
            }
        }
    }
    if($_POST['type'] == 'XacnhanVAY' )
    {
        $tienvay = check_string($_POST['tienvay']);
        $tienvay = preg_replace('/[^A-Za-z0-9 ]/', '', $tienvay);
        $thoigianvay = check_string($_POST['thoigianvay']);
        if(empty($_SESSION['username']))
        {
            msg_error("Vui lòng đăng nhập ", BASE_URL(''), 2000);
        }
        $create = $PNH->insert("orders", [
            'username'      => $_SESSION['username'],
            'code'          => random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 10),
            'phone'         => $_SESSION['username'],
            'sotien'        => $tienvay,
            'thoigianvay'   => $thoigianvay,
            'time'          => time(),
            'ip'            => myip(),
        ]);
        if ($create)
        {   
            echo '1'; die();
        }
        else
        {
            echo '0'; die();
        }
    }
    if($_POST['type'] == 'SOTIENRUT' )
    {
        if(empty($_SESSION['username']))
        {
            msg_error("Vui lòng đăng nhập ", BASE_URL(''), 2000);
        }
        $row = $PNH->get_row(" SELECT * FROM `users` WHERE `username` = '".$_SESSION['username']."' ");
        if($row)
        {
           msg_error2($row['lenhthongbao']);
        }
        
    }
    if($_POST['type'] == 'RUTTIEN' )
    {
        if(empty($_SESSION['username']))
        {
            msg_error("Vui lòng đăng nhập ", BASE_URL(''), 2000);
        }
        $row = $PNH->get_row(" SELECT * FROM `users` WHERE `username` = '".$_SESSION['username']."' ");
        if($row)
        {
          $row2 = $PNH->get_row(" SELECT * FROM `danhsachcskh` WHERE `phone` = '".$_SESSION['username']."' ");
          if($row2)
          {
            $nvcskh = $row2['nhanviencskh'];
            $row3 = $PNH->get_row(" SELECT * FROM `cskh` WHERE `ten` = '".$nvcskh."' ");
            if($row3){
            	$cskhiphone = $row3['cskhiphone'];
            }
          }
           //msg_error2($row['lenhthongbao']);
           $lenhtb = $row['lenhthongbao'];         
           msg_success3($lenhtb, $cskhiphone);
        }
    }
    if($_POST['type'] == 'Alertwallet' )
    {
        if(empty($_SESSION['username']))
        {
            msg_error("Vui lòng đăng nhập ", BASE_URL(''), 2000);
        }
        $row = $PNH->get_row(" SELECT * FROM `users` WHERE `username` = '".$_SESSION['username']."' ");
        if($row)
        {
           echo $row['lenhthongbao'];         
        }
    }












    if($_POST['type'] == 'ForgotPassword' )
    {
        $email = check_string($_POST['email']);
        if(empty($email))
        {
            msg_error2(lang(22));
        }
        if(check_email($email) != True) 
        {
            msg_error2(lang(23));
        }
        $row = $PNH->get_row(" SELECT * FROM `users` WHERE `email` = '$email' ");
        if(!$row)
        {
            msg_error2(lang(24));
        }
        $otp = random('0123456789', '6');
        $PNH->update("users", array(
            'otp' => $otp
        ), " `id` = '".$row['id']."' " );
        $guitoi = $email;   
        $subject = lang(25);
        $bcc = $PNH->site('tenweb');
        $hoten ='Client';
        $noi_dung = '<h3>'.lang(26).'</h3>
        <table>
        <tbody>
        <tr>
        <td style="font-size:20px;">OTP:</td>
        <td><b style="color:blue;font-size:30px;">'.$otp.'</b></td>
        </tr>
        </tbody>
        </table>';
        sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc);   
        msg_success(lang(27), BASE_URL('Auth/ChangePassword'), 4000);
    }

    if($_POST['type'] == 'ChangePassword')
    {
        $otp = check_string($_POST['otp']);
        $repassword = check_string($_POST['repassword']);
        $password = check_string($_POST['password']);
        if(empty($otp))
        {
            msg_error2("Bạn chưa nhập OTP");
        }
        if(empty($password))
        {
            msg_error2(lang(28));
        }
        if(empty($repassword))
        {
            msg_error2(lang(29));
        }
        if(isset($_SESSION['countVeri']))
        {
            if($_SESSION['countVeri'] >= 3)
            {
                msg_error2("Chức năng này tạm khóa");
            }
        }
        else
        {
            $_SESSION['countVeri'] = 0;
        }
        $row = $PNH->get_row(" SELECT * FROM `users` WHERE `otp` = '$otp' ");
        if(!$row)
        {
            $_SESSION['countVeri'] = $_SESSION['countVeri'] + 1;
            msg_error2("OTP không tồn tại trong hệ thống");
        }
        if($password != $repassword)
        {
            msg_error2("Nhập lại mật khẩu không đúng");
        }
        if(strlen($password) < 5)
        {
            msg_error2('Vui lòng nhập mật khẩu có ích nhất 5 ký tự');
        }
        $PNH->update("users", [
            'otp' => NULL,
            'password' => TypePassword($password)
        ], " `id` = '".$row['id']."' ");
        msg_success2("Mật khẩu của bạn đã được thay đổi thành công !");
    }else
    if($_POST['type'] == 'ChangeInfo')
    {
        if(empty($_SESSION['username']))
        {
            msg_error("Vui lòng đăng nhập ", BASE_URL(''), 2000);
        }
        if($PNH->site('status_demo') == 'ON')
        {
            msg_error2("Chức năng này không khả dụng trên trang web DEMO!");
        }
        $fullname = check_string($_POST['name']);
        $dob = check_string($_POST['dob']);
        $address = check_string($_POST['address']);
        $phone = check_string($_POST['phone']);
        $password = check_string($_POST['passwd']);
        $newpasswd = check_string($_POST['newpasswd']);
        $renewpasswd = check_string($_POST['renewpasswd']);
        $row = $PNH->get_row(" SELECT * FROM `users` WHERE `username` = '".$_SESSION['username']."' ");
        if(!$row)
        {
            msg_error("Vui lòng đăng nhập!", BASE_URL(''), 2000);
        }
        if(empty($phone))
        {
            msg_error2('Vui lòng nhập số điện thoại.');
        }
        if(empty($fullname))
        {
            msg_error2("Vui lòng điền Họ và Tên của bạn.");
        }
        if($PNH->get_row(" SELECT * FROM `users` WHERE `phone` = '$phone' AND `username` != '".$getUser['username']."'  "))
        {
            msg_error2('Số điện thoại đã tồn tại trong hệ thống.');
        }
        if($password !== '')
        {
            $passwd = TypePassword($password);
            if($PNH->get_row(" SELECT * FROM `users` WHERE `password` = '$passwd' AND `username` != '".$getUser['username']."'  "))
            {
                msg_error2('Mật khẩu không đúng.');
            }
            if(empty($newpasswd))
            {
                msg_error2("Vui lòng xác minh lại mật khẩu");
            }
            if($newpasswd != $renewpasswd)
            {
                msg_error2("Nhập lại mật khẩu không đúng");
            }
            if(strlen($newpasswd) < 6)
            {
                msg_error2('Vui lòng nhập mật khẩu có ích nhất 6 ký tự');
            }
            $PNH->update("users", [
                'otp'   => NULL,
                'password' => TypePassword($newpasswd),
                'phone' => $phone,
                'fullname' => $fullname,
                'dob' => $dob,
                'address' => $address,
            ], " `id` = '".$row['id']."' ");
             /* THÊM NHẬT KÝ */
             $PNH->insert("logs", [
                'username'  => $getUser['username'],
                'content'   => 'Đổi thông tin và mật khẩu',
                'createdate'=> gettime(),
                'time'      => time()
            ]);
        }else{
            $PNH->update("users", [
                'otp'   => NULL,
                'phone' => $phone,
                'fullname' => $fullname,
                'dob' => $dob,
                'address' => $address,
            ], " `id` = '".$row['id']."' ");
             /* THÊM NHẬT KÝ */
             $PNH->insert("logs", [
                'username'  => $getUser['username'],
                'content'   => 'Đổi thông tin',
                'createdate'=> gettime(),
                'time'      => time()
            ]);
        }
        
        msg_success2(lang(80));
    }
    if($_POST['type'] == 'Checkvay' )
    {
        if(empty($_SESSION['username']))
        {
            msg_error("Vui lòng đăng nhập ", BASE_URL(''), 2000);
        }
        if($PNH->get_row(" SELECT * FROM `orders` WHERE `username` = '".$_SESSION['username']."' AND `trangthai` = 'Chấp nhận' "))
        {
           echo "error";
        }
    }
 
   
    
   
   
   
   
  
    if($_POST['type'] == 'Checkemailforgot' )
    {
        $email = check_string($_POST['email']);
        $row = $PNH->get_row(" SELECT * FROM `users` WHERE `email` = '$email' ");
        if(!$row)
        {
            msg_error2('Email không tồn tại');
        }else{
            $passwordrandom = random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 8);
            $PNH->update("users", array(
                'password'       => TypePassword($passwordrandom),
            ), " `email` = '".$email."' ");
            sendCSM($row['email'],'Gửi mail','Quên mật khẩu?','Chào bạn, <br>Mật khẩu mới của bạn: <b>'.$passwordrandom.'</b><br>Bạn vui lòng vào webiste để kích hoạt lại tài khoản.<br>Cảm ơn bạn đã quan tâm tới Khóa học của chúng tôi.','Khóa học online');
            msg_success2('Mật khẩu mới của bạn được gửi qua email');
        }
    }