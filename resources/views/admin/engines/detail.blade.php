<div class="card-datatable table-responsive">
	<table id="clients" class="datatables-demo table table-striped table-bordered">
		<tbody>
		<tr>
			<td>Title</td>
			<td>{{$engine->title}}</td>
		</tr>
        @if($engine->model)
		<tr>
			<td>Model</td>
			<td>
                {{$engine->model->title}}
            </td>
		</tr>
		@endif
		
		
		<tr>
			<td>Created at</td>
			<td>{{$engine->created_at}}</td>
		</tr>
		
		</tbody>
	</table>
</div>

