<div class="card-datatable table-responsive">
	<table id="clients" class="datatables-demo table table-striped table-bordered">
		<tbody>
		<tr>
			<td>First Name</td>
			<td>{{$mechanic->first_name}}</td>
		</tr>
        <tr>
			<td>Last Name</td>
			<td>{{$mechanic->last_name}}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>{{$mechanic->email}}</td>
		</tr>
		<tr>
			<td>Post Code</td>
			<td>
               {{$mechanic->postcode}}
			</td>
		</tr>
		<tr>
			<td>Created at</td>
			<td>{{$mechanic->created_at}}</td>
		</tr>
		
		</tbody>
	</table>
</div>

