@extends('layouts.app') @section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">{{ __('Trip') }} <a style="float: right" href="{{route('trip.create')}}">{{__('Book a trip')}}</a> </div> @if(session()->has('message'))
				<div class="alert alert-success"> {{ session()->get('message') }} </div> @endif
				<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">{{ __('Customer Name') }}</th>
								<th scope="col">{{ __('From Location') }}</th>
								<th scope="col">{{ __('To Location') }}</th>
								<th scope="col">{{ __('Distance') }}</th>
								<th scope="col">{{ __('Status') }}</th>
								<th scope="col">{{ __('Action') }}</th>
							</tr>
						</thead>
						<tbody> 
							@forelse ($trips as $trip)
								<tr>
									<th scope="row">{{$loop->iteration}}</th>
									<td>{{$trip->customer->name}}</td>
									<td>{{$trip->fromLocation->name}}</td>
									<td>{{$trip->toLocation->name}}</td>
									<td>{{$trip->distance}}</td>
									<td><span class="trip-status-{{$trip->id}}">{{$trip->status}}</span></td>
									<td>
										<div class="custom-control custom-switch">
											<input onchange="completeTrip({{$trip->id}})" type="checkbox" @if($trip->status == 'completed') checked disabled @endif class="custom-control-input" id="customSwitch{{$trip->id}}">
											<label class="custom-control-label" for="customSwitch{{$trip->id}}">Complete Trip</label>
										</div>
									</td>
								</tr> 
							@empty
								<h1>{{ __('No trip found') }}</h1> 
							@endforelse 
						</tbody>
					</table>
					{{ $trips->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
<div class="d-none">
	<div id="_token">{{ csrf_token() }}</div>
	<div id="route-update-trip-status">{{ route('trip.update.status') }}</div>
</div> @endsection