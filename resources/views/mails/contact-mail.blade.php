
@if($locale == 'en')
<x-mail::message>
# Hello {{ $request->firstName }}

Thank you for contacting us. We will respond to your message as soon as possible.

Greetings,<br>
{{ config('app.name') }}
</x-mail::message>
@elseif($locale == 'es')
<x-mail::message>
# Hola {{ $request->firstName }}

Gracias por contactarnos. Responderemos a tu mensaje lo antes posible.

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
@endif
