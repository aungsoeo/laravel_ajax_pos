@extends('layouts.app')
@section('content')
	
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">All Product</div>

                <div class="panel-body">
                   
                    <table class="table table-striped">
							<thead>
							  <tr>
								<th>ID</th>
								<th>Product Name</th>
								<th>Product Code</th>
								<th>Image</th>
								<th>Edit</th>
								<th>Delete</th>
							  </tr>
							</thead>
							<tbody>
							@foreach($products as $product)
								  <tr>
								    <td>{!! $product->id !!}</td>
									<td>{!! $product->name !!}</td>

									<td>{!! $product->code !!}</td>
									<td>
										 <img src="{{ asset('images/' . $product->image) }}" alt="product_image" style="width: 120px; height: 120px;">
									</td>
									
									<td>
										<input type="submit" class="btn btn-primary" onclick="window.location.href='{{ route('admin.product.edit',$product->id) }}'" value="Edit">
									</td>
									<td>
										<input type="submit" class="btn btn-danger" onclick="window.location.href='{{ route('admin.product.delete',$product->id)}}'" value="Delete">
									</td>
								  </tr>
							  @endforeach
							  <a type="submit" class="btn btn-default" href="product/create">Add New Product</a>
							</tbody>
						  </table>
						  {!! $products->render()!!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection