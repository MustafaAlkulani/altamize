@component('mail::message')
    # Introduction
    مرحبا  {{$data['contact']->contact_name}}
   هذه الرسالة بخصوص موضوع
    {{$data['contact']->subject}}
<hr>


    {{$data['data']['raplay']}}

    <br>
    {{$data['data']['created_at']}}
    <br>
    {{ config('app.name') }}
@endcomponent
