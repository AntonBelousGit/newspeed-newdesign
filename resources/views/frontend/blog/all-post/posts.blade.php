@extends('layouts.app')
@section('style')
@endsection
@section('script')
@endsection
@section('content')
<main>
    <div class="baners bg-Cw">
        <div class="container">
            <ul class="bread-dots">
                <li>
                    <a class="text-r" href=""><i class="text-r icon-home"></i></a>
                </li>
                <li>
                    <i class="text-r icon-arrow"></i>
                    <a class="text-r" href="">Блог</a>
                </li>
            </ul>
        </div>
        <div class="container">
            <h2 class="title-i">Блог</h2>
            <div class="pageBlog">
                <ul class="p-blog">
                    @each('frontend.blog.all-post.includes.item', $blogs, 'item')
                </ul>
                @include('frontend.blog.components.sidebar.sidebar')
            </div>
        </div>
    </div>
</main>
@endsection