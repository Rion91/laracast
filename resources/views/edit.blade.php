@extends('MasterLayout.layout')
@section('body')
    <x-navbar />

    <div class="container">
        <form action="{{ route('blogs.update',$blog->id) }}" method="POST">
            @csrf
            @method('PUT')
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $blog->title }}">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Detail</label>
                <textarea class="form-control" name="detail" id="exampleFormControlTextarea1" rows="3">{{ $blog->detail }}</textarea>
              </div>

              <select class="form-select" name="category_id" aria-label="Default select example">
                <option selected>Select Something</option>
                @foreach ($categories as $id => $category)
                    <option value="{{ $id }}">{{ $category }}</option>
                @endforeach
              </select>

            <button type="submit" class="btn btn-primary" style="margin-top : 5px">Save</button>
        
        </form>
    </div>
@endsection