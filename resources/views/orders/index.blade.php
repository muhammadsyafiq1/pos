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
                    <h4 class=" float-left">Order products</h4>
                    <a data-toggle="modal" data-target="#addProduct" class="btn btn-dark float-right"><i class="fa fa-box"></i> Add Product</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-left">
                        <thead>
                            <tr>
                                <th>Product name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Discount %</th>
                                <th>Total</th>
                                <th>
                                    <a href="#" class="btn btn-sm btn-success add_more"><i class="fa fa-plus-circle"></i></a>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="addMoreProduct">
                            <tr>
                                <td>
                                    <select name="product_id" class="form-control">
                                        <option value="0" selected disabled>--Choose--</option>
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}">
                                                {{$product->product_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="quantity[]" id="quantity" class="form-control">
                                </td>
                                <td>
                                    <input type="number" name="price[]" id="price" class="form-control">
                                </td>
                                <td>
                                    <input type="number" name="discount[]" id="discount" class="form-control">
                                </td>
                                <td>
                                    <input type="number" name="total[]" id="total" class="form-control">
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-danger remove"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <h4>Total 0.00</h4>
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

@push('script')
 <script src="{{ asset('vendor/jquery/jquery.slim.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            alert(1);
        })
    </script>
@endpush
