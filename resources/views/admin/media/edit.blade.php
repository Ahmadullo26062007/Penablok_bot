@extends('layouts.admin')

@section('content')
    <main class="content">
        <h1 class="h3 mb-3"><strong>Edit</strong> Category</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('media.update', $media->id) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                            <div class="mb-3 col">
                                <label for="media" class="form-label">Media</label>
                                <input type="file" required name="media"  class="form-control" id="media">
                            </div>
                                <div class="col">
                                    <img width="80px" src="{{ asset('uploads/'.$media->media)}}" alt="">
                                </div>
                                </div>
                            <div class="mb-3">
                                <label for="media" class="form-label">Category</label>

                                <select name="categories_id" required class="form-select" id="">
                                    <option></option>
                                    @foreach($categories as $id => $category)
                                        <option  @if($id==$media->categories_id) selected @endif  value=" {{$id}} ">{{$category}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-arrow-bar-up" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M8 10a.5.5 0 0 0 .5-.5V3.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 3.707V9.5a.5.5 0 0 0 .5.5zm-7 2.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                                Update
                            </button>
                            <a class="btn btn-secondary mt-3" href="{{route('media.index')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                </svg>
                                Back
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
