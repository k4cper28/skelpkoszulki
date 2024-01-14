<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('/sklep',['products' => $products]);
    }
    public function create()
    {
        // Create - Show the form to create a new item
        $products = new Product();
        return view('dodaj-przedmiot',['products' => $products]);
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => ['required', 'max:30'],
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'description' => ['required', 'string', 'min:5', 'max:255'],
            'images' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
        ]);

        if(Auth::user() == null){
            return view('home');
        }

        if ($request->hasFile('images')) {
            // Plik został przesłany
            $file = $request->file('images');
            // Kontynuuj logikę obsługi pliku...
        } else {
            // Plik nie został przesłany
            return redirect('/sklep')->with('error', 'Missing file.');
        }

        $imageName = time() . '.' . $request->file('images')->extension();
        //dd($imageName);
        $file = $request->file('images');
        //$request->image->move(base_path('/images'), $imageName);
        $file->move(base_path('public\storage\images'), $imageName);

        $ownerId = auth()->id();

        $products = new Product;
        $products->owner = $ownerId;
        $products->title = $request->input('title');
        $products->price = $request->input('price');
        $products->description = $request->input('description');
        $products->images = $imageName;
        $products->category_id = $request->input('category_id');
        $products->quantity = 1;

        if ($products->save()){
            return redirect('/sklep');
        }

        return redirect()->route('/sklep')->with('success', 'Address added successfully');
    }

}
