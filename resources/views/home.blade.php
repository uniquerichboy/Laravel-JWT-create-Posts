@extends('layouts.app')

@section('content')
<div class="container">
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Create post</button>
       
        @if(count($post) < 1)
            <h1 style="text-align:center">POSTS IN REALTIME NONE :(</h1>
        @endif

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach($post as $p)
        <div class="col">
          <div class="card shadow-sm">
            <div class="card-body">
                <img src="{{$p->img}}" alt="" style="width: 146px;border-radius: 5px;">
              <p class="card-text">{{$p->firstname}} {{$p->lastname}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#info{{$p->id}}">View</button>
                <a href="{{ route('delete', ['id' => $p->id]) }}">
                    <button type="button" class="btn btn-sm btn-danger">delete</button>
                </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('create') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-first" class="col-form-label">First name:</label>
                        <input type="text" name="firstname" class="form-control" id="recipient-first">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-last" class="col-form-label">Last name:</label>
                        <input type="text" name="lastname" class="form-control" id="recipient-last">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-email" class="col-form-label">E-mail:</label>
                        <input type="email" name="email" class="form-control" id="recipient-email">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-photo" class="col-form-label">Photo:</label>
                        <input type="file" name="img[]" class="form-control" id="recipient-photo">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-number" class="col-form-label">Number passport:</label>
                        <input type="number" name="number" class="form-control" id="recipient-number">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-country" class="col-form-label">Country create passport:</label>
                        <input type="text" name="country" class="form-control" id="recipient-country">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-data" class="col-form-label">Data create passport:</label>
                        <input type="date" name="data" class="form-control" id="recipient-data">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-end" class="col-form-label">Data end passport:</label>
                        <input type="date" name="end" class="form-control" id="recipient-end">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send post</button>
            </div>
            </form>
            </div>
        </div>
    </div>

    @foreach($post as $p)
    <div class="modal fade" id="info{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-first" class="col-form-label">Info with Json:</label>
                        <textarea class="form-control" disabled rows="10" cols="45">
                        {{$p}}
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    </div>
</div>
@endsection
