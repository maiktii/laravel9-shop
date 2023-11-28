$(document).ready(function(){
    //alert("test"); 
    $("#getPrice").change(function(){
        var size = $(this).val();
        var product_id = $(this).attr("product-id");
        // alert(size);
        // alert(product_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/get-product-price',
            data:{size:size,product_id:product_id},
            type:'post',
            success:function(resp){
                // alert(resp['discount']);
                if(resp['discount']>0){
                    $(".getAttributePrice").html("<div class='price'><h4>Rp "+resp['final_price']+"</h4></div><div class='original-price'><span>Original Price:</span><span>Rp "+resp['product_price']+"</span></div>");
                }
                else{
                    // alert("test");
                    $(".getAttributePrice").html("<div class='price'><h4>Rp "+resp['final_price']+"</h4></div>");
                }
            },
            error:function(){
                alert("Error");
            }
        });
    });

    //Update Cart items qty
    $(document).on("click",".updateCartItem",function(){
        // alert("test");
        if($(this).hasClass('plus-a')){
            var quantity = $(this).data('qty');
            // alert(quantity);
            new_qty = parseInt(quantity) + 1;
            // alert(new_qty);
        }
        if($(this).hasClass('minus-a')){
            var quantity = $(this).data('qty');
            // alert(quantity);
            if(quantity<=1){
                alert("Item quantity must be 1 or greater!");
                return false;
            }
            new_qty = parseInt(quantity) - 1;
            // alert(new_qty);
        }
        var cartid = $(this).data('cartid');
        // alert(cartId);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{cartid:cartid,qty:new_qty},
            url:'/cart/update',
            type:'post',
            success:function(resp){
                if(resp.status==false){
                    alert(resp.message);
                }
                $("#appendCartItems").html(resp.view);
            },
            error:function(){
                alert("Error");
            }
        });
    });

    //Delete Cart items
    $(document).on("click", ".deleteCartItem", function(){
        var cartid = $(this).data('cartid');
        var result = confirm("Are you sure to Delete this cart item?");
        if(result){
        // alert(cartid);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, 
                data:{cartid:cartid},
                url:'/cart/delete',
                type:'post',
                success:function(resp){
                    $("#appendCartItems").html(resp.view);
                },
                error:function(){
                    alert("Error");
                }
            });
        }

    });
    
});


function get_filter(class_name){
    var filter = [];
    $('.'+class_name+':checked').each(function(){
        filter.push($(this).val());
    });
    return filter;
}