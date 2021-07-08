@extends('layout')

@section('title','NOS OFFRES')

@section('contenu')
<!--Page Header-->
<section id="main-banner-page" class="position-relative page-header contact-header section-nav-smooth parallax" style="background-image:url('../public/assets/construction/images/offer.jpg');">
    <div class="overlay overlay-dark opacity-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="page-titles whitecolor text-center padding">
                    <h2 class="font-bold">NOS APPELS D'OFFRE</h2>
                    <h4 class="font-light py-2"> </h4>
                </div>
            </div>
        </div>
        <div class="bg-blue title-wrap mt-n5">
            <div class="row">
                <div class="col-lg-12 col-md-12 whitecolor">
                    <h3 class="float-left">LISTE DES OFFRES</h3>

                </div>
            </div>
        </div>
    </div>
</section>
<!--Page Header ends -->
<!-- Contact US -->
<section id="ourblog" class="padding_top padding_bottom_half">
    <div class="container">
        <h2 class="d-none"></h2>
        <div class="row">
            <div class="col-lg-12">
                @foreach($data as $row)
                <article class="blog-item heading_space wow fadeIn text-center text-md-left" data-wow-delay="300ms"><br>
                    <div class="image"><img src="../public/assets/construction/images/afwa-logo.jfif" alt="logo-afwa" alt="logo" style="width:60px;height:auto;"></div>
                    <h3 class="darkcolor font-light bottom10 top30"> <strong>{{$row->titre}}</strong></h3>
                    <ul class="commment darkcolor">
                        <li><i class="fas fa-calendar"></i>Publiée le {{$row->date_publication}}</a></li>
                        <?php $date = date('d-M-Y') ?>
                            @if($row->date_limite >= $date)
                        <li class="bg-success text-white" style="padding:5px">
                            <i class="fas fa-check-square"></i> Validité: <strong>{{$row->date_limite}}</strong>
                        </li>
                         @else
                        <li class="bg-danger text-white" style="padding:5px">
                            <i class="fas fa-times"></i> Expirée: <strong>{{$row->date_limite}}</strong>
                        </li>
                        @endif
                        <li><i class="fas fa-user darkcolor text-bold"></i>Association Africaine de l'EAU</li>
                    </ul>
                    <p class="top15">{{$row->details}}</p>
                        <a class=" button btn-blue" href="/offres/{{$row->id}}">Postuler à cette offre</a>
                </article>
                @endforeach
                {{ $data->links() }}
            </div>
        </div>
    </div>
</section>
@endsection