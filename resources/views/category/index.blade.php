@extends('layouts.app')
@section('content')
	
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">All Categories</div>

                <div class="panel-body">
                   
                    <table class="table table-striped">
							<thead>
							  <tr>
								<th>ID</th>
								<th>Category Name</th>
								<th>Description</th>
								<th>Edit</th>
								<th>Delete</th>
							  </tr>
							</thead>
							<tbody>
						  	  @foreach($categories as $category)
								  <tr>
								    <td>{!! $category->id !!}</td>
									<td>{!! $category->name !!}</td>

									<td>{!! $category->description !!}</td>
									
									<td>
<!-- 										<form action="" method="GET">
											<input type="hidden" value="{{$category->id}} " >
												<button type="submit" class="btn btn-default">Edit</button>
										</form> -->
										<input type="submit" class="btn btn-primary" onclick="window.location.href='{{ route('admin.category.edit',$category->id) }}'" value="Edit">
									</td>
									<td>
	<!-- 									<form action="{{ route('admin.category.delete',$category->id)}}" method="delete"  onsubmit ="return confirmDelete()">
											<input type="hidden" value="{{$category->id}} " >
												<button type="submit" class="btn btn-default">Delete</button>
										</form> -->
										<input type="submit" class="btn btn-danger" onclick="window.location.href='{{ route('admin.category.delete',$category->id)}}'" value="Delete">
									</td>
								  </tr>
							  @endforeach
							  <a type="submit" class="btn btn-default" href="{{ url('/category/create') }}">Add New Category</a>
							</tbody>
						  </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection