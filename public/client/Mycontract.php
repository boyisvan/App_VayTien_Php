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
            <div style="padding: 10px 15px; opacity: 1; transform: none;">
                <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 5px; border-bottom: 1px solid rgb(238, 238, 238);">
                    <div style="padding: 0px;"><span role="img" aria-label="left" class="anticon anticon-left" style="font-size: 25px; color: rgb(85, 85, 85);" id="backhistory"><svg viewBox="64 64 896 896" focusable="false" data-icon="left" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                                <path d="M724 218.3V141c0-6.7-7.7-10.4-12.9-6.3L260.3 486.8a31.86 31.86 0 000 50.3l450.8 352.1c5.3 4.1 12.9.4 12.9-6.3v-77.3c0-4.9-2.3-9.6-6.1-12.6l-360-281 360-281.1c3.8-3 6.1-7.7 6.1-12.6z"></path>
                            </svg></span></div> <span class="ant-typography" style="font-weight: 700; font-size: 20px;"><strong>Khoản vay</strong></span>
                    <div></div>
                </div>
                <div style="padding: 10px; display: flex; justify-content: center; align-items: center; flex-direction: column;">
                    <?php if($row = $PNH->get_row(" SELECT * FROM `orders` WHERE `username` = '".$getUser['username']."' AND `trangthai` = 'Chấp nhận' "))
{ ?>
<div role="separator" class="ant-divider ant-divider-horizontal ant-divider-with-text ant-divider-with-text-center"><span class="ant-divider-inner-text"><span class="ant-typography" style="font-size: 16px;">Thông tin hợp đồng của bạn</span></span></div>
                    <div style="width: 100%; padding: 20px 10px 10px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;"><span class="ant-typography" style="font-size: 17px;">Mã hợp đồng :</span><span class="ant-typography" style="flex: 1 1 0%; margin-left: 20px; font-size: 17px; font-weight: 500;"><?=$row['code'];?></span></div>
                        <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;"><span class="ant-typography" style="font-size: 17px;">Số tiền vay :</span><span class="ant-typography" style="flex: 1 1 0%; margin-left: 20px; font-size: 17px; font-weight: 700;"><?=number_format($row['sotien']);?> VND</span></div>
                        <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;"><span class="ant-typography" style="font-size: 17px;">Hạn thanh toán :</span><span class="ant-typography" style="flex: 1 1 0%; margin-left: 20px; font-size: 17px; font-weight: 500;"><?=$row['thoigianvay'];?></span></div>
                        <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;"><span class="ant-typography" style="font-size: 17px;">Khởi tạo lúc :</span><span class="ant-typography" style="flex: 1 1 0%; margin-left: 20px; font-size: 17px; font-weight: 500;"><?php echo date('d-m-Y H:i:s',$row['time']);?></span></div> 
                      	<a class="ant-typography"><strong id="chitiettrano">Chi tiết trả nợ</strong></a> <br> <br>
                        <img id="getchuky" src="<?=$row['chuky'];?>" style="display:none">
                        <button id="btn-hopdong2" type="button" class="ant-btn ant-btn-round ant-btn-default" style="background: rgb(255, 115, 35); display: flex; justify-content: center; margin: 0px auto; align-items: center;"><span class="ant-typography" style="color: rgb(255, 255, 255);"><strong>Xem hợp đồng</strong></span></button>
                    </div>
<?php }else{ ?>
                    <div class="ant-empty">
                        <div class="ant-empty-image"><svg width="184" height="152" viewBox="0 0 184 152" xmlns="http://www.w3.org/2000/svg" class="ant-empty-img-default">
                                <g fill="none" fill-rule="evenodd">
                                    <g transform="translate(24 31.67)">
                                        <ellipse cx="67.797" cy="106.89" rx="67.797" ry="12.668" class="ant-empty-img-default-ellipse"></ellipse>
                                        <path d="M122.034 69.674L98.109 40.229c-1.148-1.386-2.826-2.225-4.593-2.225h-51.44c-1.766 0-3.444.839-4.592 2.225L13.56 69.674v15.383h108.475V69.674z" class="ant-empty-img-default-path-1"></path>
                                        <path d="M101.537 86.214L80.63 61.102c-1.001-1.207-2.507-1.867-4.048-1.867H31.724c-1.54 0-3.047.66-4.048 1.867L6.769 86.214v13.792h94.768V86.214z" transform="translate(13.56)" class="ant-empty-img-default-path-2"></path>
                                        <path d="M33.83 0h67.933a4 4 0 0 1 4 4v93.344a4 4 0 0 1-4 4H33.83a4 4 0 0 1-4-4V4a4 4 0 0 1 4-4z" class="ant-empty-img-default-path-3"></path>
                                        <path d="M42.678 9.953h50.237a2 2 0 0 1 2 2V36.91a2 2 0 0 1-2 2H42.678a2 2 0 0 1-2-2V11.953a2 2 0 0 1 2-2zM42.94 49.767h49.713a2.262 2.262 0 1 1 0 4.524H42.94a2.262 2.262 0 0 1 0-4.524zM42.94 61.53h49.713a2.262 2.262 0 1 1 0 4.525H42.94a2.262 2.262 0 0 1 0-4.525zM121.813 105.032c-.775 3.071-3.497 5.36-6.735 5.36H20.515c-3.238 0-5.96-2.29-6.734-5.36a7.309 7.309 0 0 1-.222-1.79V69.675h26.318c2.907 0 5.25 2.448 5.25 5.42v.04c0 2.971 2.37 5.37 5.277 5.37h34.785c2.907 0 5.277-2.421 5.277-5.393V75.1c0-2.972 2.343-5.426 5.25-5.426h26.318v33.569c0 .617-.077 1.216-.221 1.789z" class="ant-empty-img-default-path-4"></path>
                                    </g>
                                    <path d="M149.121 33.292l-6.83 2.65a1 1 0 0 1-1.317-1.23l1.937-6.207c-2.589-2.944-4.109-6.534-4.109-10.408C138.802 8.102 148.92 0 161.402 0 173.881 0 184 8.102 184 18.097c0 9.995-10.118 18.097-22.599 18.097-4.528 0-8.744-1.066-12.28-2.902z" class="ant-empty-img-default-path-5"></path>
                                    <g transform="translate(149.65 15.383)" class="ant-empty-img-default-g">
                                        <ellipse cx="20.654" cy="3.167" rx="2.849" ry="2.815"></ellipse>
                                        <path d="M5.698 5.63H0L2.898.704zM9.259.704h4.985V5.63H9.259z"></path>
                                    </g>
                                </g>
                            </svg></div>
                        <div class="ant-empty-description">Bạn chưa có khoản vay nào</div>
                    </div>
                    <div id="dangkyvay" style="background: rgb(0, 45, 191); width: 70%; display: flex; justify-content: center; align-items: center; border-radius: 10px; margin-top: 30px; padding: 5px;"><span class="ant-typography" style="color: rgb(255, 255, 255); font-weight: 700; font-size: 17px;">Đăng ký ngay</span></div>
<?php } ?>                
                </div>
            </div>
            <!---->
        </div>
        <!---->
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
                    <?php 
                     $hopdong = $PNH->site('hopdong'); 
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


<div>
   <div class="ant-modal-root" on-ok="handleOk">
      <div class="ant-modal-mask" id="ant-modal-maskvay" style="display:none"></div>
      <div tabindex="-1" role="dialog" class="ant-modal-wrap " id="ant-modal-wrapvay" style="display:none">
         <div role="document" class="ant-modal" style="width: 520px; transform-origin: 92px 508px;">
            <div tabindex="0" aria-hidden="true" style="width: 0px; height: 0px; overflow: hidden;"></div>
            <div class="ant-modal-content">
               <div class="ant-modal-body">
                  <div style="max-height: 350px; overflow-y: scroll;">
                     <table style="table-layout: auto;">
                        <colgroup></colgroup>
                        <thead class="ant-table-thead">
                           <tr>
                              <th class="ant-table-cell">Kỳ</th>
                              <th class="ant-table-cell">Số tiền</th>
                              <th class="ant-table-cell">Ngày đóng</th>
                           </tr>
                        </thead>
                        <tbody class="ant-table-tbody" id="chitietbangtrano">  
                            <?php 
                            $tien2 = $row['sotien'];
                            $ttthangvay = preg_replace('/[^0-9]/', '', $row['thoigianvay']);
                            $datevay = date('d',$row['time']);
                            $monthvay = date('m',$row['time']);
                            $giatri = '';
                            for ($i = 1; $i <= $ttthangvay; $i++){
                              $monthvay2 = $monthvay + $i;
                              if($monthvay2 > 48){
                                $monthvay2 = $monthvay2 - 48;
                              }else if($monthvay2 > 36){
                                $monthvay2 = $monthvay2 - 36;
                              }else if($monthvay2 > 24){
                                $monthvay2 = $monthvay2 - 24;
                              }else if($monthvay2 > 12){
                                $monthvay2 = $monthvay2 - 12;
                              }
                                if($i == 1){
                                  $tienht = number_format((int)(($tien2 / $ttthangvay) + ($tien2 * 12 / 100 / 12)));
                                  $giatri .= '<tr class="ant-table-row ant-table-row-level-0"><td class="ant-table-cell"><span class="ant-typography">Kì thứ '.$i.'</span></td><td class="ant-table-cell"><span class="ant-typography"><strong>'.$tienht.'</strong></span></td><td class="ant-table-cell"><span class="ant-typography"><strong>'.$datevay.' - '.$monthvay2.'</strong></span></td></tr>';
                                }
                                else{
                                  $tienht = number_format((int)(($tien2 / $ttthangvay) + (($tien2 - ($tien2 / $ttthangvay * ($i - 1)))* 12 / 100 / 12)));
                                  $giatri .= '<tr class="ant-table-row ant-table-row-level-0"><td class="ant-table-cell"><span class="ant-typography">Kì thứ '.$i.'</span></td><td class="ant-table-cell"><span class="ant-typography"><strong>'.$tienht.'</strong></span></td><td class="ant-table-cell"><span class="ant-typography"><strong>'.$datevay.' - '.$monthvay2.'</strong></span></td></tr>';
                                }
                            }
                            echo $giatri;
                            ?>                         
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="ant-modal-footer"><button type="button" id="btnokevay" ant-click-animating-without-extra-node="false" class="ant-btn ant-btn-primary"><span>OK</span></button></div>
            </div>
            <div tabindex="0" aria-hidden="true" style="width: 0px; height: 0px; overflow: hidden;"></div>
         </div>
      </div>
   </div>
</div>
<?php require_once("../../public/client/Footer.php"); ?>