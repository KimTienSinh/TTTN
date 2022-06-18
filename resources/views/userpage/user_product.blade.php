@extends('user_master')
@section('user_content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                    <a href="./shop.html">Shop</a>
                    <span>Detail</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad page-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">

            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-pic-zoom">
                            <img class="product-big-img" src="images/{{$product->image}}" alt="">
                            <div class="zoom-icon">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="product-thumbs">
                            <div class="product-thumbs-track ps-slider owl-carousel">
                                <div class="pt active" data-imgbigurl="user/img/product-single/product-1.jpg"><img
                                        src="user/img/product-single/product-1.jpg" alt=""></div>
                                <div class="pt" data-imgbigurl="user/img/product-single/product-2.jpg"><img
                                        src="user/img/product-single/product-2.jpg" alt=""></div>
                                <div class="pt" data-imgbigurl="user/img/product-single/product-3.jpg"><img
                                        src="user/img/product-single/product-3.jpg" alt=""></div>
                                <div class="pt" data-imgbigurl="user/img/product-single/product-3.jpg"><img
                                        src="user/img/product-single/product-3.jpg" alt=""></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details">
                            <div class="pd-title">
                                {{-- <span>oranges</span> --}}
                                <h3>{{$product->product_name}}</h3>
                                {{-- <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a> --}}
                            </div>
                            <div class="pd-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span>(5)</span>
                            </div>
                            <div class="pd-desc">
                                <p>{{$product->description}}</p>

                            </div>
                            <div class="pd-color">
                                <h6>Color</h6>
                                <div class="row">
                                    @foreach ($color_size_price as $color => $size_price)
                                    <div class="col-md-auto">
                                        <input type="radio" name="color" value="{{$color}}"
                                            @if($color==array_key_first($color_size_price)) checked @endif
                                            class="btn-check" id="{{$color}}" hidden>
                                        <label for="{{$color}}"
                                            class="btn btn-outline-secondary @if($color == array_key_first($color_size_price)) active @endif">{{$color}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="pd-color">
                                <h6>Size</h6>
                                <div class="row">
                                    @php
                                    $size_price = current($color_size_price);
                                    $default_price = array_key_first(current($size_price));
                                    @endphp
                                    @foreach ($size_price as $size => $price)
                                    <div class="col-md-auto">
                                        <input type="radio" name="size" id="{{$size}}-size" value="{{$size}}"
                                            @if($size==array_key_first($size_price)) checked @endif hidden>
                                        <label
                                            class="btn btn-outline-dark @if ($size == array_key_first($size_price)) active @endif"
                                            for="{{$size}}-size">{{$size}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="product-details">
                                <div class="pd-desc p-3 pl-5 d-flex">
                                    <div>
                                        <h4 id="price_detail">
                                            {{number_format(floatval($default_price))}}<span></span></h4>
                                    </div>
                                    <div>
                                        <h4>&ensp;$</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1" id="product_quantity">
                                </div>
                                <button id="add2cart" class="btn btn-outline-info" data-toggle="modal"
                                    data-target="#add2Carrt">Add To Cart</button>
                                <div class="modal fade" id="add2Carrt" tabindex="-1" role="dialog"
                                    aria-labelledby="add2Carrt" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-m-5 mx-auto"><i class="fa fa-check-circle-o"
                                                            aria-hidden="true"></i>
                                                        Add To Cart Success</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="pd-tags">
                                <li><span>CATEGORIES</span>: More Accessories, Wallets & Cases</li>
                                <li><span>TAGS</span>: Clothing, T-shirt, Woman</li>
                            </ul>
                            <div class="pd-share">
                                <div class="p-code">Sku : 00012</div>
                                <div class="pd-social">
                                    <a href="#"><i class="ti-facebook"></i></a>
                                    <a href="#"><i class="ti-twitter-alt"></i></a>
                                    <a href="#"><i class="ti-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-tab">
                    <div class="tab-item">
                        <ul class="nav" role="tablist">
                            <li>
                                <a data-toggle="tab" href="#tab-1" role="tab">Customer Reviews</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-item-content">
                        <div class="tab-content">
                            <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                <div class="customer-review-option">
                                    <h4>Comments</h4>
                                    <div class="comment-option">
                                        <div class="co-item">
                                            @foreach($data as $comment)
                                                <div class="avatar-pic">
                                                    <img src="user/img/product-single/avatar-1.png" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>{{$comment->user_name}} <span>27 Aug 2019</span></h5>
                                                    <div class="at-reply">{{$comment->comment}}</div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- <div class="co-item">
                                            <div class="avatar-pic">
                                                <img src="user/img/product-single/avatar-2.png" alt="">
                                            </div>
                                            <div class="avatar-text">
                                                <div class="at-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <h5>Roy Banks <span>27 Aug 2019</span></h5>
                                                <div class="at-reply">Nice !</div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="personal-rating">
                                        <h6>Your Ratind</h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                    <div class="leave-comment">
                                        <h4>Leave A Comment With Login</h4>
                                        <form action="{{Route('them-comment-user-page')}}" class="comment-form" method="POST">
                                            @csrf
                                            <div class="row">
                                                <!-- <div class="col-lg-6">
                                                    <input type="text" placeholder="Name">
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder="Email">
                                                </div> -->
                                                
                                                <input type="text" hidden name="id_user" value="@if(Auth::check()) {{Auth::user()->id_user}}  @endif">
                                                <input type="text" hidden name="id" value="{{$product->id_product}}">
                                                <div class="col-lg-12">
                                                    @if(Auth::check()) 
                                                    <textarea name="comment" placeholder="Messages"></textarea>
                                                    <button type="submit" readonly class="site-btn">Send message</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->

{{--
<!-- Related Products Section End -->
<div class="related-products spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Related Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="user/img/products/women-1.jpg" alt="">
                        <div class="sale">Sale</div>
                        <div class="icon">
                            <i class="icon_heart_alt"></i>
                        </div>
                        <ul>
                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                            <li class="quick-view"><a href="#">+ Quick View</a></li>
                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                        </ul>
                    </div>
                    <div class="pi-text">
                        <div class="catagory-name">Coat</div>
                        <a href="#">
                            <h5>Pure Pineapple</h5>
                        </a>
                        <div class="product-price">
                            $14.00
                            <span>$35.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="user/img/products/women-2.jpg" alt="">
                        <div class="icon">
                            <i class="icon_heart_alt"></i>
                        </div>
                        <ul>
                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                            <li class="quick-view"><a href="#">+ Quick View</a></li>
                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                        </ul>
                    </div>
                    <div class="pi-text">
                        <div class="catagory-name">Shoes</div>
                        <a href="#">
                            <h5>Guangzhou sweater</h5>
                        </a>
                        <div class="product-price">
                            $13.00
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="user/img/products/women-3.jpg" alt="">
                        <div class="icon">
                            <i class="icon_heart_alt"></i>
                        </div>
                        <ul>
                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                            <li class="quick-view"><a href="#">+ Quick View</a></li>
                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                        </ul>
                    </div>
                    <div class="pi-text">
                        <div class="catagory-name">Towel</div>
                        <a href="#">
                            <h5>Pure Pineapple</h5>
                        </a>
                        <div class="product-price">
                            $34.00
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <img src="user/img/products/women-4.jpg" alt="">
                        <div class="icon">
                            <i class="icon_heart_alt"></i>
                        </div>
                        <ul>
                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                            <li class="quick-view"><a href="#">+ Quick View</a></li>
                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                        </ul>
                    </div>
                    <div class="pi-text">
                        <div class="catagory-name">Towel</div>
                        <a href="#">
                            <h5>Converse Shoes</h5>
                        </a>
                        <div class="product-price">
                            $34.00
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Related Products Section End --> --}}
<script>
    $('[name="color"]').on('change',function(){
        $('.btn-outline-secondary').each(function(){
            $(this).removeClass('active');
        });
        $('label[for="'+$(this).prop('id')+'"]').addClass('active');
        color = ($(this).val());
        size = $('[name="size"]:checked').val();
        $.ajax({
            type: 'POST',
            url: '{{Request::url()}}',
            data: {"_token": "{{ csrf_token() }}",color,size},
            success: function(data){
                $("#price_detail").html(data);
            }
        })
    });

    $('[name="size"]').on('change',function(){
        $('.btn-outline-dark').each(function(){
            $(this).removeClass('active');
        });
        $('label[for="'+$(this).prop('id')+'"]').addClass('active');
        size = ($(this).val());
        color = $('[name="color"]:checked').val();
        $.ajax({
            type: 'POST',
            url: '{{Request::url()}}',
            data: {"_token": "{{ csrf_token() }}",color,size},
            success: function(data){
                $("#price_detail").html(data);
            }
        })
    });

    $('#add2cart').click(function(){
        quantity = $('#product_quantity').val();
        color = $('[name="color"]:checked').val();
        size = $('[name="size"]:checked').val();
        id_product = '{{$product->id_product}}';
        $.ajax({
            type: 'POST',   
            url: '{{route('them-gio-hang')}}',
            data: {"_token": "{{ csrf_token() }}",id_product,color,size,quantity},
            success: function(data){
                $("span#cartItem").html(data);
            }
        })
    });

</script>
@endsection