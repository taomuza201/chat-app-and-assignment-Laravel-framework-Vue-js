@extends('layouts.appchat')

@section('content')
    <chat :user="{{ auth()->user() }}"></chat>
@endsection
