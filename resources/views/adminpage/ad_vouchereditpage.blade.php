@extends('ad_master')
@section('ad_content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <a href="{{url('ad_voucherpage')}}"><button type="button" class="btn btn-outline-primary">
                            <i class="fa fa-undo"></i>&nbsp; Back</button></a>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Voucher</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Voucher Information</h4>
                    </div>

                    <div class="card-body">
                        <div class="basic-form">
                            @if(isset($voucher_edit))
                            <form action="{{url('update_voucher', $voucher_edit->id_voucher)}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Voucher Code</label>
                                    <div class="col-sm-10">
                                        <input name="voucher_code" value="{{$voucher_edit->voucher_code}}" class="form-control" required="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Condition Price</label>
                                    <div class="col-sm-10">
                                        <input name="condition_price" value="{{$voucher_edit->condition_price}}" class="form-control" required="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Price Sale</label>
                                    <div class="col-sm-10">
                                        <input name="price_sale" value="{{$voucher_edit->price_sale}}" class="form-control" required="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" name="voucher_action" value="voucher_update" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                            @else
                            <form action="{{route('them-voucher')}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Voucher Code</label>
                                    <div class="col-sm-10">
                                        <input name="voucher_code" class="form-control" required="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Condition Price</label>
                                    <div class="col-sm-10">
                                        <input name="condition_price" class="form-control" required="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Price Sale</label>
                                    <div class="col-sm-10">
                                        <input name="price_sale" class="form-control" required="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" name="voucher_action" value="voucher_create" class="btn btn-primary">Create</button>
                                    </div>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- end row -->
            </div>
        </div>

    </div>
</div>

@endsection()