@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>
                Tout les produits
            </h4>
        </div>
      <div class="card-body table-responsive text-nowrap">
          <table class="table  ">
              <thead>
              <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Catégorie</th>
                  <th scope="col">Image</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Prix HT</th>
                  <th scope="col">Prix TTC</th>
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach( $products as $item )
                      <tr>
                          <th scope="row">{{ $item->id }}</th>
                          <td>{{ $item->category->name }}</td>
                          <td>
                              <img src="{{ asset('/asserts/uploads/products/'.$item->image ) }}" alt="image-all"/>
                          </td>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->original_price }}</td>
                          <td>{{ $item->selling_price }}</td>
                          <td>{{ $item->description }}</td>

                          <td>
                              <a class="btn btn-primary btn-sm" href="{{ url('edit-product/'.$item->id)}}"> Editer </a>
                              <a class="btn btn-danger btn-sm"  href="{{ url('delete-product/'.$item->id)}}">Supprimer</a>
                          </td>
                      </tr>
              </tbody>
              @endforeach
          </table>
      </div>
    </div>

@endsection
