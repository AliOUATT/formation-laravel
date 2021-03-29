<x-master-layout>
    <br>
    <!--<h1 style="text-align: center">Ajout d'un nouveau produit</h1>-->
    <div class="container" style="align-content: center">

        <h1 style="text-align: center"> Ajout d'un nouveau produit</h1>
        <div class="row">
            <div class="col-md-6" style="margin-left: 25%">
                <form action="{{route('produit.enregistrer')}}" method="post" >
                    @method("POST")
                    @csrf
                    @if (session('statut'))
                    
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{session('statut')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @else
                    
                    @endif

                    <div class="form-group">
                        <label for="">Désignation</label>
                        <input value="{{old('designation')}}" type="text" name="designation" id="" class="form-control" placeholder="La désignation du produit" aria-describedby="helpId">
                        @error('designation')
                            <small class="text-danger"> {{ $message  }}</small>                            
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Prix</label>
                        <input value="{{old('prix')}}" type="number" name="prix" id="" class="form-control" placeholder="Le prix du produit" aria-describedby="helpId">
                        @error('prix')
                        <small class="text-danger"> {{ $message  }}</small>                             
                        @enderror
                    </div>
                        <div class="form-group">
                        <label for="">Description</label>
                        <textarea value="{{old('description')}}" type="text" name="description" id="" class="form-control" placeholder="La description du produit" aria-describedby="helpId"></textarea>
                        @error('description')
                        <small class="text-danger"> {{ $message  }}</small>                             
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Pays source</label>
                      <select class="form-control" name="pays_source" id="">
                        <option value="BURKINA-FASO" {{old('pays_source')=='BURKINA-FASO' ? 'selected':''}}>BURKINA-FASO</option>
                        <option value="TOGO" {{old('pays_source')=='TOGO'? 'selected':''}}>TOGO</option>
                        <option value="MALI"{{old('pays_source')=='MALI '? 'selected':''}}>MALI</option>
                      </select>
                      @error('pays_source')
                      <small class="text-danger"> {{ $message  }}</small>                             
                        @enderror
                    </div>
                        <div class="form-group">
                            <label for="">Like</label>
                            <input value="{{old('like')}}" type="number" name="like" id="" class="form-control" placeholder="Saisir une valeur" aria-describedby="helpId">
                            @error('like')
                            <small class="text-danger"> {{ $message  }}</small>                             
                            @enderror
                        </div>
                            <div class="form-group">
                                <label for="">Poids</label>
                                <input value="{{old('poids')}}" type="number" name="poids" id="" class="form-control" placeholder="Saisir une valeur" aria-describedby="helpId">
                                @error('poids')
                                <small class="text-danger"> {{ $message  }}</small>                            
                        @enderror
                            </div>
                        <div class="form-group">
                        <button class="btn-success btn-block btn-lg">Valider</button>
                        
                       
                        </div>

                </form>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
    
</x-master-layout>