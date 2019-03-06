@extends('layouts.app')

@section('body')
    <div class="container mx-auto pt-12">
        <div class="text-3xl mb-4 text-center">
            Find a restaurant!
        </div>

        <restaurant-map
            :restaurants="{{ json_encode($restaurants) }}"
        ></restaurant-map>
    </div>
@endsection
