@extends('layout.backend.app')

@section('title', __('trans.auth.alert_not_permission'))


@section('content')

<div class="text-center">
    <h1>@yield('title')</h1>
    @if( !empty( request('url')))
        <h5 class="text-danger">{{ request('url') }}</h5>
    @endif
</div>

@endsection
