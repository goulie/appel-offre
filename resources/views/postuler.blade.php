@extends('layout')

@section('title',"FORMULAIRE D'INDENTIFICATION D'UN SOUMISSIONNAIRE")
@section('entete',"FORMULAIRE D'INDENTIFICATION D'UN SOUMISSIONNAIRE")

@section('contenu')
<!--Page Header-->
<section id="main-banner-page" class="position-relative page-header contact-header section-nav-smooth parallax" style="background-image:url('../public/assets/construction/images/offer.jpg');">
    <div class="overlay overlay-dark opacity-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="page-titles whitecolor text-center padding">
                    <h2 class="font-bold">APPEL D'OFFRE</h2>
                    <h4 class="font-light py-2">Veuillez remplir le Formulaire ci-dessous.</h4>
                </div>
            </div>
        </div>
        <div class="bg-blue title-wrap mt-n5">
            <div class="row">
                @foreach($data as $row)
                <div class="col-lg-12 col-md-12 whitecolor">
                    <h3 class="float-left">{{$row->titre}}</h3>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--Page Header ends -->
<!-- Contact US -->
<section id="stayconnect1" class="bglight position-relative padding_top padding_bottom_half noshadow">
    <div class="container whitebox">
        <div class="widget py-5">
            <div class="row">
                <div class="col-md-12 text-center wow fadeIn mt-n3" data-wow-delay="300ms">
                    <h3 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-weight-bold"></span>
                        <span class="divider-center"></span>
                    </h3>
                    <div class="col-md-8 offset-md-2 bottom35">
                        <p class="text-danger">Bien vouloir renseigner le formulaire ci-dessous pour récevoir par mail le dossier d’appel d’offres et ses annexes. Tous les champs sont obligatoires.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if (session('msg'))
                    <div class="alert alert-success" role="alert">
                      Envoie bien réussi ! Un mail vous a été envoyé !
                    </div>
                    @endif
                    <!--=======================Formulaire=======================---->
                    
                    <form method="POST" name="form" onsubmit="return validateForm()" action="{{route('souscrire')}}">
                        @csrf
                        @foreach($data as $row)
                        <input type="hidden" name="offres_id" value="{{$row->id}}">
                        <div class="form-row wow fadeInUp" data-wow-delay="200ms">
                            <div class="form-group col-md-6">
                            <label class="darkcolor font-weight-bold" for="inputEmail4">Denommination sociale :</label>
                            <input type="text" class="form-control input1 darkcolor" id="inputEmail4" placeholder="Denommination sociale" name="denomination" required="">
                            </div>
                            <div class="form-group col-md-6">
                            <label class="darkcolor font-weight-bold" for="ss">Statut social <span class="text-danger">(personne physique ou personne morale)</span> :</label>
                            <input type="text" class="form-control input1" id="ss" placeholder="Statut social" name="statut" required="">
                            </div>
                        </div>
                        <div class="form-row wow fadeInUp" data-wow-delay="300ms">
                            <div class="form-group col-md-6">
                            <label class="darkcolor font-weight-bold" for="np">Nom et Prénoms <span class="text-danger">(Représentant Légal)</span>:</label>
                            <input  type="text" class="input1 form-control" id="np" placeholder="Nom et Prénoms du représentant légal)" name="nom_prenoms" required="">
                            </div>
                            <div class="form-group col-md-6">
                            <label class="darkcolor font-weight-bold" for="fct">Fonction<span class="text-danger">(Représentant Légal)</span> :</label>
                            <input type="text" class="input1 form-control" id="fct" placeholder="Fonction du Représentant Légal" name="fonction" required="">
                            </div>
                        </div>
                        <div class="form-group wow fadeInUp" data-wow-delay="400ms">
                            <label class="darkcolor font-weight-bold" for="pf">Point focal:<span class="text-danger">(Dans le cadre du présent appel d’offres)</span> :</label>
                            <input type="text" class="input1 form-control" id="pf" placeholder="Point focal dans le cadre du présent appel d’offres" name="point_focal" required="">
                        </div>
                        <div class="form-row wow fadeInUp" data-wow-delay="500ms">
                            <div class="form-group col-md-6">
                            <label class="darkcolor font-weight-bold" for="ct1">Contact 1:</label>
                            <input type="number" class=" input1 form-control" id="ct1" placeholder="Contact téléphonique 1" name="contact1" minlength="10" required="">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="ct2" class="darkcolor font-weight-bold">Contact 2 (Facultatif):</label>
                            <input type="number" class="input1 form-control" id="ct2" placeholder="Contact téléphonique 2" name="contact2">
                            </div>
                        </div>
                        <div class="form-group wow fadeInUp" data-wow-delay="600ms">
                            <label class="darkcolor font-weight-bold" for="mail">Email de référence:</label>
                            <input type="email" class="form-control input1" id="mail" placeholder="Adresse email de référence" name="mail" required="">
                        </div>
                        <div class="alert alert-danger" role="alert" id="erreur" style="display:none">
                          Les adresses Emails ne correspondent pas, entrez des mails identiques SVP !
                        </div>
                        <div class="form-group wow fadeInUp" data-wow-delay="600ms">
                            <label class="darkcolor font-weight-bold" for="mail1">Confirmation Email:</label>
                            <input type="email" class="form-control input1" id="mail1" placeholder="Adresse email de référence" name="mail1" required="">
                        </div>
                        <br>
                        <div class="form-group wow fadeInUp" data-wow-delay="700ms">
                            <div class="col-md-12 col-sm-12">
                               <button type="submit" onsubmit="return validateForm()" class="btn button btn-blue w-100">Soumettre</button>
                            </div>
                        </div>
                    </form>
                    @endforeach
                <!--=======================fin du Formulaire=======================---->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="widget text-center top60 w-100 p-0">
                    <div class="contact-box">
                        <span class="icon-contact bluecolor"><i class="fas fa-mobile-alt"></i></span>
                        <p class="bottom0"><a href="tel:+2252722499613">+225  27 22 49 96 13</a></p>
                        <p class="d-block"><a href="tel:+2252722499611"> +225 27 22 49 96 11</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="widget text-center top60 w-100 p-0">
                    <div class="contact-box">
                        <span class="icon-contact bluecolor"><i class="fas fa-map-marker-alt"></i></span>
                        <p class="bottom0"><strong>Siège Social:</strong></p>
                        <p class="d-block">Cocody Riviera Palmeraie</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="widget text-center top60 w-100 p-0">
                    <div class="contact-box">
                        <span class="icon-contact bluecolor"><i class="far fa-envelope"></i></span>
                        <p class="bottom0"><strong>Email:</strong></p>
                        <p class="d-block"><a href="mailto:contact@afwa-hq.org">contact@afwa-hq.org</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="widget text-center top60 w-100 p-0">
                    <div class="contact-box">
                        <span class="icon-contact bluecolor"><i class="far fa-clock"></i></span>
                        <p class="bottom15"><strong>Temps Réel UTC</strong> <span id="utc" style="color: #000;font-size:14px;" class="d-block"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection