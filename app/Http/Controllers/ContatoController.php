<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Validator;
use App\Mail\ContatoEmail;
use App\Http\Requests\ContatoFormRequest;

class ContatoController extends Controller
{
   	public function enviaContato(ContatoFormRequest $request){
   		$dados = $request->all();
   		
    	$envio = Mail::to(env("MAIL_CONTATO"))->send(new ContatoEmail($request));
    		
    	try{
    		return redirect()->to(url()->previous().'#contato')->with('success', 'E-mail enviado com sucesso!')->withInput();
    	}catch(\Exception $e){
    		return redirect()->to(url()->previous().'#contato')->withErrors($e)->withInput();
    	}

    }
}
