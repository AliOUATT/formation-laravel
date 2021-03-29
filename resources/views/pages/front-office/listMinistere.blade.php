<x-master-layout >
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 style="text-align: center">Liste des ministères </h3>
                @if (session('statut'))
                    
                    <!--<div class="alert alert-info" role="alert">
                        <strong>{{session('statut')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>-->
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{session('statut')}}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                @else
                    
                @endif
                @if ($lesministeres->count()>0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Ministère</th>
                                <th>Ministre</th>
                                <th>Date de nomination</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($lesministeres as $ministere)
                                
                           
                            <tr>
                                <td>{{ $ministere->nom }}</td>
                                <td>{{ $ministere->ministere_nom }} </td>
                                <td>{{ $ministere->ministere_nomination_date }}</td>
                                <td><a href="#" class="btn btn-primary">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="width: 25px"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                                       
                                    </a>
                                <td><a href="{{route('supprimer.ministere',$ministere->id)}}" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style='width:25px'>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                      </svg>
                                                                       
                                    </a>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--Pages suivantes et precedantes-->
                    <div style="margin-left: 25%">
                    {{$lesministeres->links()}}
                    </div>

                @else
                    <p>
                        Aucun ministère n'a été retrouvé
                    </p>
                @endif
            </div>
            
            <!--<div class="col-md-6">

            </div>-->
        </div>
    </div>
</x-master-layout>