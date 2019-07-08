@extends('frontend.master.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 ">
                <h4>Contact Us</h4>
                <hr>
                <form action="" method="post">
                    @csrf
                    <div class="form-group form-group-sm">
                        <label for="name">Name</label>
                        <input name="name" id="name" placeholder="Enter Your Name" class="form-control">
                    </div>
                    <div class="form-group form-group-sm">
                        <label for="email">Email</label>
                        <input name="email" id="email" placeholder="Enter Your Email" class="form-control">
                    </div>
                    <div class="form-group form-group-sm">
                        <label for="email">Comments/Suggestions</label>
                        <textarea name="comments" id="comments" class="form-control" cols="30" rows="5"
                                  placeholder="Your Comments & Suggestions"></textarea>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group form-group-sm">
                        <button class="btn btn-success btn-sm"><i class="fa fa-save"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div><br><br>
@stop