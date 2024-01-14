<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Intervention\Image\AbstractDriver;


class AddressController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $address = Address::where('owner', $userId)->get();
        return view('adres',['address' => $address]);
    }
    public function create()
    {
        // Create - Show the form to create a new item
        $adress = new Address();
        return view('adres-create',['adress' => $adress]);
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request)
    {
//         Create - Save a new item to the database
        $this->validate($request,   [
            'zipcode' => 'required|regex:/^[0-9]{2}-[0-9]{3}$/',
            'city' => 'required|string',
            'country' => 'required|string',
            'street' => 'required|string',
        ]);

        if(Auth::user() == null){
            return view('home');
       }

        $ownerId = auth()->id();

        $recordCount = Address::where('owner', $ownerId)->count();

        // Określ maksymalną ilość rekordów, którą użytkownik może mieć
        $maxRecords = 5;

        // Jeśli użytkownik ma już maksymalną liczbę rekordów, zablokuj dodawanie
        if ($recordCount >= $maxRecords) {
            return redirect()->back()->withErrors(['error' => 'Nie możesz dodać więcej rekordów.']);
        }

        $address = new Address;
        $address->owner = $ownerId;
        $address->country = $request->input('country');
        $address->city = $request->input('city');
        $address->street = $request->input('street');
        $address->zipcode = $request->input('zipcode');

        if ($address->save()){
            return redirect('/adres');
        }


        return redirect()->route('/adres')->with('success', 'Address added successfully');
    }
    public function show($id)
    {
        // Read - Display a single item
    }
    public function edit($id)
    {
        // Update - Show the form to edit an item
    }
    public function update(Request $request, $id)
    {
        // Update - Save the edited item to the database
    }
    public function destroy($id)
    {
        //Znajdź komentarz o danych id:

        // Pobierz adres
        $address = Address::find($id);

        // Sprawdź, czy użytkownik jest właścicielem adresu
        if ($address && $address->owner == Auth::id()) {
            // Usuń adres
            $address->delete();

            return redirect()->route('indexAdres')->with('success', 'Adres został usunięty.');
        } else {
            return redirect()->route('indexAdres')->with('error', 'Nie możesz usunąć tego adresu.');
        }
    }
}
