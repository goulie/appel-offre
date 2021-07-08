@extends('layout')
@section('title','CONFIRMATION')
@section('contenu')
<!--Page Header-->
<section id="main-banner-page" class="position-relative page-header contact-header section-nav-smooth parallax" style="background-image:url('../public/assets/construction/images/appel-offre.jpg');">
    <div class="overlay overlay-dark opacity-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="page-titles whitecolor text-center padding">
                    <h2 class="font-bold">Nous sommes Désolés !</h2>
                    <h4 class="font-light py-2">Candidature existante</h4>
                </div>
            </div>
        </div>
        <div class="bg-danger title-wrap mt-n5">
            <div class="row">
                <div class="col-lg-12 col-md-12 whitecolor">
                    <h3 class="float-left"><strong>Votre candidature a été déjà prise en compte pour cette offre</strong></h3>
                </div>
            </div>
        </div>
         <br>
    </div> 
</section>
@endsection
@section('script')
<script type="text/javascript">
            // redirect to google after 5 seconds
        window.setTimeout(function() {
            window.location.href = '#';
        }, 5000); 
</script>
@endsection