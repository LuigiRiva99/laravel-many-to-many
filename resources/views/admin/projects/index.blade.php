@extends('layouts.app')

@section('title', 'index')

@section('content')
    <main>
        <section>
            <div class="container">
                <div class="col-auto d-flex justify-content-between align-items-center ">
                    <h1>My projects</h1>
                    <a class="btn btn-light" href="{{route('admin.projects.create')}}">Add Project</a>
                </div>
            </div>
            <div class="container">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th class="type-col">Types</th>
                        <th>Technologies</th>
                        <th>Link</th>
                    </tr>
                    </thead>
                    <tbody  class="table-group-divider table-hover table-striped">
                    @foreach ($projects as $project)
                        <tr class="p-3">
                            <td>{{$project->id}}</td>
                            <td><a href="{{route('admin.projects.show', $project)}}"> {{$project->title}} </a></td>
                            <td>{{$project->description}}</td>
                            <td>{{optional($project->type)->name}}</td>
                            <td>
                                @foreach ($project->technologies as $tech)
                                {{$tech->name}}
                                @endforeach
                            </td>
                            <td>{{$project->link}}</td>
                            <td><a class="btn btn-primary" href="{{route('admin.projects.show', $project)}}">details </a></td>
                            <td>
                                {{-- modale delete --}}
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

                            </td>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
@endsection