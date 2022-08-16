@extends('admin.main')
@section('main-content')
    <form method="post" action="{{ route('client-section.store') }}" enctype="multipart/form-data">
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
                <label for="exampleInpuName">Sub title</label>
                <input name="subTitle" class="form-control" placeholder="Enter subTitle" />
                @error('subTitle')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <td class="text-center">
                <button type="button" class="btn btn-success plus"> <i class="fa fa-plus"></i> </button>
            </td>

            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>client name</th>
                        <th>review</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="ipapprove">
                    <div id="countVar" data-count="0"></div>
                    <tr data-id="1">
                        <th scope="row">1</th>
                        <td>
                            <input type="text" class="form-control" name="ipapprove[1][name]" placeholder="title"
                                autofocus>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="ipapprove[1][review]"
                                placeholder="Enter Sub Title" autofocus>
                        </td>
                        <td>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="ipapprove[1][image]">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
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
                            <input placeholder="title" class="form-control" name="ipapprove[' + i + '][name]" type="text">\
                        </td>\
                        <td>\
                            <input placeholder="Enter Sub Title" class="form-control" name="ipapprove[' + i +
        '][review]" type="text">\
                        </td>\
                        <td>\
                            <div class="input-group">\
                                <div class="custom-file">\
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="ipapprove[' + i +
        '][image]">\
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>\
                                </div>\
                            </div>\
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
