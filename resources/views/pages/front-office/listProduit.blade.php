<x-master-layout >
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h3 style="text-align: center">Liste des produits </h3>
                @if (session('statut'))
                    
                    <div class="alert alert-info" role="alertdialog">
                        <strong>{{session('statut')}}</strong>
                    </div>
                @else
                    
                @endif
                @if ($lesproduits->count()>0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Designation</th>
                                <th>Prix</th>
                                <th>Pays source</th>
                                <!--<th>Ajouter</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>-->
                                <th>Action</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($lesproduits as $produit)
                                
                           
                            <tr>
                                <td>{{ $produit->designation }}</td>
                                <td>{{ $produit->prix }} FCFA</td>
                                <td>{{ $produit->pays_source }}</td>
                                <!--<td><a href="#" class="btn btn-success">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 25px"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                                                       
                                    </a>
                                </td>-->
                                <td><a href="{{route('produits.edit',$produit->id)}}" class="btn btn-success">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 15px"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                                       
                                    </a>
                                <!--</td>-->
                                <a href="#" onclick="deleteConfirm('{{'produitItem'.$produit->id}}')" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style='width:15px'>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                      </svg>
                                </a>
                                <!--Pour gérer l'action suivant la confirmation de la suppression-->
                                <form id="{{'produitItem'.$produit->id}}"
                                    action="{{route('supprimer',$produit->id)}}"
                                    method="GET" style="display: none">
                                    @csrf

                                </form>
                                <!--<a href="{{route('supprimer',$produit->id)}}" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style='width:15px'>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                      </svg>
                                                                       
                                    </a>-->
                                <!--</td>-->
                              
                                <a href="{{route('ajout.commande',$produit->id)}}" class="btn btn-primary">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 15px"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                                                       
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--Pages suivantes et precedantes-->
                    <div style="margin-left: 25%">
                        {{$lesproduits ?? ''->links()}}
                    </div>

                @else
                    <p>
                        Aucun produit n'a été retrouvé
                    </p>
                @endif
            </div>
            
            <div class="col-md-5">
                <h3 style="text-align: center">Liste des commandes </h3>
                @if (session('statut'))
                    
                    <div class="alert alert-info" role="alertdialog">
                        <strong>{{session('statut')}}</strong>
                    </div>
                @else
                    
                @endif
                @if ($lescommandes->count()>0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Designation</th>
                                <th>Prix</th>
                                <th>Pays</th>
                                <!--<th>Modifier</th>-->
                                <th>Annuler</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($lescommandes as $commande)
                                
                           
                            <tr>
                                <td>{{ $commande->produit->designation ?? 'introuvable'}}</td>
                                <td>{{ $commande->produit->prix ?? 'introuvable'}} FCFA</td>
                                <td>{{ $commande->produit->pays_source ?? 'introuvable'}}</td>
                                <!--<td><a href="#" class="btn btn-primary">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 25px"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                                       
                                    </a>-->
                                <td><a href="{{route('annuler.commande',$commande->id)}}" class="btn btn-danger">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" style="width: 15px"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                                       
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--Pages suivantes et precedantes-->
                    <div style="margin-left: 25%">
                        {{$lescommandes->links()}}
                    </div>

                @else
                    <p>
                        Aucune commande n'a été retrouvée
                    </p>
                @endif
            </div>
            </div>
        </div>
    </div>
</x-master-layout>