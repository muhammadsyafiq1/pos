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
                                <th>#</th>
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
                                <td>1</td>
                                <td>
                                    <select name="product_id" class="form-control product_id" id="product_id">
                                        <option value="0" selected disabled>--Choose--</option>
                                        @foreach($products as $product)
                                            <option data-price="{{$product->price}}" value="{{$product->id}}">
                                                {{$product->product_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="quantity[]" id="quantity" class="form-control quantity">
                                </td>
                                <td>
                                    <input type="number" name="price[]" id="price" class="form-control price">
                                </td>
                                <td>
                                    <input type="number" name="discount[]" id="discount" class="form-control discount">
                                </td>
                                <td>
                                    <input type="number" name="total_amount[]" id="total_amount" class="form-control total_amount">
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
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
                    <h4>Total: <b class="total">0.00</b> </h4>
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
        //tambah row
        $('.add_more').on('click', function(){
            var product = $('.product_id').html();
            var numberofrow = ($('.addMoreProduct tr').length - 0) + 1;
            var tr = '<tr><td class"no"">' + numberofrow + '</td>' +
                     '<td><select class="form-control product_id" name="product_id[]" > ' + product +
                     '</select></td>' +
                     '<td><input type="number" name="quantity[]" class="form-control quantity"></td> ' +
                     '<td><input type="number" name="price[]" class="form-control price"></td> ' +
                     '<td><input type="number" name="discount[]" class="form-control discount"></td> ' +
                     '<td><input type="number" name="total_amount[]" class="form-control total_amount"></td> ' +
                     '<td><a class="btn btn-danger btn-sm remove rounded-circle"><i class="fa fa-times"></i></a></td> ';
                     $('.addMoreProduct').append(tr);
        });

        // hapus row
        $('.addMoreProduct').delegate('.remove', 'click', function(){
            $(this).parent().parent().remove();
        });

        function TotalAmount(){
            var total = 0;
            $('.total_amount').each(function(i, e){
                var amount = $(this).val() -0;
                total += amount;
            });

            $('.total').html(total);
        }

        $('.addMoreProduct').delegate('.product_id', 'change', function(){
            var tr = $(this).parent().parent();
            var price = tr.find('.product_id option:selected').attr('data-price');
                        tr.find('.price').val(price);
            var qty = tr.find('.quantity').val() - 0;
            var disc = tr.find('.discount').val() - 0;
            var price = tr.find('.price').val() - 0;
            var total_amount = (qty * price) - ((qty * price * disc) / 100);
            tr.find('.total_amount').val(total_amount);
            TotalAmount();
        });

        $('.addMoreProduct').delegate('.quantity , .discount', 'keyup', function(){
            var tr = $(this).parent().parent();
            var qty = tr.find('.quantity').val() - 0;
            var disc = tr.find('.discount').val() - 0;
            var price = tr.find('.price').val() - 0;
            var total_amount = (qty * price) - ((qty * price * disc) / 100);
            tr.find('.total_amount').val(total_amount);
            TotalAmount();
        })

    </script>
@endpush
