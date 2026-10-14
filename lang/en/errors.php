<?php

return [
    'back_home' => 'Back to home',
    'contact' => 'Contact us',

    'codes' => [
        401 => [
            'title' => 'Unauthorized',
            'message' => 'You need to sign in to view this page.',
        ],
        402 => [
            'title' => 'Payment required',
            'message' => 'This page requires a payment to be displayed.',
        ],
        403 => [
            'title' => 'Access denied',
            'message' => 'You do not have permission to view this page.',
        ],
        404 => [
            'title' => 'Page not found',
            'message' => 'The page you are looking for does not exist or has moved. Go back to the home page or explore our services.',
        ],
        419 => [
            'title' => 'Page expired',
            'message' => 'Your session expired due to inactivity. Reload the page and try again.',
        ],
        429 => [
            'title' => 'Too many requests',
            'message' => 'We received too many requests in a short time. Please wait a few minutes and try again.',
        ],
        500 => [
            'title' => 'Server error',
            'message' => 'Something unexpected happened. We are working on it; please try again in a few minutes.',
        ],
        503 => [
            'title' => 'Under maintenance',
            'message' => 'We are improving our website. Please come back in a few minutes.',
        ],
        '4xx' => [
            'title' => 'We could not process your request',
            'message' => 'Something went wrong with your request. Please go back to the home page.',
        ],
        '5xx' => [
            'title' => 'Server error',
            'message' => 'Something unexpected happened. Please try again in a few minutes.',
        ],
    ],
];
