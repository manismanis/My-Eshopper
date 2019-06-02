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
                            <h2>Add New Item</h2>
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
                                    <form action="{{route('add-item')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-group-sm">
                                                    <label for="subcat_name">Select Sub-Category</label>
                                                    <select name="subcat_name" class="form-control">
                                                        <option value="">Select Sub-Category</option>
                                                        @foreach ($catData as $key=>$cat)
                                                            <option disabled style="font-family: 'Calibri';font-size: large;color: Blue;"
                                                                    value="{{$key}}">{{ucfirst($cat->cat_name)}}</option>
                                                            @foreach($cat->subcategory as $subcat)
                                                                <option style="font-size: medium"
                                                                        value="{{$subcat->subcat_id}}">{{ucfirst($subcat->subcat_name)}}</option>
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group form-group-sm">
                                                    <label for="brandname">Select Brand</label>
                                                    <select name="brandname" class="form-control">
                                                        <option value="">Select Brand</option>
                                                        @foreach ($brandData as $key=>$brand)
                                                            <option value="{{$brand->id}}">{{ucfirst($brand->brandname)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-group-sm">
                                                    <label for="itemname">Title</label>
                                                    <input type="text" id="itemname" name="itemname"
                                                           value="{{old('itemname')}}"
                                                           placeholder="Title of the Item" class="form-control">
                                                    <a href="" style="color: red">{{$errors->first('itemname')}}</a>
                                                </div>

                                                <div class="form-group form-group-sm">
                                                    <label for="price">Price</label>
                                                    <input name="price" id="price" class="form-control">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="form-group form-group-sm col-md-2">
                                                <label>
                                                    FEATURED <input name="isFeatured" type="checkbox"
                                                                    class="js-switch"/>
                                                </label>
                                            </div>
                                            <div class="form-group form-group-sm col-md-3">
                                                <label>
                                                    RECOMMENDED <input name="isRecommended" type="checkbox"
                                                                       class="js-switch"/>
                                                </label>
                                            </div>
                                            <div class="form-group form-group-sm col-md-2">
                                                <label>
                                                    STATUS <input name="isStatus" type="checkbox" class="js-switch"/>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group form-group-sm">
                                            <label for="image">Image</label>
                                            <input type="file" name="upload" class="btn btn-default btn-xs">
                                        </div>
                                        <br>
                                        <div class="form-group form-group-sm">
                                            <button class="btn btn-success btn-sm">Add Item</button>
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