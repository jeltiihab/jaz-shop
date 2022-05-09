@extends('layouts.admin')

@section('content')
    <div class="card">
    <div class="card-header">
          <h1>
              Ajouter un produit
          </h1>
      </div>
      <div class="card-body">
          <form action="{{ url('insert-product')}} " method="POST" enctype="multipart/form-data">
            @csrf 
          <div class="row">
                  <div class="col-md-12 mb-3">
                        <select class="form-select" name="cate_id" >
                        <option selected>Sélectionner une catégorie</option>
                        @foreach($category as $item)
                           <option value="{{$item->id}}">{{$item->name}}</option>

                        @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="col-md-6">
                        <label for="">Liens</label>
                        <input type="text" class="form-control" name="slug">
                    </div>

                    <div class="col-md-6">
                      <label for="">Courte description</label>
                      <input type="text" class="form-control" row="3" name="small_description">
                    </div>
                    
                    <div class="col-md-6 pt-4">
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                        <label for="">Popularité</label>
                        <input type="checkbox" name="trending">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <input type="text" class="form-control" row="3" name="description">
                    </div>

                    <div class="col-md-6">
                        <label for="">Prix HT</label>
                        <input type="number" class="form-control" name="original_price">
                    </div>

                    <div class="col-md-6">
                        <label for="">Prix ttc</label>
                        <input type="number" class="form-control" name="selling_price">
                    </div>

                    <div class="col-md-6">
                        <label for="">Tva</label>
                        <input type="number" class="form-control" name="tax">
                    </div>
                    
                    <div class="col-md-6">
                        <label for="">Quantité</label>
                        <input type="number" class="form-control" name="qty">
                    </div>
       
                    <div class="col-md-6">
                        <label for="">meta-Title</label>
                        <input type="text" class="form-control" name="meta_title">
                    </div>
                    
                    <div class="col-md-6">
                        <label for="">meta keywords</label>
                        <input type="text" class="form-control" name="meta_keywords">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Meta descrip</label>
                        <input type="text" class="form-control" name="meta_description">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image"  name="image">
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
