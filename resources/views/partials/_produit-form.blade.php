@csrf
@if (session('statut'))

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{session('statut')}}</strong>
    
    </div>
@else

@endif
    <div class="form-group">
        <label for="">Désignation</label>
        <input value="{{ old('designation') ?? $produit->designation }}" type="text" name="designation" id="" class="form-control" placeholder="La désignation du produit" aria-describedby="helpId">
        @error('designation')
        <small class="text-danger"> {{ $message  }}</small>                            
        @enderror
    </div>
    <div class="form-group">
        <label for="">Prix</label>
        <input value="{{$produit->prix}}" type="number" name="prix" id="" class="form-control" placeholder="Le prix du produit" aria-describedby="helpId">
        @error('prix')
        <small class="text-danger"> {{ $message  }}</small>                             
        @enderror
    </div>
    <div class="form-group">
        <label for="">Description</label>
        <input value="{{$produit->description}}" type="text" name="description" id="" class="form-control" placeholder="La description du produit" aria-describedby="helpId">
        @error('description')
        <small class="text-danger"> {{ $message  }}</small>                             
        @enderror
    </div>
    <div class="form-group">
        <label for="">Pays source</label>
        <select class="form-control" name="pays_source" id="">
            <option value="{{$produit->pays_source}}" selected> {{$produit->pays_source}}</option>
            <option value="TOGO" {{$produit->pays_source=='TOGO'? 'selected':''}}>TOGO</option>
            <option value="MALI"{{$produit->pays_source=='MALI '? 'selected':''}}>MALI</option>
        </select>
        @error('pays_source')
        <small class="text-danger"> {{ $message  }}</small>                             
        @enderror
    </div>
    <div class="form-group">
        <label for="">Like</label>
        <input value="{{$produit->like}}" type="number" name="like" id="" class="form-control" placeholder="Saisir une valeur" aria-describedby="helpId">
        @error('like')
        <small class="text-danger"> {{ $message  }}</small>                             
        @enderror
    </div>
    <div class="form-group">
            <label for="">Poids</label>
            <input value="{{$produit->poids}}" type="number" name="poids" id="" class="form-control" placeholder="Saisir une valeur" aria-describedby="helpId">
            @error('poids')
            <small class="text-danger"> {{ $message  }}</small>                            
            @enderror
    </div>
    <div class="custom-file">
            
            <input value="" type="file" name="image" id="" class="" >
            
            @error('')
                                       
            @enderror
    </div>
    
