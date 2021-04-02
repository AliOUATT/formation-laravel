<?php

namespace App\Http\Controllers;

use App\Exports\ProduitsExport;
use App\Http\Requests\EditProduitFormRequest;
use App\Http\Requests\ProduitFormRequest;
use App\Mail\NouveauProduitAtoutee;
use App\Models\Produit;
use App\Models\User;
use App\Models\Commande;
use App\Models\Ministere;
use App\Notifications\NouveauProduitNotification;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Maatwebsite\Excel\Facades\Excel;

class MainController extends Controller
{
    public function afficheAccueil()
    {
        //dd(Auth::user()->role->role);

        return view('pages.front-office.welcome',
        [
            'nomSite'=> 'Service en ligne MTMUSR',
            'nomMinistere'=>'Ministère des Transports, de la Mobilité Urbaine et de la Sécurité routière',

        ]
    
    
    );
    }//fonction pour retourner des param recemment entrés
    public function afficheProcedure($username)
    {
        //dd($username);

        return view('pages.front-office.procedure',
        [
            'nom'=>$username,
        ]


    );
    }
    //Fonction pour créer un nouveau produit --première approche
    public function ajoutProduit()
    {
        $produit = New Produit();

        $produit->uuid = Str::uuid();
        $produit->designation = 'Tomate';
        $produit->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, hic sapiente sequi animi amet possimus dolores itaque corporis impedit saepe quidem adipisci consectetur aliquid. Earum, porro iusto. Obcaecati, eos distinctio!'; 
        $produit->prix = '1000';
        $produit->like = '21';
        $produit->pays_source = 'Burkina-Faso';
        $produit->poids = '45.10';

        $produit->save();

    }
    //Fonction d'enrrgistrement de produit depuis un formulaire
    public function enregistrerProduit(ProduitFormRequest $request)
    {
        //dd($request->all());
        //Il est conseillé de faire une validation avant d'enregistrer dan sla BD
        /*  $request->validate([
            'designation'=>'required|min:5|max:255',
            'prix'       =>'required|digits_between:2,10',
            'description'=>'required|min:5|max:255',
            'poids'      =>'required|digits_between:1,5',
            'like'       =>'required|digits_between:1,5',
            'pays_source'=>'required|min:3|max:50',

        ]);*/
        $imageName = "default-image.jpeg";
        if($request->file('image')){
        $imageName = time()."_".$request->file("image")->getClientOriginalName();
        $request->file("image")->storeAs("public/produits-images", $imageName);
        }
        //Création du produit
        $produit = Produit::create([
            'uuid'       =>Str::uuid(),
            'designation'=>$request->designation,
            'prix'       =>$request->prix,
            'description'=>$request->description,
            'like'       =>$request->like,
            'pays_source'=>$request->pays_source,
            'poids'      =>$request->poids,
            'image'      =>$imageName,
        ]);
        //dd($produit);
        //return redirect()->back()->with('statut','Produit ajouté avec succes');
        $user = User::first();
        $users = User::all();
        //Mail::to($user)->send(new NouveauProduitAtoutee($produit));
       // $user->notify(new NouveauProduitNotification($produit));
        //Notification::send($users, new NouveauProduitNotification($produit));
        return redirect()->back()->with('statut','Produit ajouté avec succes');
    }
    //Fonction pour créer un nouveau produit --deuxième approche
    public function ajoutProduitEncore()
    {
        Produit::create(
            [
                'uuid'=>Str::uuid(),
                'designation'=> 'Mangue',
                'description'=> 'Mangue bien grosse et sucrée',
                'prix'=>1500 ,
                'like'=> 63,
                'pays_source'=> 'Togo',
                'poids'=> 89.5,
            ]
            );

    }

    //Modification des données
    //On commence par recupérer le contenu de la table produit
    public function getList()
    {
        $produit = Produit::first();
        
        $user = User::first();
        $produit->users()->attach($user);

        $user=$produit->users;
        //dd($produit, $user);

        //vérification du contenu de la variable
        //dump($produit);
        //Renvoie d'une vue vid
        //return view('pages.front-office.listProduit');
        //renvoie d'une vue en injectant la liste de produits
        return view('pages.front-office.listProduit',[
            'lesproduits'=>Produit::paginate(10),
            'lescommandes'=>Commande::paginate(10),
        ]
    );
    }
    //on passe à la modification en passant l'identifiant du produit en parametre
    public function modifierProduit($id)
    {
        $produitModifie = Produit::where('id',$id)->update([
            'designation'=>'Orange',
            'description'=>'Ces oranges viennent de Bobo-dioulasso',
        ]);
        dd($produitModifie);
    }

    //Suppression d'une entrée dans la base de données option1
    public function supprimerProduit($id)
    {
        $produit = Produit::find($id);
        //dd($produit);
        $produit->delete();
    }

    //Suppression d'une entrée dans la base de données option2
    public function supprimerProduit2($id)
    {
        Produit::destroy($id);
        return redirect()->back()->with('statut','Supprimé avec succes');
        //return redirect()->route('accueil');
      
    }
    //Fonction de recupération de la liste des produits et renvoie dans une vue
    public function produitsListe()
    {
       // $produit = Produit::all();
       //Affichage par pagination
       $produit = Produit::paginate(10);

        //vérification du contenu de la variable
        //dump($produit);
        //Renvoie d'une vue vide
        //return view('pages.front-office.listProduit');
        //renvoie d'une vue en injectant la liste de produits
        return view('pages.front-office.listProduit',[
            'lesproduits'=>$produit,
            'lescommandes'=>Commande::paginate(10),
        ]
    );
    }

    //Fonction de recupération de la liste des ministères et renvoie dans une vue
    public function ministereListe()
    {
        $ministere = Ministere::paginate(10);

        //vérification du contenu de la variable
        //dump($ministere);
        //Renvoie d'une vue vide
        //return view('pages.front-office.listProduit');
        //renvoie d'une vue en injectant la liste de produits
        return view('pages.front-office.listMinistere',[
            'lesministeres'=>$ministere
        ]
    );
    }

    //Fonction de suppression de ministere et renvoie dans une vue
    public function supprimerMinistere($id)
    {
        Ministere::destroy($id);
        return redirect()->back()->with('statut','Supprimé avec succes');
    }

    //fonction pour ajout d'une commande
    public function ajouterCommande($id)
    {
        //dd($id);
        $commande = new Commande();
        $commande->produit_id=$id;
        $commande->uuid=Str::uuid();
        $commande->save();
        return redirect()->back()->with('statut','Commande ajoutée avec succès');
    }
    //Annulation de la commandenew.pr
    public function annulerCommande($id)
    {
        Commande::destroy($id);
        return redirect()->back()->with('statut','Commande annulée');
    }
    //Formulaire d'ajout de produit
    public function produitForm()
    {
        $produit = new Produit;
        return view('pages.back-office.fproduit', ["produit"=>$produit]);
    }
    //Formulaire d'ajout de ministere
    public function ministereForm()
    {
        return view('pages.back-office.fministere');
    }
    //modification de produit en passant par une vue
    public function editProduit($id)
    {
        $produit= Produit::find($id);
        return view('pages.front-office.editProduit',[
            'produit' => $produit,
        ]);
    }
    public function updateProduit(EditProduitFormRequest $request)
    {
        //dd($request);
        //$produit = Produit::paginate(10);
        $id=$request->id;
         
        $edited = Produit::where('id',$id)->update([
            'uuid'       =>Str::uuid(),
            'designation'=>$request->designation,
            'prix'       =>$request->prix,
            'description'=>$request->description,
            'like'       =>$request->like,
            'pays_source'=>$request->pays_source,
            'poids'      =>$request->poids,
        ]);
        return view('pages.front-office.listProduit',[
            'lesproduits'=> Produit::paginate(10),
            'lescommandes'=>Commande::paginate(10),
        ])->with('statut','Produit modifé avec succes');
        /*
        return view('pages.front-office.welcome')->with('statut','produit modifié avec succes');*/
    }
    public function excelExport()
    {
        //dd('ok');
        return Excel::download(new ProduitsExport, 'Produits.xls');
    }
   /* public function sendMail()
    {
        $user = User::first();
        Mail::to($user)->send(new NouveauProduitAtoutee());
        dd('Le mail a bien été envoyé');
    }*/
    //test-notification
    /*public function sendNotification()
    {
        $user = User::first();
        $user->notify(new NouveauProduitNotification($notification));
    }*/
}
