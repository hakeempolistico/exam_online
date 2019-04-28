@extends('layouts.template')

@section('title')
    <title>Dashboard | Online Exam</title>
@endsection


@section('content')
    @if(!Auth::guest() && Auth::user()->user_type == 'admin')
        @include('admin/dashboard')
    @elseif(!Auth::guest() && Auth::user()->user_type == 'student')
        @include('student/dashboard')
    @endif
@endsection
