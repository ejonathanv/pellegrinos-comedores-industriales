<?php

return [

    // Necesitamos las validaciones para "required, string, max y email"

    'required' => 'El campo :attribute es obligatorio.',
    'string' => 'El campo :attribute debe ser una cadena de texto.',
    'max' => [
        'string' => 'El campo :attribute no debe exceder los :max caracteres.',
        'numeric' => 'El campo :attribute no debe ser mayor a :max.',
    ],
    'min' => [
        'numeric' => 'El campo :attribute debe ser al menos :min.',
    ],
    'email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
    'integer' => 'El campo :attribute debe ser un número entero.',
    'in' => 'El valor seleccionado en :attribute no es válido.',
    'date' => 'El campo :attribute debe ser una fecha válida.',
    'after_or_equal' => 'El campo :attribute debe ser una fecha igual o posterior a hoy.',
    'required_if' => 'El campo :attribute es obligatorio para el servicio seleccionado.',
    'captcha' => 'Por favor verifica que no eres un robot.',

];