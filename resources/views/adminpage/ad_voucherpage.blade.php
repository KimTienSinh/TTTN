@extends('ad_master')
@section('ad_content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <a href="{{url('ad_vouchereditpage')}}"> <button type="button" class="btn btn-outline-primary">
                            <i class="fa fa-plus-square-o"></i>&nbsp; New Voucher</button></a>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Menu</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Voucher</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Voucher Infomation</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle table-responsive-sm basic-form">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">VOUCHER CODE</th>
                                        <th scope="col">PRICE SALE</th>
                                        <th scope="col">ACTION</th>
                                </thead>
                                <tbody>
                                    @foreach($list_voucher as $voucher)
                                    <tr>
                                        <td>{{$voucher->id_voucher}}</td>
                                        <td>{{$voucher->voucher_code}}</td>
                                        <td>{{$voucher->price_sale}}</td>
                                        <td>
                                            <span>
                                                <a href="{{url('ad_vouchereditpage', $voucher->id_voucher)}}"><button type="button" class="btn btn-outline-primary">&nbsp;<i class="fa fa-pencil color-muted"></i>&nbsp; Edit
                                                    </button>&nbsp;&nbsp; </a>
                                                <!--{{url('ad_blogeditpage', $voucher->id_blog)}} <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal">&nbsp;<i class="fa fa-close color-danger"></i>&nbsp; Delete </button>&nbsp;&nbsp; -->
                                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> -->
                                                <a href="{{url('delete_voucher', $voucher->id_voucher)}}"><button data-toggle="modal" data-id='' data-target="#myModal" type="button" class="btn btn-outline-danger">&nbsp;<i class="fa fa-close color-danger"></i>&nbsp; Delete </button>
                                                </a>
                                                <!-- {{url('delete_blog', $voucher->id_blog)}} <button data-toggle="modal" data-id='' data-target="#myModal" type="button" class="btn btn-outline-danger">&nbsp;<i class="fa fa-close color-danger"></i>&nbsp; Delete </button> -->
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
            </form>
            <!-- end row -->
        </div>
    </div>
</div>
@endsection()