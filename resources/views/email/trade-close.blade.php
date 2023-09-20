@component('mail::message')

    Dear {{ $mailData['name'] }},

    Your Trade has successfully completed.

    Your Current RanK in trading : {{$mailData['position']}}.

    Thanks

    {{ config('app.name') }}
@endcomponent
