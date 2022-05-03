@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>
                Toutes les Categories
            </h4>
        </div>
      <div class="card-body">
          <table class="table">
              <thead>
              <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Image</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach( $category as $item )
                      <tr>
                          <th scope="row">{{ $item->id }}</th>
                          <td>
                              <img src="{{ asset('/asserts/uploads/category/'.$item->image ) }}" alt="image-all"/>
                          </td>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->description }}</td>

                          <td>
                              <a class="btn btn-primary" href="{{ url('edit-prod/'.$item->id)}}"> Editer </a>
                              <a class="btn btn-danger"  href="{{ url('delete-category/'.$item->id)}}">Supprimer</a>
                          </td>
                      </tr>
              </tbody>
              @endforeach
          </table>
      </div>
    </div>

@endsection
