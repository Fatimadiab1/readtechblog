<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendContactForm(Request $request)
    {
        // Valider les données
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:500',
            'consent' => 'accepted',
        ]);

       
        $data = [
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'content' => $validated['message'],
        ];
        

        // Envoi d'un e-mail 
        Mail::send('emails.contact', $data, function ($message) {
            $message->to('diabfatima934@gmail.com') // Remplacez par votre e-mail
                    ->subject('Nouveau message de contact');
        });

        // Envoi d'un e-mail de bienvenue 
        if ($request->consent) {
            Mail::send('emails.welcome', $data, function ($message) use ($data) {
                $message->to($data['email'])
                        ->subject('Bienvenue chez ReadTechBlog');
            });
        }

        return back()->with('success', 'Votre message a été envoyé avec succès.');
    }
}
