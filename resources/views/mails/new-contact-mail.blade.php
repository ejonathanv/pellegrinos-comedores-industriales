@php
    $labels = __('website.quote.fields', [], 'es');
    $rows = [
        $labels['company'] => $lead['company'],
        $labels['name'] => $lead['name'],
        $labels['phone'] => $lead['phone'],
        $labels['email'] => $lead['email'],
        $labels['service'] => __('website.quote.services.' . $lead['service'], [], 'es'),
        $labels['people'] => __('website.quote.people_options.' . $lead['people'], [], 'es'),
        $labels['shifts'] => $lead['shifts'] ?? null,
        $labels['location'] => $lead['location'],
        $labels['kitchen'] => isset($lead['kitchen']) ? __('website.quote.kitchen_options.' . $lead['kitchen'], [], 'es') : null,
        $labels['event_date'] => $lead['event_date'] ?? null,
        $labels['message'] => $lead['message'] ?? null,
        'Página de origen' => \App\Support\Seo::url($lead['source_page'], $lead['locale']),
        'Idioma' => $lead['locale'] === 'es' ? 'Español' : 'Inglés',
    ];
@endphp
<x-mail::message>
# Nueva solicitud de cotización

Se recibió una solicitud desde el sitio web. Puedes responder directamente a este correo para contestarle a {{ $lead['name'] }}.

<x-mail::table>
| Dato | Valor |
|:-----|:------|
@foreach ($rows as $label => $value)
@continue(blank($value))
| {{ $label }} | {{ str_replace(["\r\n", "\n", '|'], [' ', ' ', '/'], $value) }} |
@endforeach
</x-mail::table>

Saludos,<br>
{{ config('app.name') }}
</x-mail::message>
