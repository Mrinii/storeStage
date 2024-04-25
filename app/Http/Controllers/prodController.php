<?php

namespace App\Http\Controllers;

use App\Models\Produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class prodController extends Controller
{
    public  function home()
    {
        $produits = Produits::all();
        return view('home', ['produits' => $produits]);
    }
    public function espaceadmin()
    {
        $produits = Produits::all();
        return view('espaceadmin', ['produits' => $produits]);
        // return view('espaceadmin');
    }
    public function espaceclient()
    {
        $produits = Produits::all();
        return view('espaceclient', ['produits' => $produits]);
    }

    public function details(Request $r)
    {
        $id = $r->route('id');

        $produit = Produits::find($id);
        return view('details', ['produit' => $produit]);
    }

    public function cart()
    {
        return view('cart');
    }

    public function addToCart($id)
    {


        $produit = Produits::find($id);


        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if (!$cart) {

            $cart = [
                $id => [
                    "nom" => $produit->nom,
                    "quantite" => 1,
                    "prix" => $produit->prix,
                    "image" => $produit->image
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {

            $cart[$id]['quantite']++;

            session()->put('cart', $cart); // this code put product of choose in cart

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "nom" => $produit->nom,
            "quantite" => 1,
            "prix" => $produit->prix,
            "image" => $produit->image
        ];

        session()->put('cart', $cart); // this code put product of choose in cart

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // update product of choose in cart
    public function updatec(Request $request)
    {
        $quantite = $request->quantite;
        $id = $request->id;
        if ($id and $quantite) {
            $cart = session()->get('cart');

            $cart[$id]["quantite"] = $quantite;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    // delete or remove product of choose in cart
    public function removec(Request $request)
    {
        if ($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }


    public  function getProdByCat(Request $r)
    {
        $cat =  $r->route('cat');
        $produits = Produits::where('categorie', '=', $cat)->get();
        // avec sql native
        /* $query = "select * from produits where categorie='$cat'";
     $produits = DB::select($query);
	 
	   !! Au niveau de la view  lecture des resultats sous forme d'objets  !!
	 @foreach ($products as $item)
<tr>
    <td>{{$item->nom  }}</td>
    <td>{{$item->prix  }}DH</td>
    <td><img src="{{ asset('imgs/'.$item->image) }}" alt="Image " class="img-fluid" width="100"></td>
  </tr>

@endforeach
	 */
        return view('produits', [
            'tab' => $produits,
            'cat' => $cat
        ]);
    }
}
