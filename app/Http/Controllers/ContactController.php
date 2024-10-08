<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $data = Contact::all();
        return view('show' , compact('data'));
    }
    public function ajouter_contact(Request $request){

        $request->validate([
            'nom' => 'required|string|max:55',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|unique:contacts,email',
        ],
        [
            'nom.required'=> 'Le champ nom est requis.',
            'telephone.required'=> 'Le champ nom est requis.',
            'email.required'=> 'Le champ nom est requis.',
        ]
    );
         // Création d'une nouvelle instance de Contact
         $data = new Contact;

         // Attribution des données
         $data->nom = $request->nom;
         $data->telephone = $request->telephone;
         $data->email = $request->email;
 
         // Sauvegarde dans la base de données
         $data->save();
 
         // Redirection avec un message de succès
        
         return to_route('show');

    }

    public function show(){
        $data = Contact::all();
        return view('show' , compact('data'));
    }

    public function supprimer_contact($id){
        $data = Contact::find($id);
        if ($data) {
            $data->delete();
            // Optionally return a success message or redirect to a specific route
            return redirect()->back()->with('success', 'Product deleted successfully.');
            // 
        } else {
            // Optionally return an error message or redirect to a specific route
            return redirect()->back()->with('error', 'Product not found.');
        }
    }

    public function modifier_contact($id){
        $data = Contact::find($id);
        return view('modifier_contact' , compact('data'));
    }

    public function edit_contact(Request $request , $id){
        $data = Contact::find($id);

        $data->nom = $request->nom ;

        $data->telephone = $request->telephone ;

        $data->email = $request->email ;

        $data->save();

        return to_route('show');
    }
    // Méthodes pour l'API

    public function apiIndex() {
        return response()->json(Contact::all());
    }

    public function apiStore(Request $request) {
        $request->validate([
            'nom' => 'required|string|max:55',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|unique:contacts,email',
        ]);

        $contact = Contact::create($request->all());
        return response()->json($contact, 201);
    }

    public function apiShow($id) {
        $contact = Contact::find($id);
        if (!$contact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }
        return response()->json($contact);
    }

    public function apiUpdate(Request $request, $id) {
        $contact = Contact::find($id);
        if (!$contact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }

        $request->validate([
            'nom' => 'string|max:55',
            'telephone' => 'string|max:20',
            'email' => 'email|unique:contacts,email,' . $id,
        ]);

        $contact->update($request->all());
        return response()->json($contact);
    }

    public function apiDestroy($id) {
        $contact = Contact::find($id);
        if (!$contact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }

        $contact->delete();
        return response()->json(['message' => 'Contact deleted successfully']);
    }

}
