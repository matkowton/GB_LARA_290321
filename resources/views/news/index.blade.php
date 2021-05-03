@extends('layouts.main')

@section('title')
    Категории
@endsection

@section('content')
    @foreach($categories as $category)
        @php
            $url = route('news::list', ['categoryId' => $category->id])
        @endphp

        <div>
            <a href='{{$url}}'>{{$category->name}}</a>
        </div>
    @endforeach
@endsection
