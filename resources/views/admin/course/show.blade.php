@extends('admin.index')
@section('content')
<div class="content-main">
    <div class="px-4">
        <h1>Course</h1>
        <form action="{{ route('search') }}" method="get" name="advance_search">
            <div class="search d-flex justify-content-center justify-content-sm-start">
                <div class="input-group md-form form-sm form-1 input-group-search">
                    <input class="form-control my-0 py-1 input-text" name="key" value="{{ request("key") }}" type="text" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <span class="input-group-text btn btn-search-icon" id="basic-text1"><i class="fas fa-search text-black"
                            aria-="true"></i>
                        </span>
                    </div>
                </div>
                <button class="btn btn-filter mx-3 btn-search" type="submit"  id="btnSearch"> Search </button>
            </div>
        </form>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">introduction</th>
                <th scope="col">Price</th>
                <th scope="col">Tags</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td><img src="" alt=""></td>
                <td>Otto</td>
                <td>@mdo</td>
                <td></td>
                <td></td>
                <td>
                    <a href="#"><span class="bg-danger tool px-2 py-1 m-1"><i class="fas fa-trash"></i></span></a>
                    <a href="#"><span class="bg-primary tool px-2 py-1 m-1"><i class="fas fa-save"></i></span></a>
                </td>
              </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection