 <!-- baner -->
 <div class="video" data-aos="fade-down">
    <video id="video" src="video/video (2160p).mp4" autoplay muted loop></video>
    <div class="main_bn">
      <div class="main_bn-font">
        <div class="h2-font">
          <h2>wecome to du lịch DCR</h2>
        </div>
        <div class="h1-font">
          <h1>khám phá địa điểm yêu thích của bạn với chúng tôi</h1>
        </div>
        <div class="h3-font">
          <h3>liên hệ với chúng tôi nếu bạn muốn đi du lịch đến những địa điểm mới lạ</h3>
        </div>
      </div>
      <div class="form_find_bn" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
        <h2>tìm dịch vụ nhanh</h2>
        <form action="index.php?act=banersearch" method="POST" id="searchForm">
          <div class="form_in">
            <label for="date1">Ngày bắt đầu
              <input type="date" name="start" id="date1" />
            </label>
            <label for="date2">Ngày kết thúc
              <input type="date" name="end" id="date2" />
            </label>
            <label for="gia">Giá tiền
              <select name="" id="gia">
                <option>Chọn giá</option>
                <option value="">1 triệu -> 2 triệu</option>
                <option value="">5 triệu -> 7 triệu</option>
                <option value="">9 triệu -> 12 triệu</option>
              </select>
            </label>
            <label for="place">Nơi đến
              <input type="text" name="noiden" id="place" placeholder="Nơi đến" />
            </label>
          </div>
          <input type="submit" name="submit" id="result" value="Tìm" />
        </form>
        <!-- <script>
 $(document).ready(function() {
  $('#searchForm').submit(function(e) {
    e.preventDefault();
    
    var startDate = $('#date1').val();
    var endDate = $('#date2').val();
    
    // Chuyển hướng sang trang "index.php" và truyền tham số trên URL
    window.location.href = 'index.php?act=banersearch&startDate=' + startDate + '&endDate=' + endDate;
  });
});
</script> -->

        
      </div>
    </div>
  </div>