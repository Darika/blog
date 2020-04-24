@extends('layouts.app')
@section('content')
    <form-answers data-csrf="{{csrf_token()}}"></form-answers>
@endsection