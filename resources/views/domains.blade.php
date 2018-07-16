@extends('layouts.base')

@section('title')
    List Domains
@endsection
@section('content')
    @foreach($domains as $domain)
        <p>This is domain {{ $domain->id }}</p>
        <p>This is domain {{ $domain->name }}</p>
        <p>This is domain {{ $domain->created_at }}</p>
        <p>This is domain {{ $domain->updated_at }}</p>
    @endforeach
@endsection