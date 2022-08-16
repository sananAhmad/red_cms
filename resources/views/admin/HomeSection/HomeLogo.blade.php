@extends('admin.main')
@section('main-content')
    <form method="post"
        action="@if (isset($HomeLogo)) {{ url('admin/home-logo/' . $HomeLogo->id) }}   @else    {{ route('home-logo.store') }} @endif"
        enctype="multipart/form-data">
        @csrf
        @if (isset($HomeLogo))
            @method('PATCH')
        @endif
        <div class="card-body">
            @if (isset($HomeLogo))
                <div>
                    <label for="">Home Logo Image</label>
                    <img src="{{ asset($HomeLogo->logo) }}" width="120" height="auto" alt="" name="hidden_image">
                    <input type="hidden" value="{{ $HomeLogo->logo }}" name="hidden_imag" />
                    <input type="hidden" value={{ $HomeLogo }} name="id" />
                </div>
            @endif
            <br>
            <div class="form-group">
                <label for="exampleInputFile">Choose Home Logo Image</label>
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

            @if (isset($HomeLogo))
                <div class="card-footer">
                    <button type="submit" value="submit" id="submit" name="submit"
                        class="btn btn-primary">Update</button>
                </div>
            @else
                <div class="card-footer">
                    <button type="submit" value="submit" id="submit" name="submit"
                        class="btn btn-primary">Submit</button>
                </div>
            @endif
    </form>
@endsection
