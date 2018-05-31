@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-three-fifths is-offset-one-fifth">
                    <h1 class="title">{{ __('app.privacy_policy') }}</h1>
                    <hr>
                    <div class="content">
                        <h2>Aké osobné údaje zbierame a prečo</h2>
                        <h3>Meno, email a heslo</h3>
                        Pri registrácii od vás vyžadujeme vaše meno, email a heslo. Vaše meno sa v aplikácii používa iba na oslovenia. Heslo slúži na prihlásenie a ukladáme ho do databázy v šifrovanej podobe. Email slúži tiež na prihlásenie a navyše aj na prípadné zaslanie emailu na obnovenie hesla.
                        <h3>Denný limit sacharidových jednotiek</h3>
                        Tento údaj je nepovinný a dá sa nastaviť v nastaveniach vnútri aplikácie. Tento údaj slúži na lepšie sledovanie príjmu sacharidových jednotiek.
                        <h3>Záznamy o jedle a pití</h3>
                        Samotné záznamy o prijatom jedle a pití, pozostávajú z mena jedla/pitia, ktoré ste prijali, jeho množstva a množstva sacharidových jednotiek, ktoré dané množstvo pre dané jedlo/pitie predstavuje.
                        <h3>Súbory cookie</h3>
                        Táto aplikácia využíva súbory cookie, na umožnenie funkcionality zapamätaj si ma na prihlasovacej stránke a zároveň pre dva bezpečnostné prvky.
                        <br><br>
                        Žiadne z vyššie uvedených dát neposkytujeme tretím stranám a na náš server sú zasielané šifrovaním spojením aby sa predišlo ich ukradnutiu.
                        <hr>
                        <h2>Ako odstrániť dáta z tejto aplikácie</h2>
                        Keď by ste chceli odstrániť nejaké vaše osobné údaje z tejto aplikácie napíšte mail na mailovú adresu
                        <a href="mailto:info@sachariovejednotky.eu">info@sacharidovejednotky.eu</a>
                        a do 30 dní tieto dáta budu navždy odstránené zo serverov tejto aplikácie.
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
