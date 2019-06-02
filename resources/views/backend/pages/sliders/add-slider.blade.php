@extends('backend.master.master')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add Slider</h2>
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
                                <div class="col-md-12">
                                    <form action="{{route('add-slider')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group form-group-sm">
                                            <label for="name">Title</label>
                                            <input type="text" id="title" name="title" value="{{old('title')}}"
                                                   placeholder="Enter Title of the Slider" class="form-control">
                                            <a href="" style="color: red">{{$errors->first('title')}}</a>
                                        </div>
                                        <div class="form-group form-group-sm">
                                            <label for="description_id">Description</label>
                                            <textarea name="description" id="description_id" class="form-control"></textarea>
                                            <a href="" style="color: red">{{$errors->first('description')}}</a>
                                        </div>


                                        <div class="form-group form-group-sm">
                                            <label for="upload">Slide Image</label>
                                            <input type="file" id="upload" name="upload" class="btn btn-default btn-sm">
                                            <a href="" style="color: red">{{$errors->first('upload')}}</a>


                                        </div>
                                        <div class="form-group form-group-sm">
                                            <button class="btn btn-success btn-sm">Create Slide</button>

                                        </div>
                                    </form>
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