@extends('layouts.app')

@section('content')
    <main>
        <section>
            <div class="container">
                <div class="col-auto text-center">
                    <h1>{{$project->title}}</h1>
                </div>
            </div>
            <div class="container">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Link</th>
                    </tr>
                    </thead>
                    <tbody  class="table-group-divider table-hover table-striped">
                        <tr class="p-3">
                            <td>{{$project->id}}</td>
                            <td>{{$project->title}}</td>
                            <td>{{$project->description}}</td>
                            <td>{{optional($project->type)->name}}</td>
                            <td>{{$project->link}}</td>
                        </tr>    
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">
                    <a class="btn btn-secondary" href="{{ route('admin.projects.index', $project) }}">Back</a>

                    <div class="d-flex">
                        <a class="btn btn-info mx-2" href="{{ route('admin.projects.edit', $project) }}">Edit</a>
    
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
                    </div>

                </div>

                @if($project->type)
                    <div class="container mt-4">
                        <h4><strong>Related projects</strong></h4>
                        
                        @foreach($project->type->projects as $related_project)
                            {{-- controllo per non mostrare il progetto corrente --}}
                            @if($related_project->id !== $project->id)
                                <div>
                                    <h3><a href="{{ route('admin.projects.show',$related_project) }}">
                                        {{ $related_project->title }}  
                                    </a></h3>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    </main>
@endsection
