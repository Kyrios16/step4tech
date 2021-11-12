@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/post/post-create.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">
@endsection

@section('script')
<script src="{{ asset('js/post/post-create.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
@endsection

@section('content')
<div class="postCreate-container">
    <div class="postCreate">
        <div class="user-info">
            <img src="{{ asset('img/img_profile_skeleton.png') }}" class="user-profile" alt="Profile">
            <a class="user-name">User Name</a>
        </div>
        <form class="create-form">
            <input type="text" id="title" name="title" placeholder="Post Title" class="title">
            <label for="categories" class="label">Select Post Category</label>
            <select multiple="multiple" id="categories" name="cat[]" class="categories">
                <option value="1">Item 1</option>
                <option value="2">item 2</option>
                <option value="3">item 3</option>
                <option value="4">item 4</option>
            </select>

            <!-- <input type="file" name="image" placeholder="Choose image" id="image"> -->
            <div class="preview-image-container">
                <img id="preview-image-before-upload" class="preview-img" src="{{ asset('img/image_not_found.gif') }}" alt="preview image">
            </div>
            <label class="uploadLabel">
                <i class="fas fa-file-upload"></i>

                <input type="file" class="uploadButton" name="image" id="image" placeholder="Upload Image" />
                Upload Image
            </label>
            <!-- <label for="content" class="label">Enter Post Details</label> -->
            <textarea name="content" rows="8" cols="35" class="post-detail" placeholder="Enter Post Detials Here"></textarea>
            <div class="submit-btn">
                <a type="submit" class="submit">Submit</a>
                <a type="submit" class="cancel">Cancel</a>
            </div>
        </form>

    </div>
</div>
@endsection