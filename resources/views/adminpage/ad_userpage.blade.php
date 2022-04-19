@extends('ad_master')
@section('ad_content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <a href="{{url('ad_usereditpage')}}"> <button type="button" class="btn btn-outline-primary">
                            <i class="fa fa-plus-square-o"></i>&nbsp; New User</button></a>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Menu</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">User List</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User Infomation</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered  table-responsive-sm basic-form">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>USERNAME</th>
                                        <th>EMAIL</th>
                                        <th>ADDRESS</th>
                                        <th>PHONE</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($list as $user)
                                    <tr>
                                        <td>{{$user->id_user}}</td>
                                        <td>{{$user->user_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->address}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->status}}</td>
                                        <td>
                                            <span>
                                                <a href="{{Route('chinh-User',$user->id_user)}}"><button
                                                        type="button" class="btn btn-outline-primary">&nbsp;<i
                                                            class="fa fa-pencil color-muted"></i>&nbsp; Edit
                                                    </button>&nbsp;&nbsp; </a>
                                                <!-- <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal">&nbsp;<i class="fa fa-close color-danger"></i>&nbsp; Delete </button>&nbsp;&nbsp; -->
                                                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> -->
                                                <a href="{{url('delete_user', $user->id_user)}}"><button
                                                        data-toggle="modal" data-id='{{$user->id}}'
                                                        data-target="#myModal" type="button"
                                                        class="btn btn-outline-danger">&nbsp;<i
                                                            class="fa fa-close color-danger"></i>&nbsp; Delete </button>
                                                </a>
                                                <!-- <button data-toggle="modal" data-id='{{$user->id}}' data-target="#myModal" type="button" class="btn btn-outline-danger">&nbsp;<i class="fa fa-close color-danger"></i>&nbsp; Delete </button> -->
                                            </span>
                                        </td>
                                    </tr>
                                    <!-- Delete Warning Modal -->



                                    <!-- Modal -->

                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <form action="" method="post">
                                                {{method_field('delete')}}
                                                {{csrf_field()}}
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Bạn có muốn xóa</h4>
                                                        <input type=hidden id="id_user" name=id_user>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <button type="submit" class="btn btn-outline-danger">Yes !
                                                            Delete it</button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <!-- End Delete Modal -->
                                    @endforeach

                                    <?php


                                    // try {


                                    //     // $item_in_page = !empty($_GET['item_inpage']) ? $_GET['item_inpage'] : 4;
                                    //     // $page = !empty($_GET['page']) ? $_GET['page'] : 1;
                                    //     // $offset = ($page - 1) * $item_in_page;

                                    //     // $query = "SELECT * FROM khachhang LIMIT " . $item_in_page . " OFFSET  " . $offset . " ";
                                    //     // $users = $dbCon->getALLData($query);

                                    //     // $query1 = "SELECT * FROM khachhang";
                                    //     // $u = $dbCon->getALLData($query1);
                                    //     // $sumuser = count($u);
                                    //     // $totalpage = ceil($sumuser / $item_in_page);


                                    //     for ($i = 0; $i < count($data["lists"]); $i++) {
                                    //         echo '    <tr>';
                                    //         echo '        <td>' . $data["lists"][$i]['mauser'] . '</td> ';
                                    //         echo '        <td> ' . $data["lists"][$i]['username'] . '</td>';
                                    //         echo '        <td> ' . $data["lists"][$i]['email'] . ' </td>';
                                    //         echo '        <td> ' . $data["lists"][$i]['address'] . ' </td>';
                                    //         echo '        <td> ' . $data["lists"][$i]['phone'] . ' </td>';
                                    //         echo '        <td> <button type="button" class="btn btn-outline-success"><i class="fa fa-magic"></i>&nbsp;Active</button> ';
                                    //         echo '        <td>';
                                    //         echo '           <span>';
                                    //         echo ' <a href="../controller/UserController.php?action=edit&id=' . $data["lists"][$i]['mauser'] . '"><button type="button" class="btn btn-outline-primary">&nbsp;<i class="fa fa-pencil color-muted"></i>&nbsp; Edit </button>&nbsp;&nbsp; </a>';
                                    //         echo ' <a href="../controller/UserController.php?action=delete&id=' . $data["lists"][$i]['mauser'] . '"<button type="button" class="btn btn-outline-danger" >&nbsp;<i class="fa fa-close color-danger"></i>&nbsp; Delete </button>&nbsp;&nbsp; </a>';
                                    //         echo '            </span>';
                                    //         echo '        </td> ';
                                    //         echo '    </tr>';
                                    //     }
                                    // } catch (PDOException $e) {
                                    //     echo "Error: " . $e->getMessage();
                                    // }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <script>
                $(document).on('click', '.delete', function() {
                    let id = $(this).attr('data-id');
                    $('#id').val(id);
                });
            </script>

            <!-- end row -->
        </div>
        <!-- <div id="app" class="container">
                    <ul class="page">
                        <li class="page__btn"><span class="material-icons">chevron_left</span></li>
                        <?php
                        // for ($numpage = 1; $numpage <= $totalpage; $numpage++) {
                        //    echo ' <li class="page__numbers"><a class="boiden" href="../view/userpagelist.php?item_inpage=' . $item_in_page . '&page=' . $numpage . '">' . $numpage . '</a></li>';
                        // }
                        ?>
                        <li class="page__dots">...</li>
                        <li class="page__numbers"> 10</li>
                        <li class="page__btn"><span class="material-icons">chevron_right</span></li>
                    </ul>
                </div> -->
    </div>
</div>

@endsection()