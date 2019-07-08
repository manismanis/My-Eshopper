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
                            <h2>Create New Sub-Category</h2>
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
                                    <form action="{{route('add-subcategory')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group form-group-sm">
                                            <label for="cat_name">Select  Category</label>
                                            <select name="cat_name"  class="form-control">
                                                <option disabled selected value="">--Select Category--</option>
                                                @foreach ($catData as $key=>$cat)
                                                    <option value="{{$cat->id}}">{{ucfirst($cat->cat_name)}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group form-group-sm">
                                            <label for="subcat_name">Title</label>
                                            <input type="text" id="subcat_name" name="subcat_name"
                                                   value="{{old('subcat_name')}}"
                                                   placeholder="Title of the Sub-Category" class="form-control">
                                            <a href="" style="color: red">{{$errors->first('subcat_name')}}</a>
                                        </div>
                                        <div class="form-group form-group-sm">
                                            <button class="btn btn-success btn-sm">Create Sub-Category</button>

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