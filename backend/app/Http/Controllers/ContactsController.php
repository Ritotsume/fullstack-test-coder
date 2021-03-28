<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    /**
     * Cria uma nova instancia do controller.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostra uma listagem de contatos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('dashboard.contacts.index', ['contacts' => $contacts]);
    }

    /**
     * Armazena informações de contato. Pode ser usado via API.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:6|max:255',
            'email' => 'email|required',
            'phone' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails())
        {
            $errors = $validator->errors();

            return response()->json([
                'errors' => $errors
            ]);
        }

        $contato = new Contact;
        $contato->name = $request->name;
        $contato->email = $request->email;
        $contato->phone = $request->phone;
        $contato->subject = $request->subject ?? 'Contato de: ' . $request->name;
        $contato->message = $request->message;
        $contato->created_at = date('Y-m-d H:i:s');
        $contato->save();

        return response()->json([
            'success' => 'Sua mensagem foi enviada! Aguarde contato pelo e-mail informado.'
        ]);
        
    }

    /**
     * Mostra informações de uma mensagem de contato.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->readed = 1;
        $contact->save();
        return view('dashboard.contacts.show', ['contact' => $contact]);
    }

    /**
     * Remove informações de contato. Pode ser útil...
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Deletado com sucesso.');
    }
}
