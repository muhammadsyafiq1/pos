<div id="invoice_pos">
	
	<div id="printed_content">
	
		<center id="top">
			<div class="logo">Laravel POS</div>
			<div class="info"></div>
			<h2>Pos Ltd</h2>
		</center>

	</div>

	<div class="mid" id="mid">
		<div class="info">
			<h2>Contact Us</h2>
			<p>
				Address : Bangkinang Riau, Indonesia <br>
				Email : Laravel@gmail.com
				Phone : 081268312221
			</p>
		</div>
	</div>

	<div class="bot" id="bot">
		<div id="table">
			<table>
				<tr class="tabletitle">
					<td class="item"><h2>Items</h2></td>
					<td class="hours"><h2>QTY</h2></td>
					<td class="rate"><h2>Unit</h2></td>
					<td class="rate"><h2>Discount</h2></td>
					<td class="rate"><h2>Sub Total</h2></td>
				</tr>

				@foreach($orderReceipt as $receipt)
				<tr class="service">
					<td class="tableitem"><p class="itemtext">{{$receipt->product->product_name}}</p></td>
					<td class="tableitem"><p class="itemtext">{{$receipt->quantity}}</p></td>
					<td class="tableitem"><p class="itemtext">{{number_format($receipt->unitprice)}}</p></td>
					<td class="tableitem"><p class="itemtext">{{$receipt->discount}}</p></td>
					<td class="tableitem"><p class="itemtext">{{number_format($receipt->amount)}}</p></td>
				</tr>
				@endforeach

				<tr class="tabletitle">
					<td></td>
					<td></td>
					<td></td>
					<td class="rate"><p class="itemtext">Tax</p></td>
					<td class="payment"><p class="itemtext">10</p></td>
				</tr>

				<tr class="tabletitle">
					<td></td>
					<td></td>
					<td></td>
					<td class="rate"><p class="itemtext">Total</p></td>
					<td class="payment">
						<h2>{{number_format($orderReceipt->sum('amount') + 10)}}</h2>
					</td>
				</tr>
			</table>

			<div class="legalcopy" id="legalcopy">
				<p class="legal">
					<strong>
						**Thank you for visiting**
					</strong> <br>
					The good wich are subject to tax
				</p>
			</div>
			<div class="serial_number">
				Serial : <span class="serial">
					0091229122
				</span>
				<span>{{$created->created_at}}</span>
			</div>

		</div>
	</div>

</div>

<style>
	#invoice_pos{
		box-shadow: 0 0 1in -0.25in rgb(0, 0, 0.5);
		padding: 2mm;
		margin: 0 auto;
		width: 65mm;
		background: #fff
	}

	#invoice_pos ::selection {
		background: #34495e;
		color: #fff;
	}

	#invoice_pos ::-moz-selection {
		background: #34495e;
		color: #fff;
	}

	#invoice_pos h1{
		font-size: 1.5em;
		color: #222;
	}

	#invoice_pos h2{
		font-size: 0.5em;
	}

	#invoice_pos h3{
		font-size: 1.2em;
		font-weight: 300;
		line-height: 2em;
	}

	#invoice_pos p{
		font-size: 0.7em;
		line-height: 1.2em;
		color: #666;
	}

	#invoice_pos #top, #invoice_pos #mid, #invoice_pos #bot{
		border-bottom: 1px solid #eee;
	}

	#invoice_pos #top{
		min-height: 100px;
	}

	#invoice_pos #mid{
		min-height: 80px;
	}

	#invoice_pos #bot{
		min-height: 50px
	}

	#invoice_pos #top .logo{
		height: 60px;
		width: 60px;
		background-size: 60px 60px;
		border-radius:50px; 
	}

	#invoice_pos .info{
		display: block;
		margin-left: 0;
		text-align: center;
	}

	#invoice_pos .title{
		float: right;
	}

	#invoice_pos .title p{
		text-align: right;
	}

	#invoice_pos table {
		width: 100%;
		border-collapse: collapse;
	}

	#invoice_pos .tabletitle{
		font-size: 0,5em;
		background: #eee;
	}

	#invoice_pos .service{
		border-bottom: 1px solid #eee;
	}

	#invoice_pos .item{
		width: 24mm;
	}

	#invoice_pos .itemtext{
		font-size: 0.6em;
	}

	#invoice_pos #legalcopy{
		margin-top: 5mm;
		text-align: center;
	}

	.serial_number {
		margin-top: 5mm;
		margin-bottom: 2mm;
		text-align: center;
		font-size: 12px;
	}

	.serial{
		font-size: 10px !important;
	}

</style>