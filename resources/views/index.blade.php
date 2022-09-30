@extends('master')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Sales Member Data</b></div>
			<div class="col col-md-6">
				<a href="{{ route('sales_team.create') }}" class="btn btn-success btn-sm float-end">Add New Member</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Telephone</th>
                <th>Current Route</th>
                <th>Image</th>
				<th>Action</th>
			</tr>
			@if(count($data) > 0)

				@foreach($data as $row)

					<tr>
						<td>{{ $row->name }}</td>
						<td>{{ $row->email }}</td>
						<td>{{ $row->telephone }}</td>
                        <td>{{ $row->current_route }}</td>
                        <td><img src="{{ asset('images/' . $row->member_image) }}" width="75" /></td>
						<td>
							<form method="post" action="{{ route('sales_team.destroy', $row->id) }}">
								@csrf
								@method('DELETE')
								<a href="{{ route('sales_team.show', $row->id) }}" class="btn btn-primary btn-sm">View</a>
								<a href="{{ route('sales_team.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
								<input type="submit" class="btn btn-danger btn-sm" value="Delete" />
							</form>
							
						</td>
					</tr>

				@endforeach

			@else
				<tr>
					<td colspan="5" class="text-center">No Data Found</td>
				</tr>
			@endif
		</table>
		{!! $data->links() !!}
	</div>
</div>

@endsection