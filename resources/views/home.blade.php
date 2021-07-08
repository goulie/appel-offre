@extends('layout')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

@endsection

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
                     <span><h3><strong>{{$nbr->count()}}</strong> Inscrit(s)</h3></span>
                </div>
            </div>
            <!-- debut table -->
            <div class="row">
                <div class="col-md-12 col-lg-12 wow fadeInUp" data-wow-delay="700ms">
                  <table class="table table-hover data-table">
                    <thead>
                      <tr>
                         <th class="text-dark font-weight-bold" scope="col">id</th>
                         <th class="text-dark font-weight-bold" scope="col">Offre</th>
                        <th class="text-dark font-weight-bold" scope="col">Dénomination</th>
                        <th class="text-dark font-weight-bold" scope="col">Représentant</th>
                        <th class="text-dark font-weight-bold" scope="col">Fonction</th>
                        <th class="text-dark font-weight-bold" scope="col">Point Focal</th>
                        <th class="text-dark font-weight-bold" scope="col">Contact (s)</th>
                        <th class="text-dark font-weight-bold" scope="col">Email</th>
                        <th class="text-dark font-weight-bold" scope="col">Date</th>
                      </tr>
                    </thead>
                    <tbody>

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
            <input type="text" class="form-control" name="alias" placeholder="Ex:Moteur" name="titre" required="" >
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
              @foreach($data as $row)
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
@section ('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('home') }}",
        

        columns: [
            {data: 'id', name: 'id'},
            {data: 'alias', name: 'alias'},
            {data: 'denomination', name: 'denomination'},
            {data: 'representant', name: 'representant'},
            {data: 'fonct_representant', name: 'fonct_representant'},
            {data: 'point_focal', name: 'point_focal'},
            {data: 'telephone', name: 'telephone'},
            {data: 'email', name: 'email'},
            {data: 'date', name: 'date'},

            //{data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>
@endsection
