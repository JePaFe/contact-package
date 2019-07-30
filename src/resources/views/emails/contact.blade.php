@component('mail::message')
# Contact

This is new query from {{$name}}
<br>
Message:
{{$message}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
