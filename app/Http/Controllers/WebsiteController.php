<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\NewContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

class WebsiteController extends Controller
{
    public function index(){
        return view('website.index');
    }

    public function contact(ContactRequest $request){
        
        // Vamos a enviar un correo para agracer al usuario
        $email = $request->email;
        Mail::to($email)->send(new ContactMail($request));

        // Vamos a enviar un mensaje a los administradores del sitio
        $adminEmail = env('MAIL_CONTACT_ADDRESS');
        Mail::to($adminEmail)->send(new NewContactMail($request));

        // Vamos a redirigir al usuario a la página de inicio con un mensaje de éxito

        $locale = session()->get('locale');
        $message = '';
        if($locale == 'es'){
            $message = 'Tu mensaje ha sido enviado con éxito';
        }else{
            $message = 'Your message has been sent successfully';
        }

        return redirect()
            ->route('website.index')
            ->with('success', $message);

    }
}
