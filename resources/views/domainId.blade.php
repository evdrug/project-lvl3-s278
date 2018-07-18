@extends('layouts.base')

@section('title')
    Domain {{ $domain->name }}
@endsection
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Domain</th>
            <th scope="col">Code Response</th>
            <th scope="col">Content Length</th>
            <th scope="col">Header</th>
            <th scope="col">Keywords</th>
            <th scope="col">Description</th>
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
                    {{ $domain->code_response }}
                </td>
                <td>
                    {{ $domain->content_length }}
                </td>
                <td>
                    {{ $domain->header }}
                </td>
                <td>
                    {{ $domain->keywords }}
                </td>
                <td>
                    {{ $domain->description }}
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