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
                            <h2>Update Item Info</h2>
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
                                    <form action="{{route('edit-item-action')}}" method="post"
                                          enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input type="hidden" name="criteria" value="{{$itemData->id}}">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group form-group-sm">
                                                    <label for="subcat_name">Select Sub-Category</label>
                                                    <select name="subcat_name[]" id="subcat_name" class="form-control">
                                                        <option value=""> ---- Select SubCategory</option>
                                                        @foreach($catData as $key => $cat)
                                                            <option disabled style="color: MenuText;" value="{{$key}}">
                                                                ** {{ucfirst($cat->cat_name)}}</option>
                                                            @foreach($cat->Subcategory as $subcat)
                                                                <option value="{{$subcat->subcat_id}}" {{$itemData->subcat_id==$subcat->subcat_id ? 'selected' : ''}}>{{ucfirst($subcat->subcat_name)}}</option>
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group form-group-sm">
                                                    <label for="brandname">Brand</label>
                                                    <select name="brandname[]" class="form-control">
                                                        <option value="">Select Brand</option>
                                                        @foreach($brandData as $key => $brand)
                                                            <option value="{{$brand->id}}" {{$itemData->brand_id==$brand->id ? 'selected' : ''}}>{{ucfirst($brand->brandname)}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group form-group-sm">
                                                    <label for="itemname">Title</label>
                                                    <input type="text" id="itemname" name="itemname"
                                                           value="{{$itemData->itemname}}"
                                                           placeholder="Title of the Item" class="form-control">
                                                    <a href="" style="color: red">{{$errors->first('itemname')}}</a>
                                                </div>
                                            </div>
                                            <div class="col-md-4">

                                                <div class="form-group form-group-sm">
                                                    <label for="price">Price</label>
                                                    <input name="price" id="price" value="{{$itemData->price}}"
                                                           class="form-control">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="form-group form-group-sm col-md-2">
                                                <label>
                                                    FEATURED <input name="isFeatured" type="checkbox"
                                                                    {{$itemData->isFeatured ? 'checked' : ''}} class="js-switch"/>

                                                </label>
                                            </div>
                                            <div class="form-group form-group-sm col-md-3">
                                                <label>
                                                    RECOMMENDED <input name="isRecommended" type="checkbox"
                                                                       {{$itemData->isRecommended ? 'checked' : ''}} class="js-switch"/>

                                                </label>
                                            </div>
                                            <div class="form-group form-group-sm col-md-2">
                                                <label>
                                                    STATUS <input name="isStatus" type="checkbox"
                                                                  {{$itemData->isRecommended ? 'checked' : ''}} class="js-switch"/>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group form-group-sm">
                                            <label for="image">Image</label>
                                            <img src="{{url('uploads/images/items/' .$itemData->image)}}" alt=""
                                                 class="img-responsive thumbnail">
                                            <input type="file" id="upload" name="upload" class="btn btn-default btn-sm">

                                        </div>
                                        <br>
                                        <div class="form-group form-group-sm">
                                            <button class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Update</button>
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