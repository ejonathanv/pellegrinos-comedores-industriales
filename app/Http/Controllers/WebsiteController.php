<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\NewContactMail;
use App\Support\Seo;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

class WebsiteController extends Controller
{
    public function index(){
        return view('website.index');
    }

    public function contactToPellegrinos(ContactRequest $request){
        $homeUrl = Seo::url('home') . '#contact';

        $validate = validator($request->all(), [
            'g-recaptcha-response' => 'required|captcha'
        ]);

        if ($validate->fails()) {
            return redirect($homeUrl)
                ->with('error', 'Captcha is required');
        }

        // Vamos a enviar un correo para agracer al usuario
        $email = $request->email;
        Mail::to($email)->send(new ContactMail($request));

        // Vamos a enviar un mensaje a los administradores del sitio
        $adminEmail = env('MAIL_CONTACT_ADDRESS');
        Mail::to($adminEmail)->send(new NewContactMail($request));

        $message = app()->getLocale() === 'es'
            ? 'Tu mensaje ha sido enviado con éxito'
            : 'Your message has been sent successfully';

        return redirect($homeUrl)
            ->with('success', $message)
            ->with('lead_submitted', true);
    }
}
