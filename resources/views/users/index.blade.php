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
                    <h4 class=" float-left">Add New User</h4>
                    <a data-toggle="modal" data-target="#addUser" class="btn btn-dark float-right"><i class="fa fa-user"></i> Add User</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-left">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->is_admin == 1 ? 'Admin' : 'Cashire' }}</td>
                                <td>
                                    <form action="{{route('user.destroy',$user->id)}}" method="post" class="d-inline">
                                        @method('delete') @csrf
                                        <a href="#" data-toggle="modal" data-target="#editUser{{$user->id}}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-user-edit"></i> Edit
                                        </a>
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are You Sure ?')">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <!-- modal edit -->
                                <div class="modal right fade" id="editUser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h3 class="modal-title" id="staticBackdropLabel">Edit User<h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                            <div class="modal-body">
                                                <form action="{{ route('user.update', $user->id) }}" method="post">
                                                    @method('PUT') @csrf
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input id="name" 
                                                                type="text" 
                                                                class="form-control @error('name') is-invalid @enderror" 
                                                                name="name" 
                                                                value="{{ old('name') ? old('name') : $user->name }}"
                                                                required autocomplete="name" 
                                                                autofocus>
                                                                @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="email">email</label>
                                                            <input id="email" 
                                                                type="text" 
                                                                class="form-control @error('email') is-invalid @enderror" 
                                                                name="email" 
                                                                value="{{ old('email') ? old('email') : $user->email }}"
                                                                required autocomplete="email" 
                                                                autofocus>
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="is_admin">Role</label>
                                                            <select name="is_admin" class="form-control @error('is_admin') is-invalid @enderror">
                                                                <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}>Admin</option>
                                                                <option value="2" {{ $user->is_admin == 2 ? 'selected' : '' }}>Cashire</option>
                                                            </select>
                                                                @error('is_admin')
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

                            @endforeach
                        </tbody>
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
 <div class="modal right fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h3 class="modal-title" id="staticBackdropLabel">Add User</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                name="name" 
                                value="{{ old('name') }}" 
                                required autocomplete="name" 
                                autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" 
                                type="text" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required  
                                autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="is_admin">Role</label>
                            <select class="form-control @error('is_admin') is-invalid @enderror" name="is_admin">
                                <option value="0" selected disabled>--Choose Role--</option>
                                <option value="1">Admin</option>
                                <option value="2">Cashire</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" 
                                type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                name="password" 
                                required 
                                autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Password Confirm</label>
                             <input id="password-confirm" 
                                type="password" 
                                class="form-control" 
                                name="password_confirmation" 
                                required 
                                autocomplete="new-password">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-block">Save User</button>
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
