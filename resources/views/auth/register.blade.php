@extends('layout.master')
@section('title', __('titles.registration'))
@section('app')
    <div id="tortle-registratin-form" class="w-1/2 flex align-middle">
        <tortle-register dusk="tortle-register"></tortle-register>
    </div>
@stop
