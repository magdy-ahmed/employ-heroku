@extends('layouts.app')
@section('navbar')
    @include('layouts.components.navbarAdmin')
@endsection
@section('content')
    @yield('content',View::make('admin.components.home'))
@endsection
