@auth
<a href="" data-toggle="modal" data-target="#staticBackdrop" class="btn btn-outline rounded-pill"> <i class="fa fa-list"></i></a>
<a href="{{ route('user.index') }}" class="btn btn-outline rounded-pill"> <i class="fa fa-user"></i> Users</a>
<a href="{{ route('product.index') }}" class="btn btn-outline rounded-pill"> <i class="fa fa-box"></i> Products</a>
<a href="{{ route('order.index') }}" class="btn btn-outline rounded-pill"> <i class="fa fa-desktop"></i> Cashire</a>
<a href="" class="btn btn-outline rounded-pill"> <i class="fa fa-file"></i> Reports</a>
<a href="" class="btn btn-outline rounded-pill"> <i class="fa fa-money-bill"></i> Transactions</a>
<a href="" class="btn btn-outline rounded-pill"> <i class="fa fa-chart"></i> Suppliers</a>
<a href="" class="btn btn-outline rounded-pill"> <i class="fa fa-users"></i> Customers</a>
<a href="" class="btn btn-outline rounded-pill"> <i class="fa fa-truck"></i> Incomings</a>

<style> 
	.btn-outline {
		border-color: #008b8b;
		color: #008b8b;
		margin-right: 5px;
	}

	.btn-outline:hover{
		background: #008b8b;
		color: #fff;
	}
</style>
@endauth