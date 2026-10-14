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

    public function industrialDining(){
        return view('website.industrial-dining');
    }

    public function contact(){
        return view('website.contact');
    }

    public function contactToPellegrinos(ContactRequest $request){
        $lead = collect($request->validated())
            ->except('g-recaptcha-response')
            ->put('source_page', $request->validated('source_page') ?? 'home')
            ->put('locale', app()->getLocale())
            ->all();

        // Aviso al equipo comercial con los datos de la solicitud
        Mail::to(config('mail.contact_address'))->send(new NewContactMail($lead));

        // Pausa entre envíos para SMTP con límite por segundo (p. ej. Mailtrap en pruebas)
        if ($delay = (int) config('mail.send_delay')) {
            sleep($delay);
        }

        // Correo de agradecimiento para quien solicita la cotización
        Mail::to($lead['email'])->send(new ContactMail($lead));

        return redirect(Seo::url($lead['source_page']) . '#contact')
            ->with('success', __('website.quote.success'))
            ->with('lead_submitted', [
                'service' => $lead['service'],
                'source_page' => $lead['source_page'],
            ]);
    }
}
