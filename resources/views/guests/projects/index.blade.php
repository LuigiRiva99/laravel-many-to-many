@extends('layouts.app')

@section('title', 'index')

@section('content')
    <main>
        <section>
            <div class="container">
                <div class="col-auto d-flex justify-content-between align-items-center ">
                    <h1>My projects</h1>
                </div>
            </div>
            <div class="container">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Types</th>
                        <th>Link</th>
                    </tr>
                    </thead>
                    <tbody  class="table-group-divider table-hover table-striped">
                    @foreach ($projects as $project)
                        <tr class="p-3">
                            <td>{{$project->id}}</td>
                            <td><a href="{{route('guests.projects.show', $project)}}"> {{$project->title}} </a></td>
                            <td>{{$project->description}}</td>
                            <td>{{optional($project->type)->name}}</td>
                            <td>{{$project->link}}</td>
                            <td><a class="btn btn-primary" href="{{route('guests.projects.show', $project)}}">details </a></td>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
@endsection