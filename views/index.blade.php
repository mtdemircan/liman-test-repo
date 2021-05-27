<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px;">
    <li class="nav-item">
        <a class="nav-link active"  onclick="tab1()" href="#tab1" data-toggle="tab">Tab1</a>
    </li>
    <li class="nav-item">
        <a class="nav-link "  onclick="tab2()" href="#tab2" data-toggle="tab">Tab2</a>
    </li>
</ul>

<div class="tab-content">
    <div id="tab1" class="tab-pane active">
    </div>

    <div id="tab2" class="tab-pane">
    </div>
</div>

<script>

   if(location.hash === ""){
        tab1();
    }

    function tab1(){
        var form = new FormData();
        request("{{API('tab1')}}", form, function(response) {
            message = JSON.parse(response)["message"];
            $('#tab1').html(message);
        }, function(error) {
            $('#tab1').html("Hata oluştu");
        });
    }

    function tab2(){        
        var form = new FormData();
        request("{{API('tab2')}}", form, function(response) {
            $('#tab2').html(response).find('table').DataTable({
                bFilter: true,
                "language" : {
                    url : "/turkce.json"
                }
            });;
        }, function(error) {
            $('#tab2').html("Hata oluştu");
        });
    }
</script>