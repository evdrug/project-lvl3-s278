@extends('layouts.base')

@section('title')
    Analyzer seo
@endsection

@section('content')

    <div class="jumbotron">
        @include('form/form')
        @if (isset($errors) && count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors as $error)
                        <li> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection