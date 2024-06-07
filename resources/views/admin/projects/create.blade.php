@extends('layouts.app')

@section('content')

<main>
  <section>
    <div class="container">
        <h2 class="fs-2">Aggiungi Progetto</h2>
    </div>
    <div class="container">
        <form  action="{{ route('admin.projects.store') }}" method="POST">
            {{-- Cross Site Request Forgering --}}
            @csrf 

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Project title">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrption</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description"></textarea>
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
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

            <button class="btn btn-primary">Aggiungi</button>
        </form>

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