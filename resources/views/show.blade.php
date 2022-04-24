
@extends('MasterLayout.layout')

@section('body')
    {{-- navbar  --}}
    <x-navbar />

    <div class="container">
      <div class="row" >
        <div class="col-sm-12 col-md-4">
          <div class="card text-center" style="height: 300px">
              <div class="card-header">
                {{ $blog->category->NAME }}
              </div>
              <div class="card-body">
                <h5 class="card-title">{{ $blog->title }}</h5>
                <p class="card-text">{{ $blog->detail }}</p>
              </div>
              <div class="card-footer text-muted">
                {{ $blog->created_at->diffForHumans() }}
              </div>
            </div>
            <div style="display: flex">

              @can('update-blog', $blog)
              <form action="">
                <div style="text-align: center">
                  <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary">Edit</a>
                </div>
                <div style="text-align: center">
                  <a href="  {{ route('blogs.delete',$blog->id) }}" class="btn btn-danger">Delete</a>
                </div>
              </form>
              @endcan

              <div style="text-align: center">
                <a href="{{ route('index')}}" class="btn btn-primary">Back</a>
              </div>
            </div>   
        </div>
      </div>
    </div>
  
@endsection