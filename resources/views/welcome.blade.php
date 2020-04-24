@extends('layouts.app')
@section('content')
        <h1>@lang('main.welcome')</h1>
        <a href="{{route('chat', ['type' => 'bot'])}}"><button type="button" class="btn-success" name="chatWithBot" id="chatWithBot">@lang('main.chatWithBot')</button></a>
        <a href="{{route('chat', ['type' => 'person'])}}"><button type="button" class="btn-success" name="chatWithPerson" id="chatWithPerson">@lang('main.chatWithPerson')</button></a>
@endsection

