@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Product</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ url('/product/store') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Product Name</label>
								<div class="col-md-6">
                               		 <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            	</div>
                        </div>

                        <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Product Code</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="code" value="{{ old('code') }}">
                               
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                               <select id="ctr_parent_id" class="form-control" name="main_category_id">
                                <option value="">Select Category</option>
                                @foreach($cat as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                        </select>
                               
                            </div>
                        </div>
						
                        <div class="form-group">

                                <label class="col-md-4 control-label">Choose an Image</label>
                                <div class="col-md-6">
                                    <input type="file" name="image" value="{{ old('image')}}">
                                </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Add Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
