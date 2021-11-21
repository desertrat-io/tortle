@extends('layout.master')
@section('title', __('titles.registration'))
@section('app')
    <div id="tortle-registration-form" class="w-1/2 flex align-middle">
        <tortle-register dusk="tortle-register" csrf="{{ csrf_token() }}"></tortle-register>
    </div>
@stop
