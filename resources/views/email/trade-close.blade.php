@component('mail::message')
    Dear {{ $mailData['name'] }},<br/>

    Your Trade has successfully completed.
    <br/>
    Your Current RanK in trading 1/100.

    Thanks,<br/>
    {{ config('app.name') }}
@endcomponent
