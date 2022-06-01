@extends('layouts.dashAdmin')

@section('title')
    Dashboard
@endsection

@section('content')
    <h3>This is Dashboard Administrator.</h3>
    <a href="{{ route('admin.logout') }}" >logout</a>
@endsection