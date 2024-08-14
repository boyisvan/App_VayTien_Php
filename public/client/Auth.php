<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
$title = $PNH->site('tenweb');
if(!empty($_SESSION['username'])):
   header("Location: ".BASE_URL('Home'));
   die();
endif;
require_once("../../public/client/Header.php");
?>
   <div id="app" class="app">
      <div>
         <div>
            <div class="login-container" style="background-image: linear-gradient(rgba(255, 255, 255, 0.7) 0%, rgb(255, 255, 255) 100%), url(&quot;images/bgexb.jpg&quot;); min-height: 100vh; background-repeat: no-repeat; background-size: cover;">
               <div class="empty-div transformLogo showTransform" style="opacity: 1;">
                  <div class="logo">
                     <img src="images/logoeximbank.png">
                     <marquee>Ngân hàng thương mại cổ phần xuất nhập khẩu Việt Nam</marquee>
                  </div>
               </div>
               <div class="form">
                  <div class="form-header"><span class="ant-typography" style="color: #0f5f9a; font-size: 20px;"><strong>Đăng nhập hệ thống</strong></span></div>
                  <div class="form-body">
                     <div id="thongbao"></div>
                     <input placeholder="Nhập số điện thoại" type="text" id="sdt" class="form-control"> 
                     <input placeholder="Nhập mật khẩu" type="password" id="password" class="form-control"> 
                     <button type="button" class="login-btn1">Đăng nhập</button> 
                     <div class="form-footer"><a href="<?=BASE_URL('Signup'); ?>" class="ant-typography" style="font-size: 15px; color: #0f5f9a;margin-bottom: 70px;">Chưa có tài khoản ? Đăng ký ngay </a></div>
                  </div>

                  <div style="position: relative; padding-left: 20px; padding-right: 20px;">
                     <div id="carousel" class="owl-carousel owl-theme owl-loaded owl-drag" >
                           <div class="owl-item active bannerr" style="width: 350px;"><img src="images/banner01.webp"></div>
                           <div class="owl-item bannerr" style="width: 350px;"><img src="images/banner02.webp"></div>
                           <div class="owl-item bannerr" style="width: 350px;"><img src="images/banner03.webp"></div>
                           <div class="owl-item bannerr" style="width: 350px;"><img src="images/banner04.webp"></div>
                     </div> 
                  </div>
               </div>
                  
               </div>
            </div>
         </div>
      </div>
   </div>

<?php require_once("../../public/client/Footer.php"); ?>


<style>
   .app{
      height: 100vh;
   }
   #app{
      max-height: 100vh;
   }
   .login-btn1{
      background-color:#0f5f9a;
      border: none;
      padding: 7px 15px;
      width: 80%;
      color: white;
      border-radius: 7px;
      border:1px solid #0f5f9a ;
      transition: background-color 1s ease-out;
   }
   .login-btn1:hover{
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
      padding: 0;
      margin: 0;
      /* height: 200px; */
   }
   .logo img{
      margin-top: 50px;
      width: 100%;
   }
   .logo marquee{
      text-align: center;
      margin-top: 10px;
      color: #0f5f9a;
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