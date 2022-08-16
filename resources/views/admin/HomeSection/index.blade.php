@extends('admin.main')
@section('main-content')
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th> Id</th>
                <th> title</th>
                <th> SubTitle</th>
                <th>Image</th>
                <th>delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($HomeSection))
                @foreach ($HomeSection as $key => $item)
                    <tr>

                        <td>{{ ++$key }}
                        <td>{{ $item->title }}
                        </td>
                        <td>{{ $item->subTitle }}
                        </td>
                        <td>
                            <img src="{{ asset($item->background_image) }}" width="70" alt="">
                        </td>
                        <td> <a href="admin/home-section/{{ $item->id }}" class="btn btn-danger"
                                onclick="
                var result = confirm('Are you sure you want to delete this record?');

                if(result){
                    event.preventDefault();
                    document.getElementById('delete-form-{{ $item->id }}').submit();
                }">
                                Delete
                            </a>

                            <form method="POST" id="delete-form-{{ $item->id }}"
                                action="{{ route('home-section.destroy', [$item->id]) }}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                            </form>
                        </td>
                        <td> <a href="{{ url('admin/home-section/' . $item->id . '/edit') }}">edit</a></td>
                    </tr>
                @endforeach
            @else
                <tr>no data found</tr>
            @endif


        </tbody>
    </table>
@endsection
