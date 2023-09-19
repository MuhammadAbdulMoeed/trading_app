@component('mail::message')
    Welcome to Trading App

    Name: {{ $mailData['name'] }}<br/>
    Email: {{ $mailData['email'] }}

    Thanks,<br/>
    {{ config('app.name') }}
@endcomponent
