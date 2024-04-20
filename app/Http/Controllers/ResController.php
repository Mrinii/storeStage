<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProdRequest;
use App\Models\Produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ResController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('addProd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProdRequest $request)
    {
        //
        $request->validated();

        //recuperer des valeurs de form
        $nom = $request->input('nom');
        $prix = $request->input('prix');
        $categorie = $request->input('categorie');
        $description = $request->input('description');
        $taillesdesponibles = $request->input('taillesdesponibles');
        $image = $request->file('image')->getClientOriginalName();


        // inserer dans la table avec eloquent
        $produit = new Produits();
        $produit->nom = $nom;
        $produit->prix = $prix;
        $produit->categorie = $categorie;
        $produit->description = $description;
        $produit->tailles_desponibles = $taillesdesponibles;
        $produit->image = $image;
        // save 
        $produit->save();
        //traitement d'image
        $request->file('image')->move(public_path('images'), $image);

        //flash message
        return back()->with('successadd', 'you added a product successfully the product')->with('produit', $produit->nom);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produit = Produits::find($id);
        return view('edit')->with('produit', $produit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddProdRequest $request, $id)
    {
        //validation des donneesaves request
        $request->validated();
        //recuperer les donnees
        $nom = $request->input('nom');
        $prix = $request->input('prix');
        $categorie = $request->input('categorie');
        $description = $request->input('description');
        $taillesdesponibles = $request->input('taillesdesponibles');
        $image = '';
        // recuperer l'object produit via l'id
        $produit = Produits::find($id);
        $produit->nom = $nom;
        $produit->prix = $prix;
        $produit->categorie = $categorie;
        $produit->description = $description;
        $produit->tailles_desponibles = $taillesdesponibles;
        if ($request->hasFile('image')) {
            # code...
            $image = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $image);
        } else {
            $image = $produit->image;
        }
        $produit->image = $image;

        $produit->save();

        return back()->with('successupdate', 'You have successfully updated an article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $produit = Produits::find($id);
        $produit->delete();
        return back()->with('produitdeleted', 'You have successfully deleted article ')->with('produit', $produit->nom);
    }
}
