$(document).ready(function () {
    $('.add_to_cart').click(function (e) {
        e.preventDefault();
       
        $.ajaxSetup({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

      
      
        var userid = $(this).attr('data-id');
      
        $.ajax({
            url: "/cart",
            type: "POST",
            data: {
                id: userid
            },
            success: function(data) {
                
                            leng= Object.keys(data.cart).length;
                          
                            alert(leng);
                            $("#cart-no").load(location.href + " #cart-no");
                            $("#logo-cart-no").load(location.href + " #logo-cart-no");
                            console.log(data);
                           
            }
        })

    });
});