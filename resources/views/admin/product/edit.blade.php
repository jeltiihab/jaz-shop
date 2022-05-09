@extends('layouts.admin')

@section('content')
    <div class="card">
    <div class="card-header">
          <h1>
              Modifier le produit
          </h1>
      </div>
      <div class="card-body">
          <form action="{{ url('update-product/'.$products->id)}} " method="POST" enctype="multipart/form-data">
            @csrf 
            @method('PUT')
          <div class="row">
                  <div class="col-md-12 mb-3">
                        <select class="form-select" name="cate_id" >
                        <option >{{ $products->category->name}}</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$products->name}}">
                    </div>

                    <div class="col-md-6">
                        <label for="">Liens</label>
                        <input type="text" class="form-control" name="slug" value="{{$products->slug}}">
                    </div>

                    <div class="col-md-6">
                      <label for="">Courte description</label>
                      <input type="text" class="form-control" row="3" name="small_description" value="{{$products->small_description}}">
                    </div>
                    
                    <div class="col-md-6 pt-4">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" {{ $products->status == "1" ? 'checked' : '' }}>
                        <label for="">Popularité</label>
                        <input type="checkbox" name="trending"  {{ $products->trending == "1" ? 'checked' : '' }}>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <input type="text" class="form-control" row="3" name="description" value="{{$products->description}}">
                    </div>

                    <div class="col-md-6">
                        <label for="">Prix HT</label>
                        <input type="number" class="form-control" name="original_price" value="{{$products->original_price}}">
                    </div>

                    <div class="col-md-6">
                        <label for="">Prix ttc</label>
                        <input type="number" class="form-control" name="selling_price" value="{{$products->selling_price}}">
                    </div>

                    <div class="col-md-6">
                        <label for="">Tva</label>
                        <input type="number" class="form-control" name="tax" value="{{$products->tax}}">
                    </div>
                    
                    <div class="col-md-6">
                        <label for="">Quantité</label>
                        <input type="number" class="form-control" name="qty" value="{{$products->qty}}">
                    </div>
       
                    <div class="col-md-6">
                        <label for="">meta-Title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{$products->meta_title}}">
                    </div>
                    
                    <div class="col-md-6">
                        <label for="">meta keywords</label>
                        <input type="text" class="form-control" name="meta_keywords" value="{{$products->meta_keywords}}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Meta descrip</label>
                        <input type="text" class="form-control" name="meta_description" value="{{$products->meta_description}}">
                    </div>

                     @if($products->image)
                        <img class="w-50 h-50" src="{{ asset('/asserts/uploads/products/'.$products->image ) }}" alt="image-edit"/>
                    @endif
                    <div class="col-md-6 mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image"  name="image" value="{{$products->img}}">
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
