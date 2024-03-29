<x-master-layout>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="#">MTMUSR</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">J'ai déjà un compte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Conditions d'utilisation</a>
                        </li>
                    </ul>
        
                </div>
            </div>
        </nav>
        
        <main class="login-form">
            <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Créer votre compte</div>
                            <div class="card-body">
                                <form action="" method="">
                                    <div class="form-group row">
                                        <label for="email_address" class="col-md-4 col-form-label text-md-right">Addresse E-Mail </label>
                                        <div class="col-md-6">
                                            <input type="text" id="email_address" class="form-control" name="email-address" required autofocus>
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe</label>
                                        <div class="col-md-6">
                                            <input type="password" id="password" class="form-control" name="password" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Confirmation</label>
                                        <div class="col-md-6">
                                            <input type="password" id="password" class="form-control" name="password" required>
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember"> J'accepte les conditions d'utilisation
                                                </label>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Inscription
                                        </button>
                                        <!--<a href="#" class="btn btn-link">
                                            Forgot Your Password?
                                        </a>-->
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        
        </main>
        
       </div>
       
</x-master-layout>
