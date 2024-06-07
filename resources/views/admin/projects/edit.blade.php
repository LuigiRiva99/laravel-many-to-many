@extends('layouts.app')

@section('content')

<main>
  <section>
    <div class="container">
        <h2 class="fs-2">Edit</h2>
    </div>
    <div class="container">
        <form  action="{{ route('admin.projects.update', $project) }}" method="POST">
            {{-- Cross Site Request Forgering --}}
            @csrf 
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholsder="Project title">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrption</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description"></textarea>
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Titolo</label>
                <select class="form-control" name="type_id" id="type_id">
                    <option value="">Select type</option>
                    @foreach($types as $type) 
                        <option value="{{ $type->id }}"> {{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <input type="text" name="link" class="form-control" id="link" placeholder="link">
            </div>

            <button class="btn btn-primary my-2">Add changes</button>
        </form>

        {{-- modale delete --}}
        <div>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$project->id}}">
                Delete
            </button>
            
            <div class="modal fade" id="deleteModal{{$project->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Attention</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Do you really want to delete <strong>{{ $project->title }}</strong> ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            
                            <form class="delete-project" action="{{ route('admin.projects.destroy',$project) }}" method="POST">

                                
                                @method('DELETE')
                                @csrf
                
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <a class="btn btn-secondary my-2" href="{{ route('admin.projects.show', $project) }}">Back</a>


        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
  </section>
</main>

@endsection