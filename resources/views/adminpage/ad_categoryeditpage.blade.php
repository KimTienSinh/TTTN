@extends('ad_master')
@section('ad_content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <a href="{{url('ad_categorypage')}}"><button type="button" class="btn btn-outline-primary">
                            <i class="fa fa-undo"></i>&nbsp; Back</button></a>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Category</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Category create</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Category Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            @if(isset($category_edit))
                            <form action="{{route('update-danh-muc',$category_edit->id_categories)}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Category Parent</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="cbx_parent_id">
                                            @foreach($list_dropdown as $cat)
                                            <option @if($cat->id_categories==$category_edit->id_parent) selected @endif  value="{{$cat->id_categories}}">{{$cat->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Catalogy Name</label>
                                    <div class="col-sm-10">
                                        <input name="category_name" value="{{$category_edit->category_name}}" class="form-control" placeholder="Catalogy Name" required="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" name="cat_action" value="cat_update" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                            @else
                            <form action="{{route('them-danh-muc')}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Category Parent</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="cbx_parent_id">
                                            @foreach($list_dropdown as $parent)
                                            <option value="{{$parent->id_categories}}">{{$parent->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Catalogy Name</label>
                                    <div class="col-sm-10">
                                        <input name="category_name" class="form-control" placeholder="Catalogy Name" required="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" name="cat_action" value="cat_create" class="btn btn-primary">Create</button>
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
    <!--**********************************
                    Content body end
                ***********************************-->
    <!--**********************************
                    Footer start
                ***********************************-->

    <!--**********************************
                    Footer end
                ***********************************-->

    <!--**********************************
                   Support ticket button start
                ***********************************-->

    <!--**********************************
                   Support ticket button end
                ***********************************-->
</div>
@endsection()