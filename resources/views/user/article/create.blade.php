@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('userArticle.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="" class="form-control">
    </div>
    <category-selector></category-selector>
    <div class="form-group">
        <label for="">Chon dia chi</label>
        <location-selector></location-selector>
    </div>
    <image-uploader></image-uploader>
    <div class="form-group">
        <label for="title">Valid_date</label>
        <input type="date" name="valid_date" id="" class="form-control" min="{{\Carbon\Carbon::now()->toDateString()}}">
    </div>
    <div class="form-group">
        <label for="title">Content</label>
        <textarea name="content" id="" rows="20" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>

@endsection
