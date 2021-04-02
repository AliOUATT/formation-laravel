@component('mail::message')
# Un nouveau produit a été ajouté
## Désignation:
 {{ $produit->designation}}

## Prix <br>
{{ $produit->prix}}

## Description <br>
{{ $produit->description}}



@component('mail::button', ['url' =>url('/list-produit')])
Voir le produit
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
