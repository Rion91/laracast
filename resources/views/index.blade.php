@extends('MasterLayout.layout')

@section('body')
    {{-- navbar  --}}
    <x-navbar />
    
    {{-- blog --}}
    <div class="container ">
      <div class="dropdown">
        <button class="btn btn-pirmary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
          Category
        </button>
        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
          @foreach ($categories as $category)
              <li><a href="?category={{ $category }}{{ request('search')? '&search='.request('search') : '' }}" style="text-decoration: none;">{{ $category }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>

    {{-- <div class="container">
      <div x-data="{ show: false}" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown">
        <button @click=" show=true ">Categories</button>
        <div x-show="show">
          @foreach ($categories as $id=> $category)
            <a href="#">{{ $category }}</a>
          @endforeach
        </div>
      </div>
    </div> --}}

    
    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-sm-12 col-md-4 my-2">
              <div class="card text-center">
                  <div class="card-header">
                    {{-- {{ optional($blog->category->name) }} --}}
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">{{ $blog->title }}</h5>
                    <p class="card-text">{{ $blog->detail }}</p>
                    <a href="{{ route('blogs.show', $blog->id )}}" class="btn btn-primary">See More</a>
                  </div>
                  <div class="card-footer text-muted">
                    {{ optional($blog->created_at)->diffForHumans() }}
                  </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
    {{-- {{ $blogs->links() }} --}}

@endsection