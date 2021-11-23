@component('mail::message')
# New Feedback

**{{$feedbackInfo['name']}}** give feedback on Your Post.

@component('mail::button', ['url' => $feedbackInfo['url']])
See On Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent