@extends('master')

@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Member Details</b></div>
			<div class="col col-md-6">
				<a href="{{ route('sales_team.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Member Name</b></label>
			<div class="col-sm-10">
				{{ $salesTeam->name }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Member Email</b></label>
			<div class="col-sm-10">
				{{ $salesTeam->email }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Member Telephone</b></label>
			<div class="col-sm-10">
				{{ $salesTeam->telephone }}
			</div>
		</div>
        <div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Member Current Route</b></label>
			<div class="col-sm-10">
				{{ $salesTeam->current_route }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Member Image</b></label>
			<div class="col-sm-10">
				<img src="{{ asset('images/' .  $salesTeam->member_image) }}" width="200" class="img-thumbnail" />
			</div>
		</div>
	</div>
</div>

@endsection('content')