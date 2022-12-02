$(document).ready(function(){
    $(".num-order").change(function(){
        var id = $(this).attr('data-id');
        var qty = $(this).val();
        var data = {id:id, qty:qty};
        $.ajax({
            'url': '?mod=cart&action=updateajax',
            'method': 'POST',
            'data':data,
            'dataType':'json',
            success: function(data){
                $("#sub-total-"+id).text(data.sub_total);
                $("#total-price span").text(data.total);
            },
                error: function(xhr, ajaxOptions, thrownError){ //show lỗi ajax. VD:lỗi 404 là lỗi đường dẫn 
           alert(xhr.status);
           alert(thrownError);
       }
        });
    });
});

