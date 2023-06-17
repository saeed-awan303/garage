<div class="card-datatable table-responsive">
	<table id="orders" class="datatables-demo table table-striped table-bordered">
		<tbody>
		<tr>
			<td>Name</td>
			<td>{{$order->first_name.' '.$order->last_name}}</td>
		</tr>
        <tr>
			<td>Email</td>
			<td>{{$order->email}}</td>
		</tr>
        <tr>
			<td>Phone number</td>
			<td>{{$order->phone_number}}</td>
		</tr>
        @if($order->make)
		<tr>
			<td>Car make</td>
			<td>
                {{$order->make->title}}
            </td>
		</tr>
		@endif
        @if($order->model)
		<tr>
			<td>Car model</td>
			<td>
                {{$order->model->title}}
            </td>
		</tr>
		@endif
        @if($order->fuelType)
		<tr>
			<td>Car fuel type</td>
			<td>
                {{$order->fuelType->title}}
            </td>
		</tr>
		@endif
		<tr>
			<td>Created at</td>
			<td>{{$order->created_at}}</td>
		</tr>

		</tbody>
	</table>
</div>

