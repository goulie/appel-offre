@extends('layout')

@section('title','Editer offre')

@section('contenu')
<!--Page Header ends -->
<section id="stayconnect1" class="bglight position-relative padding_top padding_bottom_half noshadow">
    <div class="container-fluid whitebox">
        <div class="widget py-5">
            <div class="row">
                <div class="col-md-12 text-center wow fadeIn mt-n3" data-wow-delay="300ms">
                    <h3 class="heading bottom30 darkcolor font-light2 pt-1"><span class="font-weight-bold"></span>
                    </h3>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                       Connecté en tant que <strong> {{{ Auth::user()->name }}} !</strong>
                    </div>
                </div>
                <div class="col-md-6 offset-md-3 form-group wow fadeInUp" data-wow-delay="700ms">
                  <div class="modal-body">
                    <form method="POST" action="{{Route('confirm')}}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                        <input type="hidden" name="post_id" value="{{$list->id}}">
                        <input type="text" class="form-control"  aria-describedby="emailHelp" name="titre" required="" value="{{$list->titre}}">
                      </div>
                      <div class="form-group">
                        <label for="date">Date limite</label>
                        <input type="date" class="form-control" name="date_l" value="{{$list->date_limite}}">
                      </div>
                      <div class="form-group">
                        <label for="fle">Fichier</label>
                        <input type="file" class="form-control" name="file" value="{{$list->fichier}}">{{$list->fichier}}
                      </div>
                      <div class="form-group">
                        <label for="detail">Détails</label>
                        <textarea class="form-control" id="detail" name="details" rows="2" >{{$list->details}}</textarea>
                      </div>
                      <button type="submit" class="btn btn-success">Enregistrer</button>
                    </form>
                  </div>
                  @if (session('ok'))
                  <div class="row">
                    <div class="col-md-12">
                      <div class="alert alert-success mx-auto">
                        Modification éffectuée avec succèss !
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 mx-auto">
                      <a type="button" href="/home" class="btn btn-danger"><i class="fa fa-backward"></i> Quitter</a>
                    </div>
                  </div>
                  @endif
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="editer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">APPEL D'OFFRE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>


@endsection

