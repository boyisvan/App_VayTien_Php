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
         <div class="container" style="padding: 0px !important;">
            <div class="head"></div>
            <div class="vay-header" style="background: rgb(0, 105, 151);">
               <div>
                  <span role="img" aria-label="left" class="anticon anticon-left arrow-icon" style="color: rgb(255, 255, 255);" id="backhistory">
                     <svg viewBox="64 64 896 896" focusable="false" data-icon="left" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                        <path d="M724 218.3V141c0-6.7-7.7-10.4-12.9-6.3L260.3 486.8a31.86 31.86 0 000 50.3l450.8 352.1c5.3 4.1 12.9.4 12.9-6.3v-77.3c0-4.9-2.3-9.6-6.1-12.6l-360-281 360-281.1c3.8-3 6.1-7.7 6.1-12.6z"></path>
                     </svg>
                  </span>
               </div>
               <span class="ant-typography header-text" style="color: rgb(255, 255, 255);">Chọn khoản vay</span>
               <div></div>
            </div>
            <div class="vay-body">
               <div class="title-container"><span class="ant-typography title" style="color: rgb(255, 255, 255);">Số tiền vay</span></div>
               <div class="input-container">
                  <div class="ant-input-number" inputmode="decimal" style="min-width: 100%;">
                     <div class="ant-input-number-handler-wrap">
                        <span class="ant-input-number-handler ant-input-number-handler-up " unselectable="unselectable" role="button" aria-label="Increase Value">
                           <i aria-label="icon: up" class="anticon anticon-up ant-input-number-handler-up-inner">
                              <svg viewBox="64 64 896 896" data-icon="up" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false" class="">
                                 <path d="M890.5 755.3L537.9 269.2c-12.8-17.6-39-17.6-51.7 0L133.5 755.3A8 8 0 0 0 140 768h75c5.1 0 9.9-2.5 12.9-6.6L512 369.8l284.1 391.6c3 4.1 7.8 6.6 12.9 6.6h75c6.5 0 10.3-7.4 6.5-12.7z"></path>
                              </svg>
                           </i>
                        </span>
                        <span class="ant-input-number-handler ant-input-number-handler-down " unselectable="unselectable" role="button" aria-label="Decrease Value">
                           <i aria-label="icon: down" class="anticon anticon-down ant-input-number-handler-down-inner">
                              <svg viewBox="64 64 896 896" data-icon="down" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false" class="">
                                 <path d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z"></path>
                              </svg>
                           </i>
                        </span>
                     </div>
                     <div class="ant-input-number-input-wrap"><input id="sotiendinhvay" role="spinbutton" aria-valuemin="0" aria-valuemax="500000000" aria-valuenow="" placeholder="Nhập số tiền cần vay" autocomplete="off" max="500000000" min="0" step="1" class="ant-input-number-input"></div>
                  </div>
               </div>
               <div class="subtitle"><span class="ant-typography">Từ 30,000,000đ</span><span class="ant-typography">Đến 500,000,000đ</span></div>
               <div class="month-container" style="padding: 10px;">
                  <span class="ant-typography">Chọn thời hạn vay</span>
                  <div tabindex="0" class="ant-select ant-select-enabled" style="border-radius: 100px; min-width: 150px;">
                     <div role="combobox" id="thangvay" aria-autocomplete="list" aria-haspopup="true"  class="ant-select-selection ant-select-selection--single">
                        <div class="ant-select-selection__rendered"></div>
                        <span unselectable="on" class="ant-select-arrow" style="user-select: none;">
                           <i aria-label="icon: down" class="anticon anticon-down ant-select-arrow-icon">
                              <svg viewBox="64 64 896 896" data-icon="down" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false" class="">
                                 <path d="M884 256h-75c-5.1 0-9.9 2.5-12.9 6.6L512 654.2 227.9 262.6c-3-4.1-7.8-6.6-12.9-6.6h-75c-6.5 0-10.3 7.4-6.5 12.7l352.6 486.1c12.8 17.6 39 17.6 51.7 0l352.6-486.1c3.9-5.3.1-12.7-6.4-12.7z"></path>
                              </svg>
                           </i>
                        </span>
                     </div>
<div style="position: absolute; top: 0px; left: 0px; width: 100%;" >
      <div class="ant-select-dropdown ant-select-dropdown--single ant-select-dropdown-placement-bottomLeft" id="rethangvay" style="width: 150px; left: 0; top: 32px; display: none;">
         <div id="705baf8c-873f-4877-8c8b-c2664eb1cb08" tabindex="-1" class="ant-select-dropdown-content" style="overflow: auto; transform: translateZ(0px);">
            <ul role="listbox" tabindex="0" class="ant-select-dropdown-menu ant-select-dropdown-menu-vertical ant-select-dropdown-menu-root">
               <li role="option" class="ant-select-dropdown-menu-item ant-select-dropdown-menu-item-active" unselectable="on" style="user-select: none;">
                  6 tháng
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  12 tháng
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  24 tháng
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  36 tháng
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  48 tháng
               </li>
               <li role="option" class="ant-select-dropdown-menu-item" unselectable="on" style="user-select: none;">
                  60 tháng
               </li>
            </ul>
         </div>
      </div>
</div>                     
                  </div>
               </div>
            </div>
            <div class="form-container">
               <div class="information-form">
                  <span class="ant-typography form-title" style="color: rgb(255, 255, 255); font-weight: bold;">Thông tin khoản vay</span>
                  <div class="information">
                     <div class="details-information"><span class="ant-typography">Số tiền</span><span class="ant-typography" id="tttienvay"> đ</span></div>
                     <div class="details-information"><span class="ant-typography">Thời hạn vay</span><span class="ant-typography" id="ttthangvay"> tháng</span></div>
                     <div class="details-information"><span class="ant-typography">Ngày vay</span><span class="ant-typography" id="ngayvay"><?php echo date('d/m/Y'); ?></span></div>
                     <div class="details-information"><span class="ant-typography">Hình thức thanh toán</span><span class="ant-typography">Trả góp mỗi tháng</span></div>
                  </div>
               </div>
            </div>
            <div>
               <div class="old-debt-text"><span class="ant-typography" style="flex: 2 1 0%; color: rgb(102, 102, 102); font-size: 14px;">Trả nợ kì đầu</span><span class="ant-typography" id="tranokidau" style="flex: 2 1 0%; color: rgb(62, 62, 62); font-size: 16px;">0 VND</span></div>
               <div class="old-debt-text"><span class="ant-typography" style="flex: 2 1 0%; color: rgb(102, 102, 102); font-size: 14px;">Lãi suất hàng tháng</span><span class="ant-typography" style="flex: 2 1 0%; color: rgb(62, 62, 62); font-size: 16px;">1%</span></div>
               <div class="old-debt-text" id="chitiettrano"><a class="ant-typography">Chi tiết trả nợ</a></div>
            </div>
            <div class="btn-container"><button type="button" id="btnxacnhanvay" class="ant-btn ant-btn-default confirm-btn"><span class="ant-typography btn-title">Xác nhận khoản vay</span></button></div>
         </div>
         <!---->
      </div>
      <!---->
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