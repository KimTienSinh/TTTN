@extends('user_master')
@section('user_content')
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <ul class="filter-catagories">
                            @foreach ($categories as $category)
                                <li><a
                                        href="{{ route('shop-category', $category->category_name) }}">{{ $category->category_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Manufacturer</h4>
                        <div class="fw-brand-check">
                            @foreach ($manufacturers as $manufacturer)
                                <div class="bc-item">
                                    <label for="bc-calvin">
                                        <a href="{{ route('shop-manufacturer', $manufacturer->manufacturer) }}">
                                            {{ $manufacturer->manufacturer }}
                                        </a>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="filter-widget">
                        <a href="#" class="filter-btn">Filter</a>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Tags</h4>
                        <div class="fw-tags">
                            <a href="#">Towel</a>
                            <a href="#">Shoes</a>
                            <a href="#">Coat</a>
                            <a href="#">Dresses</a>
                            <a href="#">Trousers</a>
                            <a href="#">Men's hats</a>
                            <a href="#">Backpack</a>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            {{-- <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Default Sorting</option>
                                    </select>
                                    <select class="p-show">
                                        <option value="">Show:</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
                                <p>Show 01- 09 Of 36 Product</p>
                            </div> --}}
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">
                            @foreach ($list_product as $prd)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic border border-dark">
                                            @if (!$prd->image_product->isEmpty())
                                                @foreach ($prd->image_product as $image_product => $image)
                                                    <span class="class="border">
                                                        <img src="images/{{ $image->image }}" height="300" width="300"
                                                            alt="product" style="object-fit: cover">
                                                    </span>
                                                @break
                                            @endforeach
                                        @else
                                            <img src="images/clothes-default.png" height="300" width="300"
                                                alt="product" style="object-fit: cover">
                                        @endif
                                        {{-- <div class="sale pp-sale">Sale</div> --}}
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="quick-view"><a href="{{ url('product', $prd->id_product) }}">+
                                                    Quick View</a>
                                            </li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        {{-- <div class="catagory-name">Towel</div> --}}
                                        <a href="#">
                                            <h5>{{ $prd->product_name }}</h5>
                                        </a>
                                        <div class="product-price">
                                            {{-- $10.00 --}}
                                            {{-- <span>$35.00</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- <div class="loading-more">
                    <i class="icon_loading"></i>
                    <a href="#">
                        Loading More
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->
@endsection
