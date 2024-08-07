@extends('components.layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="mb-3" for="name">Product Name:</label>
                <input type="text" name="name" id="name" class="form-control">
                <label class="mb-3" for="description">Description:</label>
                <textarea class="form-control" name="description" id="description"></textarea>
                <label class="mb-3" for="name">Product Price:</label>
                <input type="text" name="price" id="price" class="form-control">
                <label class="mb-3" for="image">Image:</label>
                <input type="file" name="image" id="image" class="form-control">
                <button class="btn btn-success mt-4" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection