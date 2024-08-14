<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
$title = $PNH->site('tenweb');
if($getUser['stkbank'] == NULL){
   header("Location: /");
}
require_once("../../public/client/Header.php");
?>
<?php CheckLogin(); ?>
<div id="app">
   <div style="padding-bottom: 80px;">
      <div class="fadein">
         <div style="padding: 10px 15px; opacity: 1; transform: none;">
            <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 5px; border-bottom: 1px solid rgb(238, 238, 238);">
               <div style="padding: 0px;">
                  <span role="img" aria-label="left" class="anticon anticon-left" style="font-size: 25px; color: rgb(85, 85, 85);" id="backhistory">
                     <svg viewBox="64 64 896 896" focusable="false" data-icon="left" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                        <path d="M724 218.3V141c0-6.7-7.7-10.4-12.9-6.3L260.3 486.8a31.86 31.86 0 000 50.3l450.8 352.1c5.3 4.1 12.9.4 12.9-6.3v-77.3c0-4.9-2.3-9.6-6.1-12.6l-360-281 360-281.1c3.8-3 6.1-7.7 6.1-12.6z"></path>
                     </svg>
                  </span>
               </div>
               <span class="ant-typography" style="font-weight: 700; font-size: 20px;"><strong>Thông tin cá nhân</strong></span> 
               <div></div>
            </div>
            <div style="padding: 10px; display: flex; justify-content: center; align-items: center; flex-direction: column;">
               <span class="ant-avatar ant-avatar-circle ant-avatar-image" style="width: 100px; height: 100px; line-height: 100px; font-size: 18px;">
               <img src="<?=$getUser['image3']; ?>"></span> <span class="ant-typography" style="font-size: 17px; font-weight: 700;"><?=$_SESSION['username'];?></span> 
               <div role="separator" class="ant-divider ant-divider-horizontal ant-divider-with-text ant-divider-with-text-left">
                <span class="ant-divider-inner-text">Thông tin </span>
                </div>
               <div style="display: flex; justify-content: flex-start; align-items: center; flex-direction: column; width: 100%;">
                  <div style="width: 100%; display: flex; justify-content: flex-start; align-items: center; padding: 5px 0px;">
                  <span class="ant-typography" style="padding-right: 10px; font-size: 14px; font-weight: 500; flex: 2 1 0%;">Họ tên : </span><span class="ant-typography" style="flex: 2 1 0%; font-size: 16px; font-weight: 500;"><?=$getUser['fullname'];?></span></div>
                  <div style="width: 100%; display: flex; justify-content: flex-start; align-items: center; padding: 5px 0px;">
                  <span class="ant-typography" style="padding-right: 10px; font-size: 14px; font-weight: 500; flex: 2 1 0%;">Địa chỉ : </span><span class="ant-typography" style="flex: 2 1 0%; font-size: 16px; font-weight: 500;"><?=$getUser['address'];?></span></div>
                  <div style="width: 100%; display: flex; justify-content: flex-start; align-items: center; padding: 5px 0px;">
                  <span class="ant-typography" style="padding-right: 10px; font-size: 14px; font-weight: 500; flex: 2 1 0%;">Số CMND/CCCD : </span><span class="ant-typography" style="flex: 2 1 0%; font-size: 16px; font-weight: 500;color:#000"><?=$getUser['cmnd'];?> </span></div>
                  <div style="width: 100%; display: flex; justify-content: flex-start; align-items: center; padding: 5px 0px;">
                     <span class="ant-typography" style="padding-right: 10px; font-size: 14px; font-weight: 500; flex: 2 1 0%;">Giới tính : </span> <!----> 
                     <span class="ant-typography" style="flex: 2 1 0%; font-size: 16px; font-weight: 500;"><?=$getUser['gioitinh'];?></span> <!---->
                  </div>
                  <div style="width: 100%; display: flex; justify-content: flex-start; align-items: center; padding: 5px 0px;"><span class="ant-typography" style="padding-right: 10px; font-size: 14px; font-weight: 500; flex: 2 1 0%;">Ngày sinh : </span><span class="ant-typography" style="flex: 2 1 0%; font-size: 16px; font-weight: 500;"><?=$getUser['dob'];?></span></div>
                  <div style="width: 100%; display: flex; justify-content: flex-start; align-items: center; padding: 5px 0px;"><span class="ant-typography" style="padding-right: 10px; font-size: 14px; font-weight: 500; flex: 2 1 0%;">Nghề nghiệp : </span><span class="ant-typography" style="flex: 2 1 0%; font-size: 16px; font-weight: 500;"><?=$getUser['nghenghiep'];?></span></div>
                  <div style="width: 100%; display: flex; justify-content: flex-start; align-items: center; padding: 5px 0px;">
                     <span class="ant-typography" style="padding-right: 10px; font-size: 14px; font-weight: 500; flex: 2 1 0%;">Thu nhập : </span> <!----> <!----> <span class="ant-typography" style="flex: 2 1 0%; font-size: 16px; font-weight: 500;">Từ 10 - 20 triệu </span> <!---->
                  </div>
                  <div style="width: 100%; display: flex; justify-content: flex-start; align-items: center; padding: 5px 0px;"><span class="ant-typography" style="padding-right: 10px; font-size: 14px; font-weight: 500; flex: 2 1 0%;">Mục đích khoản vay : </span><span class="ant-typography" style="flex: 2 1 0%; font-size: 16px; font-weight: 500;"><?=$getUser['mucdichvay'];?></span></div>
               </div>
               <div style="width: 100%; display: flex; justify-content: flex-start; align-items: center; padding: 5px 0px;"><span class="ant-typography" style="padding-right: 10px; font-size: 14px; font-weight: 500; flex: 2 1 0%;">SĐT người thân : </span><span class="ant-typography" style="flex: 2 1 0%; font-size: 16px; font-weight: 500;color:#000"><?=$getUser['sdtngthan'];?></span></div>
               <div style="width: 100%; display: flex; justify-content: flex-start; align-items: center; padding: 5px 0px;"><span class="ant-typography" style="padding-right: 10px; font-size: 14px; font-weight: 500; flex: 2 1 0%;">Mối quan hệ với người thân : </span><span class="ant-typography" style="flex: 2 1 0%; font-size: 16px; font-weight: 500;"><?=$getUser['moiquanhengthan'];?></span></div>
               <div role="separator" class="ant-divider ant-divider-horizontal ant-divider-with-text ant-divider-with-text-left"><span class="ant-divider-inner-text">Tài khoản ngân hàng</span></div>
               <div style="width: 100%; display: flex; justify-content: flex-start; align-items: center; padding: 5px 0px;"><span class="ant-typography" style="padding-right: 10px; font-size: 14px; font-weight: 500; flex: 2 1 0%;">Tên ngân hàng : </span><span class="ant-typography" style="flex: 2 1 0%; font-size: 16px; font-weight: 500;"><?=$getUser['tennganhang'];?></span></div>
               <div style="width: 100%; display: flex; justify-content: flex-start; align-items: center; padding: 5px 0px;"><span class="ant-typography" style="padding-right: 10px; font-size: 14px; font-weight: 500; flex: 2 1 0%;">Số TK ngân hàng : </span><span class="ant-typography" style="flex: 2 1 0%; font-size: 16px; font-weight: 500;color:#000"><?=$getUser['stkbank'];?></span></div>
               <div style="width: 100%; display: flex; justify-content: flex-start; align-items: center; padding: 5px 0px;"><span class="ant-typography" style="padding-right: 10px; font-size: 14px; font-weight: 500; flex: 2 1 0%;">Tên thụ hưởng : </span><span class="ant-typography" style="flex: 2 1 0%; font-size: 16px; font-weight: 500;"><?=$getUser['tenchubank'];?></span></div>
            </div>
         </div>
      </div>
      <!---->
   </div>
</div>
<?php require_once("../../public/client/Footer.php"); ?>