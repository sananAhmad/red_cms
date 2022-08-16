@extends('admin.main')
@section('main-content')
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th> Id</th>
                <th> title</th>
                <th> Description</th>
                <th>Image</th>
                <th>delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($service))
                <tr>
                    <td>{{ $service->id }}
                    <td>{{ $service->title }}
                    </td>
                    <td>{{ $service->description }}
                    </td>
                    <td>
                        @foreach ($service->images as $key => $value)
                            <img src="{{ asset($value->image) }}" width="70" alt="">
                        @endforeach
                    <td> <a href="admin/service/{{ $service->id }}" class="btn btn-danger"
                            onclick="
                var result = confirm('Are you sure you want to delete this record?');

                if(result){
                    event.preventDefault();
                    document.getElementById('delete-form-{{ $service->id }}').submit();
                }">
                            Delete
                        </a>

                        <form method="POST" id="delete-form-{{ $service->id }}"
                            action="{{ route('service.destroy', [$service->id]) }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                        </form>
                    </td>
                    <td> <a href="{{ url('admin/service/' . $service->id . '/edit') }}">edit</a></td>
                </tr>
            @else
                <tr>no data found</tr>
            @endif
        </tbody>
    </table>
@endsection
