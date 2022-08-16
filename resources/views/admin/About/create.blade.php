@extends('admin.main')
@section('main-content')
    <form method="post" action="{{ route('about.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter Home Title">
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInpuName">Description</label>
                <input name="description" class="form-control" placeholder="Enter subTitle" />
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                </div>
                @error('image')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <td class="text-center">
                <button type="button" class="btn btn-success plus"> <i class="fa fa-plus"></i> </button>
            </td>

            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>progress title</th>
                        <th>progress in percentage</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="ipapprove">
                    <div id="countVar" data-count="0"></div>
                    <tr data-id="1">
                        <th scope="row">1</th>
                        <td>
                            <input type="text" class="form-control" name="ipapprove[1][title]" placeholder="title"
                                autofocus>
                        </td>
                        <td>
                            <input type="number" class="form-control" name="ipapprove[1][percentage]"
                                placeholder="Enter Sub Title" autofocus>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-success plus"> <i class="fa fa-plus"></i> </button>
                        </td>
                    </tr>

                </tbody>
            </table>
            <br>

            <div class="card-footer">
                <button type="submit" value="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        $('body').on('click', '.plus', function() {
            var i = $('#ipapprove tr:last').data('id');
            i = i + 1;
            $('#ipapprove').append('<tr data-id="' + i + '">\
                                                                    <th scope="row">' + i + '</th>\
                    <td>\
                    <input placeholder="title" class="form-control" name="ipapprove[' +
                i +
                '][title]" type="text">\
                    </td>\
                    <td>\
                    <input type="number" placeholder="Enter Sub Title" class="form-control" name="ipapprove[' +
                i +
                '][percentage]" type="text">\
                    </td>\
                    <td class="text-center">\
                    <button type="button" class="btn btn-success plus"> <i class="fa fa-plus"></i> </button>\
                    <button type="button" class="btn btn-danger minus"> <i class="fa fa-minus"></i> </button>\
                    </td>\
                                                                    </tr>');
            // i++;
        });
        $('body').on('click', '.minus', function() {
            $(this).closest('tr').remove();
            // i--;
        });
    </script>
@endsection
