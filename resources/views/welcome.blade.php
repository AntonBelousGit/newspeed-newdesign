@extends('layouts.app')

@section('content')

    @foreach($blocks as $key=>$block)
        @includeWhen($block !==null,'components.galleries.' . $key. '.container')
    @endforeach

@endsection

@section('scripts')
{{--    <script src="{{ asset('js/script.js') }}"></script>--}}
@endsection
