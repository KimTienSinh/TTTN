@extends('ad_master')
@section('ad_content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <a href="{{url('ad_blogeditpage')}}"> <button type="button" class="btn btn-outline-primary">
                            <i class="fa fa-plus-square-o"></i>&nbsp; New Blog</button></a>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Menu</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Blog</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Blog Infomation</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle table-responsive-sm basic-form">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">BLOGNAME</th>
                                        <th scope="col">IMAGE</th>
                                        <th scope="col">ACTION</th>
                                </thead>
                                <tbody>
                                    @foreach($list_blog as $blog)
                                    <tr>
                                        <td>{{$blog->id_blog}}</td>
                                        <td>{{$blog->blog_name}}</td>
                                        <td><img width="100%" src = "admin/img/blog/{{$blog->image}}" alt = ""></td>
                                        <td>
                                            <span>
                                                <a href="{{url('ad_blogeditpage', $blog->id_blog)}}"><button type="button" class="btn btn-outline-primary">&nbsp;<i class="fa fa-pencil color-muted"></i>&nbsp; Edit
                                                    </button>&nbsp;&nbsp; </a>
                                                <!-- <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal">&nbsp;<i class="fa fa-close color-danger"></i>&nbsp; Delete </button>&nbsp;&nbsp; -->
                                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> -->
                                                <a href="{{url('delete_blog', $blog->id_blog)}}"><button data-toggle="modal" data-id='' data-target="#myModal" type="button" class="btn btn-outline-danger">&nbsp;<i class="fa fa-close color-danger"></i>&nbsp; Delete </button>
                                                </a>
                                                <!-- <button data-toggle="modal" data-id='' data-target="#myModal" type="button" class="btn btn-outline-danger">&nbsp;<i class="fa fa-close color-danger"></i>&nbsp; Delete </button> -->
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <?php
                                    // include_once '../utils/MySQLUtils.php';
                                    // $dbCon = new MySQLUtils();

                                    // $query = "select * from baiviet";
                                    // $baiviets = $dbCon->getALLData($query);
                                    // foreach ($baiviets as $baiviet) {
                                    //     echo '   <tr>';
                                    //     echo '        <td>' . $baiviet['mabaiviet'] . '</td>';
                                    //     echo '        <td>' . $baiviet['Blogname'] . '</td>';
                                    //     echo '        <td> ';
                                    //     echo '           <span>';
                                    //     echo'         <a href="Blogeditpage.php?action=edit&id=' . $baiviet['mabaiviet'] . '" > <button type="button" class="btn btn-outline-success"><i class="fa fa-magic"></i>&nbsp;View</button> </a>';
                                    //     echo ' <a href="Blogeditpage.php?action=edit&id=' . $baiviet['mabaiviet'] . '"><button type="button" class="btn btn-outline-primary">&nbsp;<i class="fa fa-pencil color-muted"></i>&nbsp; Edit </button>&nbsp;&nbsp; </a>';
                                    //     echo ' <a href="../controller/DeleteBlogController.php?action=delete&id=' . $baiviet['mabaiviet'] . '"<button type="button" name="Blog_action" value="Blog_delete" class="btn btn-outline-danger" >&nbsp;<i class="fa fa-close color-danger"></i>&nbsp; Delete </button>&nbsp;&nbsp; </a>';
                                    //     echo '            </span>';
                                    //     echo '         </td';
                                    //     echo '   </tr>';
                                    // }
                                    // $dbCon->disconnectDB();
                                    ?>

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