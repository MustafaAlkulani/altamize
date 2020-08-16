@component('mail::message')
# Introduction
Welcome {{$data['data']->name}}
The body of your message.

@component('mail::button', ['url' => aurl('reset/password/'.$data['token'])])
Click Here TO Reset Your Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
