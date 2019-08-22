@extends('backend.master.master')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>

            <div class="row">
                <a href="{{route('add-slider')}}" style="font-size: medium;" class="btn btn-sm"><i class="fa fa-plus"></i>
                    Add Slider</a>
                <hr>
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>List of Sliders</h2>
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
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliderData as $key=>$slide)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$slide->title}}</td>
                                            <td>{{strip_tags($slide->description)}}</td>
                                            <td>
                                                <form action="{{route('update-slide-status')}}" method="post">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="criteria" value="{{$slide->id}}">
                                                    @if($slide->status==1)
                                                        <button name="active" class="btn btn-success btn-xs">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                    @else
                                                        <button name="inactive" class="btn btn-danger btn-xs">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    @endif
                                                </form>
                                            </td>
                                            <td>
                                                <img src="{{url('uploads/images/sliders/'.$slide->image)}}" width="30"
                                                     alt="">
                                            </td>
                                            <td>
                                                <a href="{{route('edit-slider').'/'.$slide->id}}"
                                                   class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                                                <a href="{{route('delete-slider').'/'.$slide->id}}"
                                                   onclick="return confirm('Are you sure?')"
                                                   class="btn btn-danger btn-xs"><i
                                                            class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>


                                </table>

                                {{--{{$adminData->links()}} --}}{{--6 ota bhanda data badi bho bhane arko page ma dekhauna ko lagi--}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->





@endsection