@extends('user_master')
@section('user_content')
@php $cart_list = session()->get('cart') @endphp
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                    <a href="./shop.html">Shop</a>
                    <span>Shopping Cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row" id="cart_list">

            @include('userpage.cart_item');

        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->
<script>
    $('input[name^="quantity"]').on('change',function(){
        var total = 0;
        var id_detail = $(this).prop('id');
        var price = $('.p-price.first-row#'+id_detail).html();
        var qty = $(this).val();
        
        html = $('#total'+id_detail).html(price*qty);
        $('.totalSingle').each(function(){
            total = total + parseFloat($(this).html());    
        })
        $('#cart_total').html(total);

        $.ajax({
            url: '{{url('updateCart')}}/'+id_detail,
            type:'POST',
            data: {"_token": "{{ csrf_token() }}",qty}
        });
    });
    


    function delFromCart(ID){
        $.ajax({
            url: '{{url('delFromCart')}}'+'/'+ID,
            type: 'POST',
            data: {"_token": "{{ csrf_token() }}"},
            success: function(data){
                $("span#cartItem").html(data.cartItem);
                $('#cart_list').html(data.html);
            }
        })
    }
</script>

@endsection