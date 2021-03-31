<!doctype html>
<html lang="fr">
  <head>
    <title>Formation DSI</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/
    iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
    <link href="{{ asset('css/app2.css')}}" rel="stylesheet" >
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
  <body>
      <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-success">
        
            <a class="navbar-brand ml-5" href="{{ route('page.accueil')}}">Formation DSI</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                     <a class="nav-link" href="{{ route('page.accueil')}}">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('procedure',"Ali OUATTARA")}}">La Procédure</a>
                    <!--<a class="nav-link" href="{{ route('a.produit')}}">La Procédure</a>-->
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produits</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="{{ route('listP')}}">Liste</a>
                            <a class="dropdown-item" href="{{ route('new.produit')}}">Ajout</a>
                            <a class="dropdown-item" href="{{ route('excel.export')}}">Exporter</a>
                            <!--<a class="dropdown-item" href="{{ route('compte')}}">Modification</a>
                            <a class="dropdown-item" href="{{ route('admin')}}">Supression</a>-->
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ministères</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="{{ route('ministere.liste')}}">Liste</a>
                            <a class="dropdown-item" href="{{ route('new.ministere')}}">Ajout</a>
                            <!--<a class="dropdown-item" href="{{ route('compte')}}">Modification</a>
                            <a class="dropdown-item" href="{{ route('admin')}}">Supression</a>-->
                        </div>
                    </li>
                
                </ul>
                <ul class="navbar-nav  mr-5 mt-2 mt-lg-0">
         
                    <li class="nav-item dropdown" >
                        @guest
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Connexion</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="{{ route('login')}}">Login</a>
                            <a class="dropdown-item" href="{{ route('register')}}">Créer votre compte</a>
                        </div>
                
                        @else
                        
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="{{ route('login')}}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout')}}" onclick="event.preventDefault();
                            document.getElementById('deconnexion').submit();">Déconnexion</a>
                            <form id="deconnexion" method="POST" action="{{ route('logout')}}">
                                @csrf
                            </form>
                        </div>
                   
                        @endguest
                        
                        
                    </li>
                    
                </ul>
        
            </div>
        
    </nav>
        
      </header>
      <main>
           {{$slot}}
            
      </main>
      <br>
      <footer class="bg-success text-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"><br>
                        <img src="https://www.transports.gov.bf/fileadmin/user_upload/storages/armoiries.png" height="100px" alt="Armoiriries nationales">
                    </div>
                    <div class="col-md-9"><br>
                        Ministère des Transports, de la Mobilité Urbaine et de la Sécurité Routière
                        <br>
                        Avenue Ouezzin Coulibaly, hôtel administratif, bâtiment ouest
                        <br>
                        <i>contact@transports.gov.bf</i>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <small>@Copyright 2021 | MTMUSR</small>

                    </div>
                </div>
            </div>
      </footer>



    <!-- Optional JavaScript 
    jQuery first, then Popper.js, then Bootstrap JS 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
    <script src="{{asset('js/app2.js')}}"></script>
  </body>
</html>
<style>
    /*search box css start here*/
.search-sec{
    padding: 2rem;
}
.search-slt{
    display: block;
    width: 100%;
    font-size: 0.875rem;
    line-height: 1.5;
    color: #55595c;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    height: calc(3rem + 2px) !important;
    border-radius:0;
}
.wrn-btn{
    width: 100%;
    font-size: 16px;
    font-weight: 400;
    text-transform: capitalize;
    height: calc(3rem + 2px) !important;
    border-radius:0;
}
@media (min-width: 992px){
    .search-sec{
        position: relative;
        top: -114px;
        background: rgba(26, 70, 104, 0.51);
    }
}

@media (max-width: 992px){
    .search-sec{
        background: #1A4668;
    }
}
    </style>
