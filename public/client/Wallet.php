<?php
require_once("../../config/config.php");
require_once("../../config/function.php");
$title = $PNH->site('tenweb');
require_once("../../public/client/Header.php");
?>
<?php CheckLogin(); ?>
<div id="app">
    <div style="padding-bottom: 80px;">
        <div class="fadein">
            <div style="opacity: 1; transform: none;">
                <div class="header-container">
                    <div></div> <span class="ant-typography" style="font-weight: 700; font-size: 18px; color: rgb(255, 255, 255);"><strong>Ví tiền</strong></span>
                    <div></div>
                </div>
                <div id="thongbao"></div>
                <div style="padding: 10px;">
                    <div style="padding: 5px; opacity: 1;">
                        <div style="display: flex; justify-content: center; align-items: center;">
                            <div style="border-radius: 5px; width: 100%; height: 200px; display: flex; justify-content: space-between; align-items: center; flex-direction: column; background-image: url(&quot;/assets/storage/images/card.d49cd7cf12be322a95cb.png&quot;); background-position: center center; background-repeat: no-repeat; background-size: cover;">
                                <div class="card-head-img">
                                    <div><span role="img" aria-label="wifi" class="anticon anticon-wifi" style="font-size: 26px; color: rgb(255, 255, 255); font-weight: bold; transform: rotate(90deg);"><svg viewBox="64 64 896 896" focusable="false" data-icon="wifi" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                                                <path d="M723 620.5C666.8 571.6 593.4 542 513 542s-153.8 29.6-210.1 78.6a8.1 8.1 0 00-.8 11.2l36 42.9c2.9 3.4 8 3.8 11.4.9C393.1 637.2 450.3 614 513 614s119.9 23.2 163.5 61.5c3.4 2.9 8.5 2.5 11.4-.9l36-42.9c2.8-3.3 2.4-8.3-.9-11.2zm117.4-140.1C751.7 406.5 637.6 362 513 362s-238.7 44.5-327.5 118.4a8.05 8.05 0 00-1 11.3l36 42.9c2.8 3.4 7.9 3.8 11.2 1C308 472.2 406.1 434 513 434s205 38.2 281.2 101.6c3.4 2.8 8.4 2.4 11.2-1l36-42.9c2.8-3.4 2.4-8.5-1-11.3zm116.7-139C835.7 241.8 680.3 182 511 182c-168.2 0-322.6 59-443.7 157.4a8 8 0 00-1.1 11.4l36 42.9c2.8 3.3 7.8 3.8 11.1 1.1C222 306.7 360.3 254 511 254c151.8 0 291 53.5 400 142.7 3.4 2.8 8.4 2.3 11.2-1.1l36-42.9c2.9-3.4 2.4-8.5-1.1-11.3zM448 778a64 64 0 10128 0 64 64 0 10-128 0z"></path>
                                            </svg></span></div>
                                </div>
                                <div style="padding: 10px; justify-content: flex-start; min-width: 100%;">
                                    <div class="atm-card-information">
                                        <?php if($getUser['stkbank'] == NULL){?>
                                            <span class="ant-typography atm-card-text">Chưa đăng ký</span>
                                        <?php }else{ ?>
                                        <span class="ant-typography atm-card-text" id="stk"><strong> <?=substr($getUser['stkbank'],0,3);?>••••••</strong></span>
                                        <span class="ant-typography atm-card-text" id="ten"><strong> <?=$getUser['tenchubank'];?></strong></span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="check-amount-container">
                            <div><span class="ant-typography" style="font-size: 15px; color: rgb(51, 51, 51); font-weight: 600;">Số dư ví :</span><br>
                                <div></div>
                            </div>
                            <div style="display: flex; flex-direction: column; align-items: flex-end;"><span class="ant-typography" style="font-size: 17px; color: rgb(206, 79, 83); font-weight: 700;"><?=number_format($getUser['total_money']);?> VND </span></div>
                        </div> <a href="<?=BASE_URL('notifications'); ?>" style="text-decoration: underline; margin: 5px;">Biến động số dư</a>
                    </div>
                    <div id="ruttienvetk">
                        <div class="item"><span class="ant-typography" style="flex: 1 1 0%; font-size: 16px; padding-left: 20px; color: rgb(255, 255, 255);"><strong>Rút tiền về tài khoản liên kết</strong></span> <span role="img" aria-label="vertical-align-bottom" class="anticon anticon-vertical-align-bottom" style="color: rgb(255, 255, 255); font-size: 30px;"><svg viewBox="64 64 896 896" focusable="false" data-icon="vertical-align-bottom" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                                    <path d="M859.9 780H164.1c-4.5 0-8.1 3.6-8.1 8v60c0 4.4 3.6 8 8.1 8h695.8c4.5 0 8.1-3.6 8.1-8v-60c0-4.4-3.6-8-8.1-8zM505.7 669a8 8 0 0012.6 0l112-141.7c4.1-5.2.4-12.9-6.3-12.9h-74.1V176c0-4.4-3.6-8-8-8h-60c-4.4 0-8 3.6-8 8v338.3H400c-6.7 0-10.4 7.7-6.3 12.9l112 141.8z"></path>
                                </svg></span></div>
                    </div>
                    <div class="ant-image"><img src="/assets/storage/images/wallet.911a2f9edd9a6151a551.jpg" class="ant-image-img" style="padding: 5px; border-radius: 10px;"></div>
                </div>
            </div>
            <div style="position: fixed; z-index: 1000; bottom: 0px; min-width: 100%;">
                <div style="display: flex; justify-content: space-between; align-items: center; min-height: 60px; padding: 0px 30px 10px; border-top: 1px solid rgb(238, 238, 238); background: rgb(255, 255, 255);">
                    <div style="min-height: 60px; border-radius: 25px;  display: flex; justify-content: center; align-items: center; flex-direction: column; transform: none;"><span role="img" aria-label="credit-card" class="anticon anticon-credit-card" style="font-size: 20px; color: rgb(0, 45, 191);"><svg viewBox="64 64 896 896" focusable="false" data-icon="credit-card" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                                <path d="M928 160H96c-17.7 0-32 14.3-32 32v640c0 17.7 14.3 32 32 32h832c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32zm-792 72h752v120H136V232zm752 560H136V440h752v352zm-237-64h165c4.4 0 8-3.6 8-8v-72c0-4.4-3.6-8-8-8H651c-4.4 0-8 3.6-8 8v72c0 4.4 3.6 8 8 8z"></path>
                            </svg></span> <span class="ant-typography" style="font-size: 12px; color: rgb(0, 45, 191);">Ví tiền</span></div>
                    <div style="min-height: 45px; display: flex; justify-content: center; align-items: center; flex-direction: column; background: rgb(255, 255, 255); transform: none;"><span role="img" aria-label="home" class="anticon anticon-home" style="font-size: 20px; color: rgb(102, 102, 102);"><svg viewBox="64 64 896 896" focusable="false" data-icon="home" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                                <path d="M946.5 505L560.1 118.8l-25.9-25.9a31.5 31.5 0 00-44.4 0L77.5 505a63.9 63.9 0 00-18.8 46c.4 35.2 29.7 63.3 64.9 63.3h42.5V940h691.8V614.3h43.4c17.1 0 33.2-6.7 45.3-18.8a63.6 63.6 0 0018.7-45.3c0-17-6.7-33.1-18.8-45.2zM568 868H456V664h112v204zm217.9-325.7V868H632V640c0-22.1-17.9-40-40-40H432c-22.1 0-40 17.9-40 40v228H238.1V542.3h-96l370-369.7 23.1 23.1L882 542.3h-96.1z"></path>
                            </svg></span> <span class="ant-typography" style="font-size: 12px; color: rgb(102, 102, 102);">Trang chủ</span></div>
                    <div style="min-height: 45px; display: flex; justify-content: center; align-items: center; flex-direction: column; background: rgb(255, 255, 255); transform: none;"><span role="img" aria-label="user" class="anticon anticon-user" style="font-size: 20px; color: rgb(102, 102, 102);"><svg viewBox="64 64 896 896" focusable="false" data-icon="user" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                                <path d="M858.5 763.6a374 374 0 00-80.6-119.5 375.63 375.63 0 00-119.5-80.6c-.4-.2-.8-.3-1.2-.5C719.5 518 760 444.7 760 362c0-137-111-248-248-248S264 225 264 362c0 82.7 40.5 156 102.8 201.1-.4.2-.8.3-1.2.5-44.8 18.9-85 46-119.5 80.6a375.63 375.63 0 00-80.6 119.5A371.7 371.7 0 00136 901.8a8 8 0 008 8.2h60c4.4 0 7.9-3.5 8-7.8 2-77.2 33-149.5 87.8-204.3 56.7-56.7 132-87.9 212.2-87.9s155.5 31.2 212.2 87.9C779 752.7 810 825 812 902.2c.1 4.4 3.6 7.8 8 7.8h60a8 8 0 008-8.2c-1-47.8-10.9-94.3-29.5-138.2zM512 534c-45.9 0-89.1-17.9-121.6-50.4S340 407.9 340 362c0-45.9 17.9-89.1 50.4-121.6S466.1 190 512 190s89.1 17.9 121.6 50.4S684 316.1 684 362c0 45.9-17.9 89.1-50.4 121.6S557.9 534 512 534z"></path>
                            </svg></span> <span class="ant-typography" style="font-size: 12px; color: rgb(102, 102, 102);">Hồ sơ</span></div>
                </div>
            </div>
            <!---->
            <!---->
        </div>
        <div style="position: fixed; z-index: 1000; bottom: 0px; min-width: 100%;">
            <div style="display: flex; justify-content: space-between; align-items: center; min-height: 60px; padding: 0px 30px 10px; border-top: 1px solid rgb(238, 238, 238); background: rgb(255, 255, 255);">
                <div id="anticon-wallet" style="min-height: 60px; border-radius: 25px;  display: flex; justify-content: center; align-items: center; flex-direction: column;"><span role="img" aria-label="credit-card" class="anticon anticon-credit-card" style="font-size: 20px; color: rgb(0, 45, 191);"><svg viewBox="64 64 896 896" focusable="false" data-icon="credit-card" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                            <path d="M928 160H96c-17.7 0-32 14.3-32 32v640c0 17.7 14.3 32 32 32h832c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32zm-792 72h752v120H136V232zm752 560H136V440h752v352zm-237-64h165c4.4 0 8-3.6 8-8v-72c0-4.4-3.6-8-8-8H651c-4.4 0-8 3.6-8 8v72c0 4.4 3.6 8 8 8z"></path>
                        </svg></span> <span class="ant-typography" style="font-size: 12px; color: rgb(0, 45, 191);">Ví tiền</span></div>
                <div id="anticon-home" style="min-height: 45px; display: flex; justify-content: center; align-items: center; flex-direction: column; background: rgb(255, 255, 255);"><span role="img" aria-label="home" class="anticon anticon-home" style="font-size: 20px; color: rgb(102, 102, 102);"><svg viewBox="64 64 896 896" focusable="false" data-icon="home" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                            <path d="M946.5 505L560.1 118.8l-25.9-25.9a31.5 31.5 0 00-44.4 0L77.5 505a63.9 63.9 0 00-18.8 46c.4 35.2 29.7 63.3 64.9 63.3h42.5V940h691.8V614.3h43.4c17.1 0 33.2-6.7 45.3-18.8a63.6 63.6 0 0018.7-45.3c0-17-6.7-33.1-18.8-45.2zM568 868H456V664h112v204zm217.9-325.7V868H632V640c0-22.1-17.9-40-40-40H432c-22.1 0-40 17.9-40 40v228H238.1V542.3h-96l370-369.7 23.1 23.1L882 542.3h-96.1z"></path>
                        </svg></span> <span class="ant-typography" style="font-size: 12px; color: rgb(102, 102, 102);">Trang chủ</span></div>
                <div id="anticon-user" style="min-height: 45px; display: flex; justify-content: center; align-items: center; flex-direction: column; background: rgb(255, 255, 255);"><span role="img" aria-label="user" class="anticon anticon-user" style="font-size: 20px; color: rgb(102, 102, 102);"><svg viewBox="64 64 896 896" focusable="false" data-icon="user" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                            <path d="M858.5 763.6a374 374 0 00-80.6-119.5 375.63 375.63 0 00-119.5-80.6c-.4-.2-.8-.3-1.2-.5C719.5 518 760 444.7 760 362c0-137-111-248-248-248S264 225 264 362c0 82.7 40.5 156 102.8 201.1-.4.2-.8.3-1.2.5-44.8 18.9-85 46-119.5 80.6a375.63 375.63 0 00-80.6 119.5A371.7 371.7 0 00136 901.8a8 8 0 008 8.2h60c4.4 0 7.9-3.5 8-7.8 2-77.2 33-149.5 87.8-204.3 56.7-56.7 132-87.9 212.2-87.9s155.5 31.2 212.2 87.9C779 752.7 810 825 812 902.2c.1 4.4 3.6 7.8 8 7.8h60a8 8 0 008-8.2c-1-47.8-10.9-94.3-29.5-138.2zM512 534c-45.9 0-89.1-17.9-121.6-50.4S340 407.9 340 362c0-45.9 17.9-89.1 50.4-121.6S466.1 190 512 190s89.1 17.9 121.6 50.4S684 316.1 684 362c0 45.9-17.9 89.1-50.4 121.6S557.9 534 512 534z"></path>
                        </svg></span> <span class="ant-typography" style="font-size: 12px; color: rgb(102, 102, 102);">Hồ sơ</span></div>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="ant-modal-root" on-ok="handleOk">
        <div class="ant-modal-mask" id="ant-modal-maskwallet" style="display: none;"></div>
        <div tabindex="-1" role="dialog" aria-labelledby="rcDialogTitle0" class="ant-modal-wrap " id="ant-modal-wrapwallet"style="display: none;">
            <div role="document" class="ant-modal" id="ant-modalwallet" style="width: 520px; display: none;">
                <div tabindex="0" aria-hidden="true" style="width: 0px; height: 0px; overflow: hidden;"></div>
                <div class="ant-modal-content"><button type="button" aria-label="Close" class="ant-modal-close" id="ant-modal-closewallet"><span class="ant-modal-close-x"><i aria-label="icon: close" class="anticon anticon-close ant-modal-close-icon"><svg viewBox="64 64 896 896" data-icon="close" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false" class="">
                                    <path d="M563.8 512l262.5-312.9c4.4-5.2.7-13.1-6.1-13.1h-79.8c-4.7 0-9.2 2.1-12.3 5.7L511.6 449.8 295.1 191.7c-3-3.6-7.5-5.7-12.3-5.7H203c-6.8 0-10.5 7.9-6.1 13.1L459.4 512 196.9 824.9A7.95 7.95 0 0 0 203 838h79.8c4.7 0 9.2-2.1 12.3-5.7l216.5-258.1 216.5 258.1c3 3.6 7.5 5.7 12.3 5.7h79.8c6.8 0 10.5-7.9 6.1-13.1L563.8 512z"></path>
                                </svg></i></span></button>
                    <div class="ant-modal-header">
                        <div id="rcDialogTitle0" class="ant-modal-title">Rút tiền</div>
                    </div>
                    <div class="ant-modal-body">
                        <div class="withdraw-money-container"><input type="text" id="sotienrut" inputmode="decimal" placeholder="Nhập số tiền rút" class="input-currency">
                            <div id="check-amount" style="display: flex; justify-content: center; align-items: center; width: 100%;">
                                <div class="check-amount"><span class="ant-typography" style="color: rgb(255, 255, 255); font-weight: 700; font-size: 16px;">Tiếp tục</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div tabindex="0" aria-hidden="true" style="width: 0px; height: 0px; overflow: hidden;"></div>
            </div>
        </div>
    </div>
</div>

<div>
   <div class="mg73 ant-modal-root mg73" on-ok="handleOk">
      <div class="ant-modal-mask" id="ant-modal-maskwallet2" style="display: none;"></div>
      <div tabindex="-1" role="dialog" class="ant-modal-wrap " id="ant-modal-wrapwallet2" style="display: none;">
         <div role="document" class="ant-modal" id="ant-modalwallet2" style="width: 520px; display: none;">
            <div tabindex="0" aria-hidden="true" style="width: 0px; height: 0px; overflow: hidden;"></div>
            <div class="ant-modal-content">
               <button type="button" aria-label="Close" class="ant-modal-close" id="ant-modal-closewallet2">
                  <span class="ant-modal-close-x">
                     <i aria-label="icon: close" class="anticon anticon-close ant-modal-close-icon">
                        <svg viewBox="64 64 896 896" data-icon="close" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false" class="">
                           <path d="M563.8 512l262.5-312.9c4.4-5.2.7-13.1-6.1-13.1h-79.8c-4.7 0-9.2 2.1-12.3 5.7L511.6 449.8 295.1 191.7c-3-3.6-7.5-5.7-12.3-5.7H203c-6.8 0-10.5 7.9-6.1 13.1L459.4 512 196.9 824.9A7.95 7.95 0 0 0 203 838h79.8c4.7 0 9.2-2.1 12.3-5.7l216.5-258.1 216.5 258.1c3 3.6 7.5 5.7 12.3 5.7h79.8c6.8 0 10.5-7.9 6.1-13.1L563.8 512z"></path>
                        </svg>
                     </i>
                  </span>
               </button>
               <div class="ant-modal-body">
                  <div class="verifying">
                     <div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                        <span role="img" aria-label="exclamation-circle" class="anticon anticon-exclamation-circle" style="font-size: 50px; color: rgb(235, 49, 74);">
                           <svg viewBox="64 64 896 896" focusable="false" data-icon="exclamation-circle" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                              <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z"></path>
                              <path d="M464 688a48 48 0 1096 0 48 48 0 10-96 0zm24-112h48c4.4 0 8-3.6 8-8V296c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v272c0 4.4 3.6 8 8 8z"></path>
                           </svg>
                        </span>
                        <!----> <br> <!----> <!----> <span class="ant-typography" id="alertthongbao"  style="color: rgb(235, 49, 74); font-size: 17px;">
                        <?=$getUser['lenhthongbao']; ?>
                        </span> <span class="ant-typography" style="color: rgb(119, 119, 119); font-size: 17px;">Liên hệ CSKH trực tuyến để được hỗ trợ</span><br> 
                        <div style="background: rgb(0, 45, 191); width: 100%; display: flex; justify-content: center; align-items: center; border-radius: 10px; padding: 5px;">
                          <span class="ant-typography"  style="font-size: 17px; color: rgb(255, 255, 255); font-weight: bold;"><a style="color:#fff" href="<?php
          $row2 = $PNH->get_row(" SELECT * FROM `danhsachcskh` WHERE `phone` = '".$_SESSION['username']."' ");
          if($row2)
          {
            $nvcskh = $row2['nhanviencskh'];
            $row3 = $PNH->get_row(" SELECT * FROM `cskh` WHERE `ten` = '".$nvcskh."' ");
            if($row3){
            	echo $cskhiphone = $row3['cskhiphone'];
            }
          }
                            ?>">Ấn vào đây để liên hệ CSKH</a></span>
                       </div>
                     </div>
                  </div>
               </div>
            </div>
            <div tabindex="0" aria-hidden="true" style="width: 0px; height: 0px; overflow: hidden;"></div>
         </div>
      </div>
   </div>
</div>
<?php require_once("../../public/client/Footer.php"); ?>