<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
$title = $PNH->site('tenweb');
require_once("../../public/client/Header.php");


  
?>
<div id="app">
   <div class="dangkiform">
      <div style="padding-bottom: 80px;">
         <div class="login-container" style="background-image: linear-gradient(rgba(255, 255, 255, 0.7) 0%, rgb(255, 255, 255) 100%), url(&quot;/assets/storage/images/buildings.84b891d601335be42f55.jpg&quot;); min-height: 100vh; background-repeat: no-repeat; background-size: cover;">
            <div class="logo">
                  <img src="images/logoeximbank.png">
                  <marquee>Ngân hàng thương mại cổ phần xuất nhập khẩu Việt Nam</marquee>
            </div>
            <div class="form" >
               <div id="thongbao"></div>
               <div class="form-header"><span style="color: #0f5f9a;font-size: 21px;font-weight: bold;">Đăng ký tài khoản</span></div>
               <form class="form-body" method="POST" action="">
                  <input autocomplete="off" placeholder="Nhập số điện thoại" name="sdt" type="text" id="sdtdk" class="form-control"> 
                  <input autocomplete="off" type="password" name="password" placeholder="Mật khẩu" id="passworddk" class="form-control"> 
                  <input autocomplete="off" type="password" name="repassword" placeholder="Nhập lại mật khẩu" id="repassworddk" class="form-control"> 
                  <button type="button" id="register-btn" class="login-btn3" ><span class="ant-typography" style="color: rgb(255, 255, 255);"><strong> Đăng ký</strong></span></button>
                  <div><br><span class="ant-typography" style="padding: 3px 0px; color:  #0f5f9a; font-weight: 400;">Độ dài mật khẩu từ 6 - 20 ký tự</span><br>
                  <span class="ant-typography" style="padding: 3px 0px; color:  #0f5f9a; font-weight: 500;">Ví dụ :</span><br><span class="ant-typography" style="padding: 3px 0px; color:  #0f5f9a; font-weight: 400;">Mật khẩu : 123456</span></div>
                  <div class="form-footer"><a href="<?=BASE_URL('Auth'); ?>" class="ant-typography" style="font-size: 15px; color: #0f5f9a">Đã có tài khoản ? Đăng nhập ngay</a></div>
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



<style>
   .app{
      height: 100vh;
   }
   #app{
      max-height: 100vh;
   }
   .login-btn3{
      background-color:#0f5f9a;
      border: none;
      padding: 7px 15px;
      width: 80%;
      color: white;
      border-radius: 7px;
      border:1px solid #0f5f9a ;
      transition: background-color 1s ease-out;
   }
   .login-btn3:hover{
      background-color: white;
      border:1px solid #0f5f9a ;
      color: #0f5f9a;
   }
   .form-body input{
      width: 80%;
      margin:10px 0px;
      font-size: 15px;
   }
   #carousel .bannerr img{
      min-height: 200px;
      border-radius: 10px;
      padding-left: 5px;
   }
   .logo{
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
   }
   .logo img{
      width: 50%;
      margin-top: 70px;
      filter: drop-shadow(1px 3px 4px #89a1e7 );
   }
   .logo marquee{
      text-align: center;
      margin-top: 10px;
      color: #0f5f9a;
      text-shadow: 0px 0px 9px #89a1e7;
   }
   @media (max-width:768px) {
      .logo{
         width: 100%;
      }
      .logo img{
         width: 100%;
      }
   }
</style>