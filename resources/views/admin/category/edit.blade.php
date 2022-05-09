@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>
                Modifier une Categorie
            </h1>
        </div>
        <div class="card-body">
            <form action="{{ url('update-category/'.$category->id)}} " method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                   
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                    </div>

                    <div class="col-md-6">
                        <label for="">slug</label>
                        <input type="text" class="form-control" name="slug" value="{{ $category->slug }}">
                    </div>

                    <div class="col-md-12">
                        <label for="">description</label>
                        <input type="text" class="form-control" row="3" name="description"  value="{{ $category->description }}">
                    </div>

                    <div class="col-md-6">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="meta_title"  value="{{ $category->mate_title }}">
                    </div>
                    <div class="col-md-6 pt-4">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" {{ $category->status == "1" ? 'checked' : '' }}>
                        <label for="">Polularité</label>
                        <input type="checkbox" name="popular" {{ $category->popular == "1" ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta descrip</label>
                        <textarea type="text" class="form-control"  row="3" name="meta_descrip"  value="{{ $category->meta_descrip }}"></textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="">meta keywords</label>
                        <textarea type="text" class="form-control" row="3" name="meta_keywords"  value="{{ $category->meta_keywords }}" ></textarea>
                    </div>
                   
                     @if($category->image)
                        <img class="w-50" src="{{ asset('/asserts/uploads/category/'.$category->image ) }}" alt="image-edit"/>
                    @endif
                    <div class="col-md-6 mb-3">
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image"  name="image"  value="{{ $category->image }}">
                    </div>

                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary ">
                            Editer
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
