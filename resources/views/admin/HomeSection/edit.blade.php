@extends('admin.main')
@section('main-content')
    <form method="post" action="{{ url('admin/home-section/' . $HomeSection->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card-body">
            <div class="form-group">
                <label for="">Home Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter Home Title"
                    value="{{ $HomeSection->title }}">
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInpuName">Home subTitle</label>
                <input name="subTitle" class="form-control" placeholder="Enter Home subTitle"
                    value="{{ $HomeSection->subTitle }}" />
                @error('subTitle')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div>
                <label for="">Background Image</label>
                <img src="{{ asset($HomeSection->background_image) }}" width="120" height="auto" alt="">
                <input type="hidden" value="{{ $HomeSection->background_image }}" name="hidden_imag" />
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

            <div class="card-footer">
                <button type="submit" value="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
@endsection
