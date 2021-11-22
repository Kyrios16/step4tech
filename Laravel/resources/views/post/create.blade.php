@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/post/post-create.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/post/post-create.js') }}"></script>
<script src="{{ asset('js/post/post-create-markdown.js') }}"></script>
@endsection

@section('content')

<div class="postCreate-container">
    <div class="postCreate">
        <div class="user-info">
            <img src="{{ URL::to('/') }}/images/profile/{{ $user->profile_img }}" class="user-profile" alt="Profile">
            <a class="user-name">{{$user->name}}</a>
        </div>
        <form class="create-form" method="POST" action="{{ route('create.post') }}" enctype="multipart/form-data">
            @csrf
            <input type="text" id="title" name="title" placeholder="Post Title" class="title @error('title') is-invalid @enderror">
            @error('title')
            <span class="form-error">
                <div>{{ $message }}</div>
            </span>
            @enderror
            <label for="categories" class="label">Select Post Category</label>
            <select multiple="multiple" id="categories" name="category[]" class="categories @error('category') is-invalid @enderror">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category')
            <span class="form-error">
                <div>{{ $message }}</div>
            </span>
            @enderror

            <!-- <input type="file" name="image" placeholder="Choose image" id="image"> -->
            <div class="preview-image-container">
                <img id="preview-image-before-upload" class="preview-img" src="{{ asset('images/image_not_found.gif') }}" alt="preview image">
            </div>
            <label class="uploadLabel">
                <i class="fas fa-file-upload"></i>

                <input type="file" class="uploadButton @error('title') is-invalid @enderror" name="photo" id="image" placeholder="Upload Image" />
                Upload Image
            </label>
            @error('photo')
            <span class="form-error">
                <div>{{ $message }}</div>
            </span>
            @enderror
            <!-- <label for="content" class="label">Enter Post Details</label> -->
            <div id="editor MyID"></div>
            <textarea name="content" id="post-content" rows="8" cols="35" class="post-detail @error('title') is-invalid @enderror" placeholder="Enter Post Details Here..."></textarea>
            @error('content')
            <span class="form-error">
                <div>{{ $message }}</div>
            </span>
            @enderror
            <div class="submit-btn">
                <button type="submit" class="submit">Submit</button>
                <a class="cancel" href="/">Cancel</a>
            </div>
        </form>
        <script src="{{ asset('js/post/post-create-markdown.js') }}"></script>
    </div>
</div>
@endsection