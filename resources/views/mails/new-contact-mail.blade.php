<x-mail::message>
# Hola equipo de {{ config('app.name') }}

Se ha recibido un nuevo mensaje de contacto. A continuación se detallan los datos del contacto:

- Nombre: {{ $request->firstName }} {{ $request->lastName }}
- Correo electrónico: {{ $request->email }}
- Teléfono: {{ $request->phone }}
- Asunto: {{ $request->subject }}
- Mensaje: {{ $request->message }}

¡Revisa el mensaje y responde lo antes posible!

Saludos,<br>
{{ config('app.name') }}
</x-mail::message>
