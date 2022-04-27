@extends('MasterLayout.layout')
@section('body')
    <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach ($categories as $category)
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $category->name }}</td>
                <td>
                  <button class="btn btn-primary d-flex">edit</button>
                  <form action="{{ route('categories.delete',$category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">delete</button>
                  </form> 
                </td>
                @endforeach
              
              </tr>
            </tbody>
          </table>
    </div>
@endsection