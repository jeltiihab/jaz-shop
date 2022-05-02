@extends('layouts.admin')

@section('content')
    <div class="card">
    <div class="card-header">
          <h1>
              Ajouter une Categorie 
          </h1>
      </div>
      <div class="card-body">
          <form action="{{ url('insert-category')}} " method="POST" enctype="multipart/form-data">
            @csrf 
          <div class="row">
                  <div class="col-md-6">
                      <label for="">Name</label>
                      <input type="text" class="form-control" name="name">
                  </div>

                  <div class="col-md-6">
                      <label for="">slug</label>
                      <input type="text" class="form-control" name="slug">
                  </div>

                  <div class="col-md-6">
                      <label for="">description</label>
                      <input type="text" class="form-control" row="3" name="description">
                  </div>

                  <div class="col-md-6">
                      <label for="">Status</label>
                      <input type="checkbox" name="status">
                        <label for="">Polularité</label>
                      <input type="checkbox" name="popular">
                  </div>

    
                  <div class="col-md-6">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control" type="file" id="image"  name="image">
                  </div>

                  <div class="col-md-6">
                      <label for="">Title</label>
                      <input type="text" class="form-control" name="meta_title">
                  </div>

                  <div class="col-md-6">
                      <label for="">Meta descrip</label>
                      <input type="text" class="form-control" name="meta_descrip">
                  </div>

                  <div class="col-md-6">
                      <label for="">meta keywords</label>
                      <input type="text" class="form-control" name="meta_keywords">
                  </div>

                  <div class="col-md-6">
                     <button type="submit" class="btn btn-primary">
                          Envoyer
                      </button>
                  </div>
                </div>
          </form>
      </div>
    </div>

@endsection
