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
                            <h2>Update Subcategory Info</h2>
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
                                    <form action="{{route('edit-subcategory-action')}}" method="post"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="criteria" value="{{$subcategoryData->id}}">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group form-group-sm">
                                                    <label for="cat_name">Category</label>
                                                    <select name="cat_name[]" class="form-control">
                                                        <option value="" disabled selected>--Select Category--</option>
                                                        @foreach($categoryData as $cat)
                                                            <option value="{{$cat->id}}" {{$subcategoryData->cat_id==$cat->id ? 'selected' : ''}}>{{ucfirst($cat->cat_name)}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group form-group-sm">
                                                    <label for="subcat_name">Subcategory</label>
                                                    <input type="text" id="subcat_name" name="subcat_name"
                                                           value="{{$subcategoryData->subcat_name}}"
                                                           placeholder="Enter Subcategory Name"
                                                           class="form-control">
                                                    <a href=""
                                                       style="color: red">{{$errors->first('subcat_name')}}</a>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group form-group-sm">
                                            <button class="btn btn-success btn-xs"><i
                                                        class="fa fa-edit"></i>
                                                Update
                                                Subcategory
                                            </button>

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