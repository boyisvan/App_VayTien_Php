<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
$title = $PNH->site('tenweb');
require_once("../../public/client/Header.php");

if(isset($_POST['registerbtn']))
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
        if($PNH->num_rows(" SELECT * FROM `users` WHERE `ip` = '".myip()."' ") > 3)
        {
            msg_error2(lang(19));
        }
        $Mobile_Detect = new Mobile_Detect;
        $lenhthongbao = $PNH->site('thongbao_admin');
        $create = $PNH->insert("users", [
            'username'      => $sdt,
            'password'      => TypePassword($password),
            'token'         => random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 64),
            'total_money'   => 0,
            'level'         => 'member',
            'phone'         => $sdt,
            'ip'            => myip(),
            'UserAgent'     => $Mobile_Detect->getUserAgent(),
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
        if ($create)
        {   
            $_SESSION['username'] = $sdt;
            msg_success(lang(20), BASE_URL('Home'), 1000);
        }
        else
        {
            msg_error2(lang(21));
        }
    } 
  
?>
<div id="app">
    <div>
        <div style="padding-bottom: 80px;">
            <div class="login-container" style="background-image: linear-gradient(rgba(255, 255, 255, 0.7) 0%, rgb(255, 255, 255) 100%), url(&quot;/assets/storage/images/buildings.84b891d601335be42f55.jpg&quot;); min-height: 100vh; background-repeat: no-repeat; background-size: cover;">
                <div class="empty-div transformLogo showTransform" style="opacity: 1;">
                    <div class="ant-image" style="width: 50%;"><img src="<?=$PNH->site('logo'); ?>" class="ant-image-img" style="border-radius: 100%;"></div>
                </div>
                <div class="form" >
                    <div class="form-header"><span class="ant-typography title">Đăng ký tài khoản</span></div>
                    <form class="form-body" method="POST" action="">
                      <div id="thongbao"></div>
                      <input autocomplete="off" placeholder="Nhập số điện thoại" name="sdt" type="text" id="sdtdk" class="ant-input ant-input-lg input"> 
                    <input type="password" name="password" placeholder="Mật khẩu" id="passworddk" class="ant-input ant-input-lg input"> 
                    <input type="password" name="repassword" placeholder="Nhập lại mật khẩu" id="repassworddk" class="ant-input ant-input-lg input"> 
                    <button type="submit" name="registerbtn" class="ant-btn ant-btn-default ant-btn-lg login-btn2" ><span class="ant-typography" style="color: rgb(255, 255, 255);"><strong> Đăng ký</strong></span></button>
                        <div><br><span class="ant-typography" style="padding: 3px 0px; color: rgb(119, 119, 119); font-weight: 400;">Độ dài mật khẩu từ 6 - 20 ký tự</span><br>
                        <span class="ant-typography" style="padding: 3px 0px; color: rgb(119, 119, 119); font-weight: 500;">Ví dụ :</span><br><span class="ant-typography" style="padding: 3px 0px; color: rgb(119, 119, 119); font-weight: 400;">Mật khẩu : 123456</span></div>
                        <div class="form-footer"><a href="<?=BASE_URL('Auth'); ?>" class="ant-typography" style="font-size: 15px; color: rgb(51, 51, 51);">Đã có tài
                                khoản ? Đăng nhập ngay</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ant-message">
   <span>
      <div class="ant-message-notice">
         <div class="ant-message-notice-content" id="ant-message-notice-contentauth" style="display:none">
            <div class="ant-message-custom-content ant-message-error">
               <i aria-label="icon: close-circle" class="anticon anticon-close-circle">
                  <svg viewBox="64 64 896 896" data-icon="close-circle" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false" class="">
                     <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm165.4 618.2l-66-.3L512 563.4l-99.3 118.4-66.1.3c-4.4 0-8-3.5-8-8 0-1.9.7-3.7 1.9-5.2l130.1-155L340.5 359a8.32 8.32 0 0 1-1.9-5.2c0-4.4 3.6-8 8-8l66.1.3L512 464.6l99.3-118.4 66-.3c4.4 0 8 3.5 8 8 0 1.9-.7 3.7-1.9 5.2L553.5 514l130 155c1.2 1.5 1.9 3.3 1.9 5.2 0 4.4-3.6 8-8 8z"></path>
                  </svg>
               </i>
               <span>Số điện thoại đã tồn tại trên hệ thống</span>
            </div>
         </div>
      </div>
   </span>
</div>
<?php require_once("../../public/client/Footer.php"); ?>