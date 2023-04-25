@component('mail::message')
    # Hi {{$email}},
    Your Personal ID is : {{$personal_id}}

    @if(!is_null($api_key))
        Your API KEY is : {{$api_key}}
    @endif
    Password: {{ $password }}

    @component('mail::button', [
        'url' => url('/')
    ])
        Accept
    @endcomponent

    Thanks,
    {{ config('app.name') }}
@endcomponent
