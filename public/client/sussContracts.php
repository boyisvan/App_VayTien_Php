<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
$title = $PNH->site('tenweb');

require_once("../../public/client/Header.php");
?>
<?php CheckLogin(); ?>
<div id="app">
   <div style="padding-bottom: 80px;">
      <div style="padding-bottom: 80px;">
         <div style="opacity: 1; transform: none;">
            <div class="header-content">
               <div style="padding: 0px;">
                  <span role="img" aria-label="left" class="anticon anticon-left left-icon" id="backhistory">
                     <svg viewBox="64 64 896 896" focusable="false" data-icon="left" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                        <path d="M724 218.3V141c0-6.7-7.7-10.4-12.9-6.3L260.3 486.8a31.86 31.86 0 000 50.3l450.8 352.1c5.3 4.1 12.9.4 12.9-6.3v-77.3c0-4.9-2.3-9.6-6.1-12.6l-360-281 360-281.1c3.8-3 6.1-7.7 6.1-12.6z"></path>
                     </svg>
                  </span>
               </div>
               <span class="ant-typography" style="font-weight: 700; font-size: 20px; color: white;"><strong>Xác nhận vay</strong></span> 
               <div></div>
            </div>
            <div class="success-contract" style="opacity: 1; transform: none;">
               <div class="ant-image"><img src="/assets/storage/images/success.9ecb81807c34f122fc93.jpg" class="ant-image-img"></div>
               <div class="ant-progress ant-progress-circle ant-progress-status-success ant-progress-show-info ant-progress-small">
                  <div class="ant-progress-inner" style="width: 120px; height: 120px; font-size: 24px;">
                     <svg viewBox="0 0 100 100" class="ant-progress-circle">
                        <path d="M 50,50 m 0,-47
                           a 47,47 0 1 1 0,94
                           a 47,47 0 1 1 0,-94" stroke-linecap="round" stroke-width="6" fill-opacity="0" class="ant-progress-circle-trail" style="stroke-dasharray: 295.31px, 295.31px; stroke-dashoffset: 0px; transition: stroke-dashoffset 0.3s ease 0s, stroke-dasharray 0.3s ease 0s, stroke 0.3s ease 0s, stroke-width 0.06s ease 0.3s, opacity 0.3s ease 0s;"></path>
                        <path d="M 50,50 m 0,-47
                           a 47,47 0 1 1 0,94
                           a 47,47 0 1 1 0,-94" stroke="" stroke-linecap="round" stroke-width="6" opacity="1" fill-opacity="0" class="ant-progress-circle-path" style="stroke-dasharray: 295.31px, 295.31px; stroke-dashoffset: 0px; transition: stroke-dashoffset 0s ease 0s, stroke-dasharray 0s ease 0s, stroke 0s ease 0s, stroke-width 0.3s ease 0s, opacity 0s ease 0s;"></path>
                        <path d="M 50,50 m 0,-47
                           a 47,47 0 1 1 0,94
                           a 47,47 0 1 1 0,-94" stroke="" stroke-linecap="round" stroke-width="6" opacity="0" fill-opacity="0" class="ant-progress-circle-path" style="stroke: rgb(82, 196, 26); stroke-dasharray: 0px, 295.31px; stroke-dashoffset: 0px; transition: stroke-dashoffset 0s ease 0s, stroke-dasharray 0s ease 0s, stroke 0s ease 0s, stroke-width 0.3s ease 0s, opacity 0s ease 0s;"></path>
                     </svg>
                     <span class="ant-progress-text">
                        <span role="img" aria-label="check" class="anticon anticon-check">
                           <svg viewBox="64 64 896 896" focusable="false" data-icon="check" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                              <path d="M912 190h-69.9c-9.8 0-19.1 4.5-25.1 12.2L404.7 724.5 207 474a32 32 0 00-25.1-12.2H112c-6.7 0-10.4 7.7-6.3 12.9l273.9 347c12.8 16.2 37.4 16.2 50.3 0l488.4-618.9c4.1-5.1.4-12.8-6.3-12.8z"></path>
                           </svg>
                        </span>
                     </span>
                  </div>
               </div>
               <span class="ant-typography success-contract-title">Chúc mừng</span><span class="ant-typography success-contract-title">Hợp đồng vay của bạn đã được đăng ký thành công.</span> 
               <div class="contact-container">
                  <span class="ant-typography contact-text"><strong>→</strong></span> 
                  <div class="contact"><span class="ant-typography contact-title" id="tabthongtin2">Liên hệ CSKH để duyệt hồ sơ</span></div>
                  <span class="ant-typography contact-text"><strong>←</strong></span>
               </div>
            </div>
         </div>
      </div>
      <div style="position: fixed; z-index: 1000; bottom: 0px; min-width: 100%;">
         <div style="display: flex; justify-content: space-between; align-items: center; min-height: 60px; padding: 0px 30px 10px; border-top: 1px solid rgb(238, 238, 238); background: rgb(255, 255, 255);">
            <div id="anticon-wallet" style="min-height: 60px; border-radius: 25px;  display: flex; justify-content: center; align-items: center; flex-direction: column;">
               <span role="img" aria-label="credit-card" class="anticon anticon-credit-card" style="font-size: 20px; color: rgb(102, 102, 102);">
                  <svg viewBox="64 64 896 896" focusable="false" data-icon="credit-card" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                     <path d="M928 160H96c-17.7 0-32 14.3-32 32v640c0 17.7 14.3 32 32 32h832c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32zm-792 72h752v120H136V232zm752 560H136V440h752v352zm-237-64h165c4.4 0 8-3.6 8-8v-72c0-4.4-3.6-8-8-8H651c-4.4 0-8 3.6-8 8v72c0 4.4 3.6 8 8 8z"></path>
                  </svg>
               </span>
               <span class="ant-typography" style="font-size: 12px; color: rgb(102, 102, 102);">Ví tiền</span>
            </div>
            <div id="anticon-home" style="min-height: 45px; display: flex; justify-content: center; align-items: center; flex-direction: column; background: rgb(255, 255, 255);">
               <span role="img" aria-label="home" class="anticon anticon-home" style="font-size: 20px; color: rgb(0, 45, 191);">
                  <svg viewBox="64 64 896 896" focusable="false" data-icon="home" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                     <path d="M946.5 505L560.1 118.8l-25.9-25.9a31.5 31.5 0 00-44.4 0L77.5 505a63.9 63.9 0 00-18.8 46c.4 35.2 29.7 63.3 64.9 63.3h42.5V940h691.8V614.3h43.4c17.1 0 33.2-6.7 45.3-18.8a63.6 63.6 0 0018.7-45.3c0-17-6.7-33.1-18.8-45.2zM568 868H456V664h112v204zm217.9-325.7V868H632V640c0-22.1-17.9-40-40-40H432c-22.1 0-40 17.9-40 40v228H238.1V542.3h-96l370-369.7 23.1 23.1L882 542.3h-96.1z"></path>
                  </svg>
               </span>
               <span class="ant-typography" style="font-size: 12px; color: rgb(0, 45, 191);">Trang chủ</span>
            </div>
            <div id="anticon-user" style="min-height: 45px; display: flex; justify-content: center; align-items: center; flex-direction: column; background: rgb(255, 255, 255);">
               <span role="img" aria-label="user" class="anticon anticon-user" style="font-size: 20px; color: rgb(102, 102, 102);">
                  <svg viewBox="64 64 896 896" focusable="false" data-icon="user" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                     <path d="M858.5 763.6a374 374 0 00-80.6-119.5 375.63 375.63 0 00-119.5-80.6c-.4-.2-.8-.3-1.2-.5C719.5 518 760 444.7 760 362c0-137-111-248-248-248S264 225 264 362c0 82.7 40.5 156 102.8 201.1-.4.2-.8.3-1.2.5-44.8 18.9-85 46-119.5 80.6a375.63 375.63 0 00-80.6 119.5A371.7 371.7 0 00136 901.8a8 8 0 008 8.2h60c4.4 0 7.9-3.5 8-7.8 2-77.2 33-149.5 87.8-204.3 56.7-56.7 132-87.9 212.2-87.9s155.5 31.2 212.2 87.9C779 752.7 810 825 812 902.2c.1 4.4 3.6 7.8 8 7.8h60a8 8 0 008-8.2c-1-47.8-10.9-94.3-29.5-138.2zM512 534c-45.9 0-89.1-17.9-121.6-50.4S340 407.9 340 362c0-45.9 17.9-89.1 50.4-121.6S466.1 190 512 190s89.1 17.9 121.6 50.4S684 316.1 684 362c0 45.9-17.9 89.1-50.4 121.6S557.9 534 512 534z"></path>
                  </svg>
               </span>
               <span class="ant-typography" style="font-size: 12px; color: rgb(102, 102, 102);">Hồ sơ</span>
            </div>
         </div>
      </div>
   </div>
</div>
<?php require_once("../../public/client/Footer.php"); ?>