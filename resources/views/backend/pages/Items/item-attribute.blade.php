@extends('backend.master.master')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">

            <div class="page-title">
                <div class="title_left">
                    <h3>Item Attributes </h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-plus"></i> Add Item Attribute</h2>&nbsp;&nbsp;

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
                        <div class="row">
                            <div class="col-md-5">
                                @include('backend.layouts.messages')
                                <form action="{{route('item-attribute',$itemDetails->id)}}" name="add_attribute"
                                      id="add_attribute" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="product_id" value="{{$itemDetails->id}}">
                                    <div class="form-group form-group-sm">
                                        <label class="control-label">Product : </label>
                                        <label class="control-label">{{$itemDetails->itemname}}</label>
                                    </div>
                                    <div class="form-group form-group-sm">
                                        <label class="control-label"><strong>Add Attribute</strong></label>
                                        <div class="field_wrapper">
                                            <div>
                                                <input type="text" name="sku[]" id="sku[]" style="height: 30px"
                                                       placeholder="SKU"/>
                                                <input type="text" name="size[]" id="size[]" style="height: 30px"
                                                       placeholder="Size"/>
                                                <br><br>


                                                <input type="text" name="color[]" id="color[]" style="height: 30px"
                                                       placeholder="Color"/>
                                                <input type="text" name="stock[]" id="stock[]" style="height: 30px"
                                                       placeholder="Stock"/>

                                                <a href="javascript:void(0);" class="add_button"
                                                   title="Add field">Add</a>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="form-group form-group-sm">
                                        <button class="btn btn-success btn-sm">Add Attributes</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-7">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>S.K.U</th>
                                        <th>Size</th>
                                        <th>Color Available</th>
                                        <th>Stock</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($itemDetails->ItemAttribute as $key=>$attribute)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$attribute->sku}}</td>
                                            <td>{{$attribute->size}}</td>
                                            <td>{{$attribute->color}}</td>
                                            <td>{{$attribute->stock}}</td>
                                            <td>
                                                <a href="" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                                                <a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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

    <!-- /page content -->




@endsection