@extends('layouts.app')

@section('content')
    Purchased {{ $plan->name }} for {{ $plan->price }}$/month
@endsection
