@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h4 class=" float-left">Add New Product</h4>
                    <a data-toggle="modal" data-target="#addProduct" class="btn btn-dark float-right"><i class="fa fa-box"></i> Add Product</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-left">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product name</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Alert Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($products as $product)
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->brand}}</td>
                                <td>Rp. {{number_format($product->price)}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->alert_stock >= $product->quantity ? 'Low Stock' : 'Available'}}</td>
                                <td>
                                    <form action="{{route('product.destroy',$product->id)}}" method="post" class="d-inline">
                                        @method('delete') @csrf
                                        <a href="#" data-toggle="modal" data-target="#editProduct{{$product->id}}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are You Sure delete this product ?')">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <!-- modal edit -->
                            <div class="modal right fade" id="editProduct{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h3 class="modal-title" id="staticBackdropLabel">Edit User<h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                            <div class="modal-body">
                                                <form action="{{ route('product.update', $product->id) }}" method="post">
                                                    @method('PUT') @csrf
                                                        <div class="form-group">
                                                            <label for="product_name">Product name</label>
                                                            <input id="product_name" 
                                                                type="text" 
                                                                class="form-control @error('product_name') is-invalid @enderror" 
                                                                name="product_name" 
                                                                 value="{{ old('product_name') ? old('product_name') : $product->product_name }}"
                                                                required autocomplete="product_name" 
                                                                autofocus>
                                                                @error('product_name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="brand">Brand</label>
                                                            <input id="brand" 
                                                                type="text" 
                                                                class="form-control @error('brand') is-invalid @enderror" 
                                                                name="brand" 
                                                                value="{{ old('brand') ? old('brand') : $product->brand }}"
                                                                required  
                                                                autofocus>
                                                                @error('brand')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="price">Price</label>
                                                            <input id="price" 
                                                                type="text" 
                                                                class="form-control @error('price') is-invalid @enderror" 
                                                                name="price" 
                                                                 value="{{ old('price') ? old('price') : $product->price }}"
                                                                required  
                                                                autofocus>
                                                                @error('price')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="quantity">Quantity</label>
                                                            <input id="quantity" 
                                                                type="number" 
                                                                class="form-control @error('quantity') is-invalid @enderror" 
                                                                name="quantity" 
                                                                value="{{ old('quantity') ? old('quantity') : $product->quantity }}"
                                                                required  
                                                                autofocus>
                                                                @error('quantity')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="alert_stock">alert_stock</label>
                                                            <input id="alert_stock" 
                                                                type="number" 
                                                                class="form-control @error('alert_stock') is-invalid @enderror" 
                                                                name="alert_stock" 
                                                                value="{{ old('alert_stock') ? old('alert_stock') : $product->alert_stock }}"
                                                                required  
                                                                autofocus>
                                                                @error('alert_stock')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="description">Desc</label>
                                                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5" cols="3" id="description">{{ old('description') ? old('description') : $product->description }}</textarea>
                                                            @error('description')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary btn-block">Save User</button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                     </div>
                                     @php $no++; @endphp
                            @endforeach
                        </tbody>
                        {{$products->links()}}
                    </table>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <h4>Search</h4>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>


<!-- modal tambah user -->
 <div class="modal right fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h3 class="modal-title" id="staticBackdropLabel">Add Product</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
                <form action="{{ route('product.store') }}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="product_name">Product name</label>
                            <input id="product_name" 
                                type="text" 
                                class="form-control @error('product_name') is-invalid @enderror" 
                                name="product_name" 
                                value="{{ old('product_name') }}" 
                                required autocomplete="product_name" 
                                autofocus>
                                @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="brand">Brand</label>
                            <input id="brand" 
                                type="text" 
                                class="form-control @error('brand') is-invalid @enderror" 
                                name="brand" 
                                value="{{ old('brand') }}" 
                                required  
                                autofocus>
                                @error('brand')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>


                        <div class="form-group">
                            <label for="price">Price</label>
                            <input id="price" 
                                type="number" 
                                class="form-control @error('price') is-invalid @enderror" 
                                name="price" 
                                value="{{ old('price') }}" 
                                required  
                                autofocus>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>


                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input id="quantity" 
                                type="number" 
                                class="form-control @error('quantity') is-invalid @enderror" 
                                name="quantity" 
                                value="{{ old('quantity') }}" 
                                required  
                                autofocus>
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>


                        <div class="form-group">
                            <label for="alert_stock">alert_stock</label>
                            <input id="alert_stock" 
                                type="number" 
                                class="form-control @error('alert_stock') is-invalid @enderror" 
                                name="alert_stock" 
                                value="{{ old('alert_stock') }}" 
                                required  
                                autofocus>
                                @error('alert_stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Desc</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5" cols="3" id="description"></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-block">Save Product</button>
                        </div>
                </form>
            </div>
        </div>
     </div>
</div>



</div>

<style>
  .modal.right .modal-dialog{
    top: 0;
    right: 0;
    margin-right: 20vh;
  }  

  .modal.fade:not(.in).right .modal-dialog{
    -webkit-transform: translate3d(25%,0,0) ;
    transform: translate3d(25%,,0,0);
  }
</style>

@endsection
