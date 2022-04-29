@extends('ad_master')
@section('ad_content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Menu</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Order</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Order Infomation</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle table-responsive-sm basic-form">
                                <thead>
                                    <tr>
                                        <th scope="col">ID ORDER</th>
                                        <th scope="col">USERNAME</th>
                                        <th scope="col">ADDRESS</th>
                                        <th scope="col">PHONE</th>
                                        <th scope="col">TOTAL</th>
                                        <th scope="col">CREATED ORDER</th>
                                        <th scope="col">ORDER DETAIL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($list_order as $order)
                                    <tr>
                                        <td>{{$order->id_order}}</td>
                                        <td>{{$order->user_name}}</td>
                                        <td>{{$order->address}}</td>
                                        <td>{{$order->phone}}</td>
                                        <td>{{$order->price_total}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>
                                        <a href="{{url('ad_orderdetailpage', $order->id_order)}}"><button type="button"
                                                        class="btn btn-outline-success">&nbsp;<i
                                                            class="fa fa-eye"></i>&nbsp; View Detail
                                                    </button>&nbsp;&nbsp; </a>
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