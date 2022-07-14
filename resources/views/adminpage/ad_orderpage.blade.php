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
                        <table id="example" class="display basic-form" style="min-width: 845px" >
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">USERNAME</th>
                                        <!-- <th scope="col">ADDRESS</th>
                                        <th scope="col">PHONE</th> -->
                                        <th scope="col">TOTAL</th>
                                        <th scope="col">CREATED ORDER</th>
                                        <th scope="col">STATUS</th>
                                        <th scope="col">STATUS CHOOSE</th>
                                        <th scope="col">ACTIVE</th>
                                        <th scope="col">ORDER DETAIL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($list_order as $order)
                                    <tr>
                                        <td>{{$order->id_order}}</td>
                                        <td>{{$order->user_name}}</td>
                                        <!-- <td>{{$order->address}}</td>
                                        <td>{{$order->phone}}</td> -->
                                        <td>{{$order->price_total}}</td>
                                        <td>{{date('d-m-Y', strtotime($order->create_at));}}</td>
                                        <td>@if($order->status == 0)
                                                Chờ xác nhận
                                            @elseif($order->status == 1)
                                                Đang xác nhận
                                            @elseif($order->status == 2)
                                                Đã xác nhận
                                            @elseif($order->status == 3)
                                                Đang đóng gói
                                            @elseif($order->status == 4)
                                                Thành công
                                            @elseif($order->status == 5)
                                                Hủy đơn hàng
                                            @elseif($order->status == 6)
                                                Hết hàng
                                            @endif</td>
                                        <form method="POST" action="{{url('change_status',$order->id_order)}}">
                                        @csrf
                                            <td>
                                                <select class="form-control" name="cbx_order">
                                                    <!-- @if($order->id_order == 0)
                                                    <option selected value="0">Chờ xác nhận</option>
                                                    @elseif($order->id_order == 1)
                                                    <option selected value="1">Đang xác nhận</option>
                                                    @elseif($order->id_order == 2)
                                                    <option selected value="2">Đã xác nhận</option>
                                                    @elseif($order->id_order == 3)
                                                    <option selected value="3">Đang đóng gói</option>
                                                    @elseif($order->id_order == 4)
                                                    <option selected value="4">Thành công</option>
                                                    @elseif($order->id_order == 5)
                                                    <option selected value="5">Hủy đơn hàng</option>
                                                    @else
                                                    <option selected value="6">Hủy đơn hàng</option>
                                                    @endif -->
                                                    <option selected>Chọn trạng thái</option>
                                                    <option value="0">Chờ xác nhận</option>
                                                    <option value="1">Đang xác nhận</option>
                                                    <option value="2">Đã xác nhận</option>
                                                    <option value="3">Đang đóng gói</option>
                                                    <option value="4">Thành công</option>
                                                    <option value="5">Hủy đơn hàng</option>
                                                    <option value="6">Hết hàng</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" hidden value="{{$order->id_order}}" name="id_order" id="">
                                                <button type="submit" class="btn btn-outline-primary">&nbsp;<i class="fa fa-check"></i>&nbsp;
                                                    Active
                                                </button>

                                            </td>
                                        </form>
                                        <td>
                                            <a href="{{url('ad_orderdetailpage', $order->id_order)}}"><button type="button" class="btn btn-outline-success">&nbsp;<i class="fa fa-eye"></i>&nbsp; View Detail
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