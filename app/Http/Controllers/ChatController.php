<?php

namespace App\Http\Controllers;

use App\Events\MessageSend;
use App\Models\Mensajes;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function sendMessage(Request $request)  {
        $newMessage=new Mensajes();

        $newMessage->mensaje= $request->mensaje;
        $newMessage->idEmisor= $request->idEmisor;
        if($newMessage->idEmisor==1){
            $newMessage->idReceptor=4;
        }
        else if($newMessage->idEmisor==4){
            $newMessage->idReceptor=1;
        }
        date_default_timezone_set('America/Mexico_City');
        $date = new DateTime();
        $newMessage->FechaEnvio=$date->format('Y-m-d H:i:s');
        $newMessage->FechaRecibido=$date->format('Y-m-d H:i:s');
        $newMessage->visto=127;
        $newMessage->idChat=$request->idChat;

        $newMessage->save();

        event(new MessageSend($newMessage,$request->idChat));

        //$newMessage->save();

        //return response()->json(['status' => 'Mensaje enviado con éxito']);

        //return response('Message sent!');
    }
}
