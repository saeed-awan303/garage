<div class="card-datatable table-responsive">
	<table id="clients" class="datatables-demo table table-striped table-bordered">
		<tbody>
		<tr>
			<td>Title</td>
			<td>{{$fuel->title}}</td>
		</tr>
        @if($fuel->model)
		<tr>
			<td>Model</td>
			<td>
                {{$fuel->model->title}}
            </td>
		</tr>
		@endif
		
		
		<tr>
			<td>Created at</td>
			<td>{{$fuel->created_at}}</td>
		</tr>
		
		</tbody>
	</table>
</div>

