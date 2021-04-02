<x-master-layout>
    <br>
    <!--<h1 style="text-align: center">Ajout d'un nouveau produit</h1>-->
    <div class="container" style="align-content: center">

        <h1 style="text-align: center"> Ajout d'un nouveau produit</h1>
        <div class="row">
            <div class="col-md-6" style="margin-left: 25%">
                <form action="{{route('produit.enregistrer')}}" method="post" enctype="multipart/form-data">
                    @method("POST")
                    @include('partials._produit-form')<br>
                    <div class="form-group">
                        <button class="btn-success btn-block btn-lg">Ajouter</button>
                    
                    </div>

                </form>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
    
</x-master-layout>