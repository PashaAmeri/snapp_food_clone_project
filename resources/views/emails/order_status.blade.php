@component('mail::message')
# Order Status Updated

Dear {{ $user_name }}<br>
your order(Code: {{ $cart_id }}) status updated to {{ $status_name }}.

{{ $status_name }}: {{ $status_description }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
