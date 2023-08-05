 <!-- dich vụ đã thích -->
 <div class="dvl " id="dvl">
                <h2>dịch vụ đã thích</h2>
                <div class="dv">
                    <ul class="uldvth">
                        <li>stt</li>
                        <li>tên dịch vụ</li>
                        <li>ảnh</li>
                        <li>số người</li>
                        <li>chi tiết</li>
                    </ul>
                <?php
                $dv= new dv;
                $listlike= $dv->getlikeuser($_SESSION['id']);
                $y=0;
                if(isset($listlike)&& $listlike){
                    foreach($listlike as $index=>$result){
                        $y++;
                ?>
                <ul class="uldvtd">
                        <li>  <?= $y ?></li>
                        <li>  <?= $result['name'] ?></li>
                        <li><img src=" <?= $result['img_dv'] ?>" alt="img" /></li>
                        <li>  <?= $result['tong_ng'] ?></li>
                        <li><a href="?act=chitiettour&idsp=  <?= $result['id_dv'] ?>">chi tiết</a></li>
                    </ul>
                <?php
                }}
                ?>
            </div>