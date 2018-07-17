@extends('layouts.base')

@section('title')
    Domain {{ $domain->name }}
@endsection
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Domain</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{ $domain->name }}
                </td>
                <td>
                    {{ $domain->created_at }}
                </td>
                <td>
                    {{ $domain->updated_at }}
                </td>
            </tr>
        </tbody>
    </table>
@endsection