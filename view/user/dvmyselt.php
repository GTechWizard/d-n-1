 <!-- dich vu cua ban -->
 <div class=" dvs " id="dvs">
                <h2>dịch vụ đã đăng ký</h2>
                <div class="dv">
                    <ul class="uldvth">
                        <li>stt</li>
                        <li>tên dịch vụ</li>
                        <li>ảnh</li>
                        <li>ngày di chuyển</li>
                        <li>số người</li>
                        <li>Trạng thái</li>
                        <li>chi tiết</li>
                    </ul>
                    <ul class="uldvtd">
                        <li>($index+1)</li>
                        <li>$infor_dv['name']</li>
                        <li><img src="'.$infor_dv['img_dv'].'" /></li>
                        <li>$dich_vu['ngay_dkdv']</li>
                        <li>$infor_dv['tong_ng
                        <li>
                        <li>$dich_vu['trang_thai']</li>
                        <li><a href="?act=chitiettour&idsp='.$infor_dv['id_dv'].'">chi tiết</a></li>
                    </ul>

                </div>
            </div>