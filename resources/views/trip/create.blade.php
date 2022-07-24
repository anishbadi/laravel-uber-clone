@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                @endforeach
            @endif
            <form method="post" action="{{ route('trip.store') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">{{ __('Select Customer') }}</label>
                    <select name="customer_id" class="form-control">
                        @foreach ($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">{{__('Select Start Location')}}</label>
                    <select name="from_location_id" class="form-control location-select-class" id="select_from_location_id" onchange="calculateDistance(this);">
                        <option selected="selected" value="">{{__('Select Start Location')}}</option>
                        @foreach ($locations as $location)
                            <option value="{{$location->id}}">{{$location->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">{{__('Select Destination Location')}}</label>
                    <select name="to_location_id" class="form-control location-select-class" id="select_to_location_id" onchange="calculateDistance(this);">
                        <option selected="selected" value="">{{__('Select Destination Location')}}</option>
                        @foreach ($locations as $location)
                            <option value="{{$location->id}}">{{$location->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">{{__('Distance')}}</label>
                    <input class="form-control" id="distanceBtwnLocation" type="text" placeholder="" readonly>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">{{__('Book a trip')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="d-none">
	<div id="_token">{{ csrf_token() }}</div>
    <div id="route-distance-calculation">{{ route('distance.calculation') }}</div>
</div>
@endsection