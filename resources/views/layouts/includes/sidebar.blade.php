<nav class="active" id="sidebar">
	<ul class="list-unstyled lead">
		<li>
			<a href=""><i class="fa fa-home"></i> Home</a>
		</li>
		<li>
			<a href=""><i class="fa fa-box "></i> Orders</a>
		</li>
		<li>
			<a href=""><i class="fa fa-money-bill"></i> Transactions</a>
		</li>
		<li>
			<a href=""><i class="fa fa-truck"></i> Products</a>
		</li>
	</ul>
</nav>

<style>
	#sidebar ul.lead{
		border-bottom: 1px solid #47748b;
		width: fit-content;
	}

	#sidebar ul li a{
		padding: 10px;
		font-size: 1.1em;
		display: block;
		width: 30vh;
		color: #008b8b
	}

		#sidebar ul li a:hover{
		background: #008b8b;
		color: #fff;
		text-decoration: none !important;
	}

	#sidebar ul li a i{
		margin-right: 10px;
	}

	#sidebar ul li.active>a, a[aria-expended="true"]{
		color: #fff;
		background: #008b8b;
	}
</style>