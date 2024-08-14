<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
$title = $PNH->site('tenweb');
if($PNH->get_row(" SELECT * FROM `orders` WHERE `username` = '".$getUser['username']."' AND `trangthai` = 'Đang chờ duyệt' "))
{
   header("Location: /");
}
if($PNH->get_row(" SELECT * FROM `orders` WHERE `username` = '".$getUser['username']."' AND `trangthai` = 'Chấp nhận' "))
{
   header("Location: /");
}
if($PNH->get_row(" SELECT * FROM `users` WHERE `username` = '".$getUser['username']."' AND `stkbank` IS NULL "))
{
   header("Location: /verify");
}

$row = $PNH->get_row(" SELECT * FROM `orders` WHERE `username` = '".$getUser['username']."' ORDER BY ID DESC ");    
require_once("../../public/client/Header.php");
?>
<?php CheckLogin(); ?>
<div id="app">
   <div id="thongbao"></div>
   <div style="padding-bottom: 80px;">
      <div class="fadein">
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
            <div class="checking-container" style="padding-bottom: 120px;">
               <span class="ant-typography" style="font-size: 15px; text-align: center;"><strong>Xác nhận khoản vay</strong></span><br><br>
               <span class="ant-typography" style="font-size: 17px;">Khoản tiền vay : <span class="ant-typography" id="tienvay"><strong><?php if(empty($row['sotien'])): echo '20,000,000'; else: echo number_format($row['sotien']); endif; ?></strong></span> VND</span>
               <span class="ant-typography" style="font-size: 17px;">Thời hạn thanh toán : <span class="ant-typography" id="thoigianvay"><strong><?php if(empty($row['thoigianvay'])): echo '6 tháng'; else: echo $row['thoigianvay']; endif; ?></strong></span></span> <button type="button" class="ant-btn ant-btn-round ant-btn-default" id="btn-hopdong" style="background: rgb(255, 115, 35); margin: 10px;"><span class="ant-typography" style="color: rgb(255, 255, 255);"><strong>Xem hợp đồng</strong></span></button> <br> 
               <div>
                  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                     <span class="ant-typography" style="font-size: 12px;">Kí vào khung bên dưới </span> 
                     <button type="button" id="btnxacnhanck" class="ant-btn ant-btn-default" style="background: rgb(0, 105, 151);"><span class="ant-typography" style="color: rgb(255, 255, 255);">Xác nhận chữ ký</span>
                     </button>
                  </div>
                  <div class="signing" style="width: 100%; height: 200px;">
                     <canvas id="canvas" class="canvas"  height="200px"></canvas>
                  </div> 
                  <input type="text" id="code" value="<?php if(empty($row['sotien'])): echo ''; else: echo $row['code']; endif; ?>" style="display:none">
                  <div class="refresh" id="button1"><span class="ant-typography" style="text-decoration: underline;">Làm mới </span></div>
               </div>
            </div>
         </div>
         <!---->
      </div>
      <div style="position: fixed; z-index: 1000; bottom: 0px; min-width: 100%;">
         <div style="display: flex; justify-content: space-between; align-items: center; min-height: 60px; padding: 0px 30px 10px; border-top: 1px solid rgb(238, 238, 238); background: rgb(255, 255, 255);">
            <div id="anticon-wallet" style="min-height: 60px; border-radius: 25px; display: flex; justify-content: center; align-items: center; flex-direction: column;">
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



<div>
   <div class="ant-modal-root" on-ok="handleOk">
      <div class="ant-modal-mask" id="ant-modal-mask" style="display:none"></div>
      <div tabindex="-1" role="dialog" class="ant-modal-wrap " id="ant-modal-wrap" style="display:none">
         <div role="document" class="ant-modal" style="width: 520px; transform-origin: 174px 123px;">
            <div tabindex="0" aria-hidden="true" style="width: 0px; height: 0px; overflow: hidden;"></div>
            <div class="ant-modal-content">
               <button type="button" aria-label="Close" class="ant-modal-close" id="ant-modal-close">
                  <span class="ant-modal-close-x">
                     <i aria-label="icon: close" class="anticon anticon-close ant-modal-close-icon">
                        <svg viewBox="64 64 896 896" data-icon="close" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false" class="">
                           <path d="M563.8 512l262.5-312.9c4.4-5.2.7-13.1-6.1-13.1h-79.8c-4.7 0-9.2 2.1-12.3 5.7L511.6 449.8 295.1 191.7c-3-3.6-7.5-5.7-12.3-5.7H203c-6.8 0-10.5 7.9-6.1 13.1L459.4 512 196.9 824.9A7.95 7.95 0 0 0 203 838h79.8c4.7 0 9.2-2.1 12.3-5.7l216.5-258.1 216.5 258.1c3 3.6 7.5 5.7 12.3 5.7h79.8c6.8 0 10.5-7.9 6.1-13.1L563.8 512z"></path>
                        </svg>
                     </i>
                  </span>
               </button>
               <div class="ant-modal-body">
                  <div>
                    <?php $hopdong = $PNH->site('hopdong'); 
                     $replace = '<span id="nameSetting" style="color:red">'.$getUser['fullname'].'</span>'; 
                     $cmnd = '<span id="cccdSetting" style="color:red">'.$getUser['cmnd'].'</span>';
                     if(empty($row['sotien'])): $moneytien ='<span id="moneySetting" style="color:red">20,000,000</span>'; else: $moneytien = '<span id="moneySetting" style="color:red">'.number_format($row['sotien']).'</span>'; endif;
                     if(empty($row['thoigianvay'])): $thangvay='<span id="monthSetting" style="color:red">6 tháng</span>'; else: $thangvay= '<span id="monthSetting" style="color:red">'.$row['thoigianvay'].'</span>'; endif;
                     $result = str_replace('$fullname', $replace, $hopdong);
                     $result2 = str_replace('$cmnd', $cmnd, $result);
                     $result3 = str_replace('$money', $moneytien, $result2);
                     echo $result4 = str_replace('$thang', $thangvay, $result3);
                     
                     ?>
                     
                  </div>
               </div>
               <div class="ant-modal-footer" id="ant-modal-close2"><button type="button"  ant-click-animating-without-extra-node="false" class="ant-btn ant-btn-primary"><span>OK</span></button></div>
            </div>
            <div tabindex="0" aria-hidden="true" style="width: 0px; height: 0px; overflow: hidden;"></div>
         </div>
      </div>
   </div>
</div>
<?php require_once("../../public/client/Footer.php"); ?>