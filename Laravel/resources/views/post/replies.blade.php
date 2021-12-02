<div class="reply-container clearfix" id="replycomment-{{ $feedback->id }}">
    @foreach($replies as $reply)
    @if($reply->feedback_id == $feedback->id)
    <div class="feedback-container clearfix">
        <div class="upload-user clearfix feedback-upload-user">
            <a href="#" class="upload-user-info">
                <img class="profile-img" class="preview-img" src="{{ URL::to('/') }}/images/profile/{{ $reply->profile_img }}" alt="user image">
                <p class="upload-user-name">{{$reply->name}}</p>
            </a>
            <p class="feedback-time">{{$reply->time}}</p>
        </div>
        <div class="feedback-content">{{$reply->reply_content}}</div>

        @if($reply->reply_photo != NULL)
        <div class="feedback-img-container">
            <img class="feedback-img" class="feedback-img" src="{{ URL::to('/') }}/images/replies/{{ $reply->reply_photo }}" alt=" feedback image">
        </div>
        @endif

        @auth
        @if(Auth::user()->id == $reply->created_user_id)
        <div class="action">
            <button class="icon-btn-warning" onClick="show({{ $reply->replyId }})"><i class="fas fa-edit"></i></button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <div id="page" class="edit-reply"></div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="delete-icn icon-btn-danger" onclick="deleteReply({{ $reply->replyId }})"><i class="fas fa-trash-alt"></i></button>
        </div>
        @endif
        @endauth
    </div>
    @endif
    @endforeach

    @auth
    <form class="reply-txtfield" method="POST" action="/post/{{ $post->id }}/feedback/{{ $feedback->id }}/reply" enctype="multipart/form-data">
        @csrf
        <div class=" reply-preview-image-container" id="reply-Img">
            <img id="reply-preview-img" class="reply-preview-img" src="{{ asset('images/image_not_found.gif') }}" alt="preview image">
        </div>
        <textarea name="reply_content" onkeyup="autoheight(this)" rows="1" class="input-feedback-content @error('reply_content') is-invalid @enderror" placeholder="Enter Your reply..."></textarea>
        <label class="uploadLabel">
            <i class="fas fa-folder-plus"></i>
            <input type="file" onchange="showPreview(this,{{$feedback->id}});" class="uploadButton @error('reply_photo') is-invalid @enderror" name="reply_photo" id="image" placeholder="Upload Image" />
        </label>
        <button class="reply-send" type="submit">
            <i class="fas fa-paper-plane"></i>
        </button>

        @error('reply_content')
        <span class="form-error">
            <div>{{ $message }}</div>
        </span>
        @enderror
        @error('reply_photo')
        <span class="form-error">
            <div>{{ $message }}</div>
        </span>
        @enderror
    </form>
    @endauth
</div>