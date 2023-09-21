@component('mail::message')
    Welcome to {{ config('app.name') }}

    Name: {{ $mailData['name'] }}
    Email: {{ $mailData['email'] }}

    Visit site here <a href="http://phplaravel-1098145-3891736.cloudwaysapps.com/">{{ config('app.name') }} </a>

    Thanks

    Team {{ config('app.name') }}
@endcomponent
