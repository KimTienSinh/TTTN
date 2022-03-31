@extends('ad_master')
@section('ad_content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <a href="Blogpage.php"><button type="button" class="btn btn-outline-primary">
                            <i class="fa fa-undo"></i>&nbsp; Back</button></a>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Blog</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Blog Information</h4>
                    </div>

                    <div class="card-body">
                        <div class="basic-form">
                            <form action="../controller/BlogController.php" method="post">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input name="txt_title" class="form-control" required="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Catalogy</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="txt_catalogy">
                                            <?php
                                            // include_once '../utils/MySQLUtils.php';
                                            // $dbCon = new MySQLUtils();
                                            // $query = "select * from danhmuc";
                                            // $danhmucs =  $dbCon->getALLData($query);
                                            // foreach ($danhmucs as $danhmuc) {
                                            //     echo '   <option value="' . $danhmuc['madanhmuc'] . '" selected>' . $danhmuc['catname'] . '</option> ';
                                            // }

                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <textarea name="mota" id="mota">Description</textarea>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" name="blog_action" value="blog_create" class="btn btn-primary">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- end row -->
            </div>
        </div>

    </div>
</div>

@endsection()