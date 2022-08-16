@extends('admin.main')
@section('css')
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('main-content')
    <form method="post" action="{{ url('admin/recent-work/' . $RecentWork->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card-body">
            <div class="form-group">
                <label for="">Home Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter Home Title"
                    value="{{ $RecentWork->title }}">
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInpuName">Home subTitle</label>
                <input name="subTitle" class="form-control" placeholder="Enter Home subTitle"
                    value="{{ $RecentWork->subTitle }}" />
                @error('subTitle')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div>
                <label for="">Image</label>
                <img src="{{ asset($RecentWork->background_image) }}" width="120" height="auto" alt="">
                <input type="hidden" value="{{ $RecentWork->background_image }}" name="hidden_imag" />
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputFile">Choose New Background Image</label>
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
            <br>
            <div class="form-group">
                <select role="select" id="myoption" name="type">
                    <option value="">Please select an option </option>
                    <option value="digital" @if ($RecentWork->type == 'digital') {{ 'selected' }} @endif>Digital </option>
                    <option value="branding" @if ($RecentWork->type == 'branding') {{ 'selected' }} @endif>Branding
                    </option>
                    <option value="marketing" @if ($RecentWork->type == 'marketing') {{ 'selected' }} @endif> Marketing
                    </option>
                    <option value="video" @if ($RecentWork->type == 'video') {{ 'selected' }} @endif>Video </option>
                </select>
                @error('type')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="card-footer">
                <button type="submit" value="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
@endsection
@section('script')
    <script src="{{ asset('backend/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#myoption").select2({
                allowClear: true,
                width: '300px',
                height: '34px',
                placeholder: 'Please select an option'

            });
        });
    </script>
@endsection
