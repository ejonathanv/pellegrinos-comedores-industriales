<?php

return [
    'back_home' => 'Volver al inicio',
    'contact' => 'Contáctanos',

    'codes' => [
        401 => [
            'title' => 'Acceso no autorizado',
            'message' => 'Necesitas iniciar sesión para ver esta página.',
        ],
        402 => [
            'title' => 'Pago requerido',
            'message' => 'Esta página requiere un pago para poder mostrarse.',
        ],
        403 => [
            'title' => 'Acceso restringido',
            'message' => 'No tienes permiso para ver esta página.',
        ],
        404 => [
            'title' => 'Página no encontrada',
            'message' => 'La página que buscas no existe o cambió de dirección. Te invitamos a volver al inicio o a conocer nuestros servicios.',
        ],
        419 => [
            'title' => 'La página expiró',
            'message' => 'Tu sesión expiró por inactividad. Recarga la página e inténtalo de nuevo.',
        ],
        429 => [
            'title' => 'Demasiadas solicitudes',
            'message' => 'Recibimos muchas solicitudes en poco tiempo. Espera unos minutos e inténtalo de nuevo.',
        ],
        500 => [
            'title' => 'Error del servidor',
            'message' => 'Ocurrió un problema inesperado. Estamos trabajando para resolverlo; inténtalo de nuevo en unos minutos.',
        ],
        503 => [
            'title' => 'Sitio en mantenimiento',
            'message' => 'Estamos realizando mejoras en el sitio. Vuelve en unos minutos.',
        ],
        '4xx' => [
            'title' => 'No pudimos procesar tu solicitud',
            'message' => 'Algo salió mal con tu solicitud. Te invitamos a volver al inicio.',
        ],
        '5xx' => [
            'title' => 'Error del servidor',
            'message' => 'Ocurrió un problema inesperado. Inténtalo de nuevo en unos minutos.',
        ],
    ],
];
