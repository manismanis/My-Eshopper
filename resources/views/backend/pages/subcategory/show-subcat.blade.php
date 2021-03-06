@extends('backend.master.master')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>

            <div class="row">
                <a href="{{route('add-subcategory')}}" style="font-size: medium;" class="btn btn-sm"><i class="fa fa-plus"></i>
                    Add Subcategory</a>
                <hr>
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>List of Sub-Cateogory</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                @include('backend.layouts.messages')
                                <div class="col-md-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S.N</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($subcatData as $key=>$subcat)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$subcat->subcat_name}}</td>
                                                <td>{{$subcat->category->cat_name}}</td>
                                                <td>{{$subcat->created_at->diffForHumans()}}</td>
                                                <td>{{$subcat->updated_at->diffForHumans()}}</td>
                                                <td>
                                                    <a href=""
                                                       class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                                                    <a href="{{route('delete-subcategory').'/'.$subcat->subcat_id}}"
                                                       class="btn btn-danger btn-xs"
                                                       onclick="return confirm('Are you sure?')"><i
                                                                class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->





@endsection