@extends('master')

@section('content')

<div class="card">
	<div class="card-header">Edit Member
        <div class="col col-md-12">
            <a href="{{ route('sales_team.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
        </div>
    </div>
	<div class="card-body">
		<form method="post" action="{{ route('sales_team.update', $salesTeam->id) }}" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Member Name</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" value="{{ $salesTeam->name }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Member Email</label>
				<div class="col-sm-10">
					<input type="text" name="email" class="form-control" value="{{ $salesTeam->email }}" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Member Telephone</label>
				<div class="col-sm-10">
					<input type="text" name="telephone" class="form-control" value="{{ $salesTeam->telephone }}" />
				</div>
			</div>
            <div class="row mb-4">
				<label class="col-sm-2 col-label-form">Member Current Route</label>
				<div class="col-sm-10">
					<input type="text" name="current_route" class="form-control" value="{{ $salesTeam->current_route }}" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Member Image</label>
				<div class="col-sm-10">
					<input type="file" name="member_image" />
					<br />
					<img src="{{ asset('images/' . $salesTeam->member_image) }}" width="100" class="img-thumbnail" />
					<input type="hidden" name="hidden_member_image" value="{{ $salesTeam->member_image }}" />
				</div>
			</div>
			<div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $salesTeam->id }}" />
				<input type="submit" class="btn btn-primary" value="Edit" />
			</div>	
		</form>
	</div>
</div>

@endsection('content')