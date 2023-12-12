<x-mail::message>
# Introduction

 Nouvelle Commande

 Article : {{ $data[0]['lignecommandes'][0]['article']['nom'] }}
<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
