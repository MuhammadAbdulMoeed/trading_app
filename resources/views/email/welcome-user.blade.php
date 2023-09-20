@component('mail::message')
    Welcome to Trading App

    Name: {{ $mailData['name'] }}
    Email: {{ $mailData['email'] }}

    Thanks

    {{ config('app.name') }}
@endcomponent
