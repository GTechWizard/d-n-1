<div class="in" style="display:inline ; margin-top: 20px;">
    <form method="POST">
        <div class="search_box" style="margin: auto;">
            <input type="search" name="search_name" id="search_name" placeholder="search_box" />
            <span class="fa fa-search"></span>
        </div>
    </form>
    <div id="output" class="overscoll"></div>
    
</div>

<script>
    $(document).ready(function() {
        var action = "search";
        $("#search_name").keyup(function() {
            var search_name = $("#search_name").val();
            if(search_name !='')
            {
            $.ajax({
                url: "/duan1/d-n-1/model/model_search.php",
                method: "POST",
                data: {action: action, search_name: search_name},
                success: function(data) {
                    $("#output").html(data);
                }
            });
        }else
        {
            $("#output").html('');
        }
        });
    });
</script>