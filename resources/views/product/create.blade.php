@extends('master')
@section('content')
    <div class="container">
        <h2>Create Product</h2>
        <form action="/createPost">
            <div class="form-group">
                <label for="product-name">Product Name</label>
                <input type="text" class="form-control" id="product-name" name="product-name" aria-describedby="product-name" placeholder="Enter Product Name...">
            </div>
            <div class="form-group">
                <label for="product-weight">Product Weight</label>
                <input type="number" class="form-control" id="product-weight" name="product-weight" placeholder="Product Weight">
            </div>
            <div class="form-group">
                <label for="product-price">Product Price</label>
                <input type="number" class="form-control" id="product-price" name="product-price" placeholder="Product Price">
            </div>
            <div class="form-group">
                <label for="product-date">Product Date</label>
                <input type="date" class="form-control" id="product-date" name="product-date" placeholder="Product Date">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
   </div>
@endsection
