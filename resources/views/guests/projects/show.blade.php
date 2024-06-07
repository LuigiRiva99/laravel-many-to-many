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
                    <a class="btn btn-secondary" href="{{ route('guests.projects.index', $project) }}">Back</a>
                </div>

                @if($project->type)
                    <div class="container mt-4">
                        <h4><strong>Related projects</strong></h4>
                        
                        @foreach($project->type->projects as $related_project)
                            {{-- controllo per non mostrare il progetto corrente --}}
                            @if($related_project->id !== $project->id)
                                <div>
                                    <h3><a href="{{ route('guests.projects.show',$related_project) }}">
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
