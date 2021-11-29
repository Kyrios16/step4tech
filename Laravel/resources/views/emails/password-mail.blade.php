@component('mail::message')
# Password Changed Confirmation

**{{$data['name']}}**, your password successfully changed.<br>
Please Login with your **New Password**.

@component('mail::button', ['url' => $data['url']])
Login
@endcomponent

Regards,<br>
{{ config('app.name') }}

<hr><br>

If you're having trouble clicking the "Login" button, copy and paste the URL below into your web browser :
<a href="http://127.0.0.1:8000/login">http://127.0.0.1:8000/login</a>
@endcomponent