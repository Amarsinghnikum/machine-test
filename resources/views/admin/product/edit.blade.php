@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Product</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('/update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data" id="update_products">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ $products->name }}" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" value="{{ $products->slug }}" class="form-control">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" rows="3" class="form-control">{{ $products->description }}</textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="original_price" class="form-label">Original Price</label>
                    <input type="number" name="original_price" value="{{ $products->original_price }}"
                        class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="selling_price" class="form-label">Selling Price</label>
                    <input type="number" name="selling_price" value="{{ $products->selling_price }}"
                        class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="qty" class="form-label">Quantity</label>
                    <input type="number" name="qty" value="{{ $products->qty }}" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="status"
                            {{ $products->status == "1" ? "checked" : "" }}>
                        <label for="status" class="form-check-label">Status</label>
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                    <img src="{{ url('assets/uploads/products/'.$products->image) }}" class="img-thumbnail mt-2"
                        width="100px" height="100px" alt="Product Image">
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="updateProduct">Update Product</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection