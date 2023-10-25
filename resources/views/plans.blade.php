@extends('layouts.app')

@section('content')
    <ul>
        @foreach($plans as $plan)
            <li><a href="{{ route('plans.show', $plan->slug) }}">{{ $plan->name }}, price: {{ $plan->price }}$/month</a></li>
        @endforeach
    </ul>
@endsection
