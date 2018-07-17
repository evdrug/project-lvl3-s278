@extends('layouts.base')

@section('title')
    List Domains
@endsection
@section('content')
    <div class="table-wrapper">
        <table class="table table-content">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Domain</th>
                <th scope="col">Code Response</th>
                <th scope="col">Content Length</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($domains as $key => $domain)
                <tr>
                    <td>
                        {{ $key + 1 }}
                    </td>
                    <td>
                        <a href="{{ route('domains.show', ['id' => $domain->id]) }}">{{ $domain->name }}</a>
                    </td>
                    <td>
                        {{ $domain->code_response }}
                    </td>
                    <td>
                        {{ $domain->content_length }}
                    </td>
                    <td>
                        {{ $domain->created_at }}
                    </td>
                    <td>
                        {{ $domain->updated_at }}
                    </td>
                    <td>
                        <form action="{{ route('domains.destroy', ['id' => $domain->id]) }}" method ="POST">
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

<div class="d-flex justify-content-center">
    {{ $domains->links() }}
</div>

@endsection