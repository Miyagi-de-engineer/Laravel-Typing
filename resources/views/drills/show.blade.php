@extends('layouts.app')

@section('content')
    <div id="app">
        <example-component
        title="{{ __('Practice').'「'. $drill->title .'」'}}"
        :drill="{{ $drill }}"
        category-name="{{ $drill->category_name }}"></example-component>
    </div>
@endsection
