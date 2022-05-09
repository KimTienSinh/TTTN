@extends('ad_master')
@section('ad_content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <a href="{{url('ad_slideeditpage')}}"> <button type="button" class="btn btn-outline-primary">
                            <i class="fa fa-plus-square-o"></i>&nbsp; New Slide</button></a>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Menu</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Slide</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Slide Infomation</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle table-responsive-sm basic-form">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">SLIDE NAME</th>
                                        <th style="width: 65%;" scope="col">IMAGE</th>
                                        <th scope="col">ACTION</th>
                                </thead>
                                <tbody>
                                    @foreach($list_slide as $slide)
                                    <tr>
                                        <td>{{$slide->id_slide}}</td>
                                        <td>{{$slide->slide_name}}</td>
                                        <td><img width="100%" src = "admin/img/{{$slide->image}}" alt = ""></td>
                                        <td>
                                            <span>
                                                <a href="{{url('ad_slideeditpage', $slide->id_slide)}}"><button type="button" class="btn btn-outline-primary">&nbsp;<i class="fa fa-pencil color-muted"></i>&nbsp; Edit
                                                    </button>&nbsp;&nbsp; </a>
                                                <!--{{url('ad_blogeditpage', $slide->id_blog)}} <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal">&nbsp;<i class="fa fa-close color-danger"></i>&nbsp; Delete </button>&nbsp;&nbsp; -->
                                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> -->
                                                <a href="{{url('delete_slide', $slide->id_slide)}}"><button data-toggle="modal" data-id='' data-target="#myModal" type="button" class="btn btn-outline-danger">&nbsp;<i class="fa fa-close color-danger"></i>&nbsp; Delete </button>
                                                </a>
                                                <!-- {{url('delete_blog', $slide->id_blog)}} <button data-toggle="modal" data-id='' data-target="#myModal" type="button" class="btn btn-outline-danger">&nbsp;<i class="fa fa-close color-danger"></i>&nbsp; Delete </button> -->
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
<script>
    $('[data-id]').each(function(){
            $(this).click(function(){
                $('#id_slide').val($(this).data('id'));
            });
        });                                             
</script>
@endsection()