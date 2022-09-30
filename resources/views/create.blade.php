@extends('master')

@section('content')

@if($errors->any())

<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)

			<li>{{ $error }}</li>

		@endforeach
	</ul>
</div>

@endif

<div class="card">
	<div class="card-header">Add Member</div>
	<div class="card-body">
		<form method="post" action="{{ route('sales_team.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Member Name</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Member Email</label>
				<div class="col-sm-10">
					<input type="text" name="email" class="form-control" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Member Telephone</label>
				<div class="col-sm-10">
					<input type="text" name="telephone" class="form-control" />
				</div>
			</div>
            <div class="row mb-4">
				<label class="col-sm-2 col-label-form">Member Current Route</label>
				<div class="col-sm-10">
					<input type="text" name="current_route" class="form-control" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Member Image</label>
				<div class="col-sm-10">
					<input type="file" name="member_image" />
				</div>
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Add" />
			</div>	
		</form>
	</div>
</div>

@endsection('content')