@extends('layout')

@section('title','DASHBOARD')

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
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="col-md-8 offset-md-2 bottom35">
                          @if (session('msg'))
                    <div class="alert alert-success" role="alert">
                      Offre Publiée !
                    </div>
                    @endif
                    </div>
                </div>
                 <div class="col-md-6 offset-md-3 form-group wow fadeInUp" data-wow-delay="700ms">
                        <button type="submit" class="btn button btn-blue btn-block w-100" data-toggle="modal" data-target="#ModalCenter">Extraire les soumissionnaires</button>
                </div>
                <div class="col-md-6 offset-md-3 form-group wow fadeInUp" data-wow-delay="700ms">
                    <button type="submit" class="btn button btn-blue btn-block w-100" data-toggle="modal" data-target="#exampleModalCenter">Publier une offre</button>
                </div>
            </div>
            <div class="row">
                <div class="alert alert-info col-md-4 offset-md-4 wow fadeInUp" role="alert">
                     <span><h3><strong>{{$list->count()}}</strong> Offre(s)</h3></span>
                </div>
            </div>
            <!-- debut table -->
            <div class="row">
                <div class="col-md-12 col-lg-12 wow fadeInUp" data-wow-delay="700ms">
                  <table class="table table-hover data-table">
                    <thead>
                      <tr>
                         <th class="text-dark font-weight-bold" scope="col">id</th>
                        <th class="text-dark font-weight-bold" scope="col">Titre</th>
                        <th class="text-dark font-weight-bold" scope="col">Date de publication</th>
                        <th class="text-dark font-weight-bold" scope="col">Date limite</th>
                        <th class="text-dark font-weight-bold" scope="col">Fichier joint</th>
                        <th class="text-dark font-weight-bold" scope="col">Postée par</th>
                        <th class="text-dark font-weight-bold" scope="col" colspan="2">Actions</th>
                      </tr>
                    </thead>
                    <tbody style="color:#000000;">
                      @foreach($list as $row)
                    <tr>
                      <td class="text-dark" scope="col">{{$row->id}}</td>
                      <td class="text-dark" scope="col">{{$row->titre}}</td>
                      <td class="text-dark" scope="col">{{$row->date_publication}}</td>
                      <td class="text-dark" scope="col">{{$row->date_limite}}</th>
                      <td class="text-dark" scope="col">{{$row->fichier}}</td>
                      <td class="text-dark" scope="col">{{$row->name}}</td>
                      <td class="text-dark" scope="col"><a href="/edition_offre/{{$row->id}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Modifier</a>
                      </td>
                      <td class="text-dark font-weight-bold" scope="col"><a href="/supp_offre/{{$row->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Supp</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6 offset-md-3 form-group wow fadeInUp" data-wow-delay="700ms"><br>
                    <button type="submit" class="btn button btn-blue btn-block w-100" data-toggle="modal" data-target="#ModalCenter">Extraire les soumissionnaires</button>
                </div>
            </div>
            
            <!-- Fin de table -->
        </div>
    </div>
</section>


<!-- Modal -->
!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLongTitle">APPEL D'OFFRE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{Route('publier')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="titre">Titre</label>
            <input type="hidden" name="user" value="{{{ Auth::user()->id}}}">
            <input type="text" class="form-control" id="titre" aria-describedby="emailHelp" placeholder="titre de l'appel d'offre" name="titre" required="">
          </div>
          <div class="form-group">
            <label for="date">NOM COURT</label>
            <input type="text" class="form-control" name="alias" placeholder="Ex:Moteur" name="titre" required="">
          </div>
          <div class="form-group">
            <label for="date">Date limite</label>
            <input type="date" class="form-control" id="date" name="date" required="">
          </div>
          <div class="form-group">
            <label for="fle">Fichier</label>
            <input type="file" class="form-control" id="fle" name="file" required="">
          </div>
          <div class="form-group">
            <label for="detail">Détails</label>
            <textarea class="form-control" id="detail" name="details" rows="2"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Mettre en ligne</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal extraction-->
<div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">EXTRACTION DE FICHIER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{Route('export')}}">
          @csrf
          <div class="form-group">
            <label for="offre">Choisir l'offre </label>
            <select name="id" class="form-control" id="offre" required="">
              <option value="">Choisir ...</option>
              @foreach($list as $row)
                <option value="{{$row->id}}">{{$row->titre}}</option>
                @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-success">Télécharger</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
@endsection

