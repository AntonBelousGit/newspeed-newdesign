@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('/css/style.css')}}">
    <link rel="preload" href="{{ asset('/css/style.min.css')}}" as="style">
@endsection

@section('scripts')
    <script src="{{ asset('/js/script.min.js')}}"></script>
@endsection

@section('content')

    @forelse($wishlist as $item)
        <p>{{$item->products->name}}</p>
    @empty
        <h2>There are no products in your Wishlist</h2>
    @endforelse
@endsection
