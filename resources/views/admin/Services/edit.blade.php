@extends('admin.main')
@section('main-content')
    <form method="post" action="{{ url('admin/service/' . $service->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card-body">
            <div class="form-group">
                <label for="">Service Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter Home Title"
                    value="@if (isset($service)) {{ $service->title }} @endif">
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInpuName">Image Section</label>
                <input name="description" class="form-control" placeholder="Enter description"
                    value="@if (isset($service)) {{ $service->description }} @endif" />
                @error('description')
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
                        <th>Title</th>
                        <th>sub title</th>
                        <th>select image file</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="ipapprove">
                    <div id="countVar" data-count="0"></div>
                    @if (isset($service->images))
                        @foreach ($service->images as $i => $val)
                            <tr data-id="1">
                                <th scope="row">1</th>
                                <td>
                                    <input type="text" class="form-control" name="ipapprove[{{ $i }}][title]"
                                        placeholder="title" autofocus value="{{ $val->title }}">
                                    <input type="hidden" class="form-control"
                                        name="ipapprove[{{ $i }}][images_id]" value="{{ $val->id }}">
                                </td>
                                <td>
                                    <input type="text" class="form-control"
                                        name="ipapprove[{{ $i }}][subTitle]" placeholder="Enter Sub Title"
                                        autofocus value="{{ $val->subTitle }}">
                                </td>
                                <td>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                name="ipapprove[{{ $i }}][image]">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <img src="{{ asset($val->image) }}" width="70" alt="">
                                            <input type="hidden" value="{{ $val->image }}"
                                                name="ipapprove[{{ $i }}][hidden_image]" />
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-danger minus"> <i class="fa fa-minus"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif

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
            i = i + 101;
            $('#ipapprove').append('<tr data-id="' + i + '">\
                                                <th scope="row">' + i +
                '</th>\
                                                <td>\
                                                <input placeholder="title" class="form-control" name="ipapprove[' +
                i +
                '][title]" type="text">\
                                                </td>\
                                                <td>\
                                                <input placeholder="Enter Sub Title" class="form-control" name="ipapprove[' +
                i +
                '][subTitle]" type="text">\
                                                </td>\
                                                <td>\
                                                <div class="input-group">\
                                                <div class="custom-file">\
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="ipapprove[' +
                i + '][image]">\
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
