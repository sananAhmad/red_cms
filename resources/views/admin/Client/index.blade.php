@extends('admin.main')
@section('main-content')
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th> Id</th>
                <th> title</th>
                <th> Description</th>
                <th>Client Name</th>
                <th>Client Image</th>
                <th>delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($client))
                <tr>
                    <td>{{ $client->id }}
                    <td>{{ $client->title }}
                    </td>
                    <td>{{ $client->subTitle }}
                    </td>
                    <td>
                        @foreach ($client->clientReview as $key => $value)
                            <span>{{ $value->name }}</span><br>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($client->clientReview as $key => $value)
                            <img src="{{ asset($value->image) }}" width="70" alt="">
                        @endforeach
                    <td>
                    <td> <a href="admin/client-section/{{ $client->id }}" class="btn btn-danger"
                            onclick="
                var result = confirm('Are you sure you want to delete this record?');

                if(result){
                    event.preventDefault();
                    document.getElementById('delete-form-{{ $client->id }}').submit();
                }">
                            Delete
                        </a>

                        <form method="POST" id="delete-form-{{ $client->id }}"
                            action="{{ route('client-section.destroy', [$client->id]) }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                        </form>
                    </td>
                    <td> <a href="{{ url('admin/client-section/' . $client->id . '/edit') }}">edit</a></td>
                </tr>
            @else
                <tr>no data found</tr>
            @endif
        </tbody>
    </table>
@endsection
