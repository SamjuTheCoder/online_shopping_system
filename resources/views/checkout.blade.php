@extends('layouts.app')

@section('content')

	<!-- contact -->
		<div class="check-out">	 
		<div class="container">	 
	 <div class="spec ">
				<h3>My Cart</h3>
					<div class="ser-t">
						<b></b>
						<span><i></i></span>
						<b class="line"></b>
					</div>
			</div>
				
 <table class="table ">
 
		  <tr>
			<th class="t-head head-it">Products</th>
			<th class="t-head" style="width:90px !important">Price</th>
		    <th class="t-head" style="width:120px !important">Quantity</th>
            @php $total=0; @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['qty']  @endphp
		  </tr>
          
		  <tr>
            
            <td class="t-data">
            
				<a href="#" class="pull-left">
					<img src="products/{{$details['image']}}" class="img-responsive" alt="" height="100" width="120">
				</a>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <div class="center">
                    <h3><strong>{{ $details['category'] }}</strong></h3>
                    <h4><strong>{{ $details['name'] }}</strong></h4>
                    <h5>{{ $details['description'] }}</h5>
                </div>
			 </td>
			
            <td data-th="Subtotal" class="text-center t-data">&#x20A6;{{ number_format($details['price'] * $details['qty']) }}</td>
			<td class="t-data" data-th="Quantity">
                <input type="number" value="{{ $details['qty'] }}" class="form-control quantity" style="width:50px !important; border-style:none;" readonly/>
            </td>
          
		   </tr>
             @endforeach
          @endif
          <tr class="">
            <td class="">
            <form method="post" action="{{ route('placeOrder') }}"> 
                @csrf
                <div class="row">
                  <div class="col-md-12">
                  <i class="fa fa-edit"></i> Edit <input type="text" readonly style="border-style:none;height:50px" class="form-control" name="address" value="{{ Auth::user()->address }}">
                  </div>
                  
                </div>  
                  <p>&nbsp;</p>
                <button type="submit" class="pull-left btn btn-info">Place Order <i class="fa fa-angle-right"></i></button>
                <span style="font-size:18px;">Note:- Pay on delivery only applied within Abuja.</span> 
                </form>
			</td>
			<td class="t-data">
            <strong>Total: &#x20A6;{{ number_format($total)}}</strong>
			</td>
			<td class="t-data"> </td>
			
		  </tr>
	</table>
		 </div>
		 </div>
		 				
	       <!--quantity-->
           <script>
                function change() {

                }

           </script>
			
			<!--quantity-->
            <script type="text/javascript">
        $(".update-cart").click(function (e) {
           e.preventDefault();
           var ele = $(this);
            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>


@endsection
@section('scripts')
   
@endsection
