@php
    $service = __('website.quote.services.' . $lead['service']);
@endphp
@if ($locale === 'en')
<x-mail::message>
# Hello {{ $lead['name'] }}

Thank you for requesting a quote for **{{ $service }}** for {{ $lead['company'] }}. We will review your information and contact you soon to prepare your proposal.

If you need to add anything, write to us on [WhatsApp]({{ config('business.social.whatsapp') }}).

Best regards,<br>
{{ config('business.name') }}
</x-mail::message>
@else
<x-mail::message>
# Hola {{ $lead['name'] }}

Gracias por solicitar una cotización de **{{ $service }}** para {{ $lead['company'] }}. Revisaremos tu información y te contactaremos pronto para preparar tu propuesta.

Si necesitas agregar algo, escríbenos por [WhatsApp]({{ config('business.social.whatsapp') }}).

Saludos,<br>
{{ config('business.name') }}
</x-mail::message>
@endif
