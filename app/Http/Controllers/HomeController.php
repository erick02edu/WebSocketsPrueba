<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Contact;
use App\Models\Mensajes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = Auth::user();
        $userData = $user->only(['id', 'name', 'email']);

        $contactos=Contact::where('idUser',Auth::id())->get();

        $Chat=Chat::find(2);

        $mensajes=Mensajes::where("idChat",2)->get();

        return view('home',[
            'Contactos'=>$contactos,
            'mensajes'=>$mensajes,
            'user'=>$userData,
        ]);
    }
}
