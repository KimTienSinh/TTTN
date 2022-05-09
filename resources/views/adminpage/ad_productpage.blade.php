@extends('ad_master')
@section('ad_content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <a href="{{url('ad_ProductEditPage')}}"><button type="button" class="btn btn-outline-primary">
                            <i class="fa fa-plus-square-o"></i>&nbsp; New Product</button></a>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Menu</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Product</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Product Infomation</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle table-responsive-sm basic-form">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">IMAGE</th>
                                        <th scope="col">PRODUCT NAME</th>
                                        <th scope="col">DESCRIPTION</th>
                                        <th scope="col">STATUS</th>
                                        <th scope="col">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product_list as $product)
                                    <tr>
                                        <th>{{$product->id_product}}</th>
                                        <td>{{$product->image}}</td>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>{{$product->status}}</td>
                                        <td>
                                            <span class="form-inline">
                                                <form action="{{url('ad_ProductEditPage')}}" method="post">
                                                    @csrf
                                                    <button type="submit" name="id_product"
                                                        value="{{$product->id_product}}"
                                                        class="btn btn-outline-primary"><i
                                                            class="fa fa-pencil color-muted"></i>&nbsp; Edit</button>
                                                </form>
                                                &emsp;<button class="btn btn-outline-danger"><i
                                                        class="fa fa-close color-danger"></i>&nbsp; Delete </button>
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end row -->
        </div>

    </div>
</div>
@endsection()