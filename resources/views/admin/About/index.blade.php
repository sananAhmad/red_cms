@extends('admin.main')
@section('main-content')
    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th> Id</th>
                <th> title</th>
                <th> Description</th>
                <th> Image</th>
                <th> Progress</th>
                <th>delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($about))
                <tr>
                    <td>{{ $about->id }}
                    <td>{{ $about->title }}
                    </td>
                    <td>{{ $about->description }}
                    </td>
                    <td>
                        <img src="{{ asset($about->image_field) }}" width="70" alt="">
                    </td>
                    <td>
                        @if (isset($about->aboutProgress))
                            @foreach ($about->aboutProgress as $key => $value)
                                <span>{{ $value->title }}:&nbsp; %{{ $value->percentage }}</span><br>
                            @endforeach
                        @endif
                    </td>
                    <td> <a href="admin/about/{{ $about->id }}" class="btn btn-danger"
                            onclick="
                var result = confirm('Are you sure you want to delete this record?');
                if(result){
                    event.preventDefault();
                    document.getElementById('about-{{ $about->id }}').submit();
                }">
                            Delete
                        </a>
                        <form method="POST" id="about-{{ $about->id }}"
                            action="{{ route('about.destroy', [$about->id]) }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                        </form>
                    </td>
                    <td> <a href="{{ url('admin/about/' . $about->id . '/edit') }}">edit</a></td>
                </tr>
            @else
                <tr>no data found</tr>
            @endif
        </tbody>
    </table>
@endsection
