@extends('MasterLayout.layout')
@section('body')
    <x-navbar />

    <div class="container">
      <div class="d-flex">
        <form action="{{ route('categories.store') }}" class="p-3 border border-primary col-sm-12 col-md-6" method="POST">
          @csrf
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Name</label>
              <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Category Name">
            </div>
  
    
          <button type="submit" class="btn btn-primary" style="margin-top : 5px">Save</button>
      
        </form>

        <form action="{{ route('blogs.store') }}" class="p-3 border border-primary col-sm-12 col-md-6" method="POST">
          @csrf
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Title</label>
              <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Detail</label>
              <textarea class="form-control" name="detail" id="exampleFormControlTextarea1" rows="3" placeholder="Type something here"></textarea>
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
    </div>
@endsection