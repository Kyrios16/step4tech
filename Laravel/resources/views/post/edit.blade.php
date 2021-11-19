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
            <img src="{{ URL::to('/') }}/images/profile/{{ $user->profile_img }}" class="user-profile" alt="Profile">
            <a class="user-name">{{$user->name}}</a>
        </div>
        <form class="create-form" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" id="title" name="title" placeholder="Post Title" class="title @error('title') is-invalid @enderror" value="{{ $post->title }}">
            @error('title')
            <span class="form-error">
                <div>{{ $message }}</div>
            </span>
            @enderror
            <label for="categories" class="label">Select Post Category</label>
            <select multiple="multiple" id="categories" name="category[]" class="categories @error('category') is-invalid @enderror">

                @foreach ($categories as $category)
                @php($flag=false)
                @foreach($postCategory as $selectedCategory)
                @if($category->id == $selectedCategory->category_id)
                @php($flag=true)
                @endif
                @endforeach
                @if($flag == true)
                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                @else
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endif
                @endforeach
            </select>
            @error('category')
            <span class="form-error">
                <div>{{ $message }}</div>
            </span>
            @enderror

            <!-- <input type="file" name="image" placeholder="Choose image" id="image"> -->
            <div class="preview-image-container">
                <img id="preview-image-before-upload" class="preview-img" src="{{ URL::to('/') }}/images/posts/{{ $post->photo }}" alt="preview image">
            </div>
            <label class="uploadLabel">
                <i class="fas fa-file-upload"></i>

                <input type="file" class="uploadButton @error('title') is-invalid @enderror" name="photo" id="image" placeholder="Upload Image" src="{{ URL::to('/') }}/imges/posts/{{ $post->photo }}" value="{{ URL::to('/') }}/img/posts/{{ $post->photo }}" />
                Upload Image
            </label>
            @error('photo')
            <span class=" form-error">
                <div>{{ $message }}</div>
            </span>
            @enderror
            <!-- <label for="content" class="label">Enter Post Details</label> -->
            <textarea name="content" rows="8" cols="35" class="post-detail @error('title') is-invalid @enderror" placeholder="Enter Post Details Here..." value="{{ $post->content }}">{{ $post->content }}</textarea>
            @error('content')
            <span class=" form-error">
                <div>{{ $message }}</div>
            </span>
            @enderror
            <div class="submit-btn">
                <button type="submit" class="submit">Submit</button>
                <a class="cancel" href="/user/view/{{$user->id}}">Cancel</a>
            </div>
        </form>

    </div>
</div>
@endsection