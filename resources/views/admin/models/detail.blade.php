<div class="card-datatable table-responsive">
	<table id="clients" class="datatables-demo table table-striped table-bordered">
		<tbody>
		<tr>
			<td>Title</td>
			<td>{{$model->title}}</td>
		</tr>
        @if($model->makes)
		<tr>
			<td>Makes</td>
			<td>
                {{$model->makes->title}}
            </td>
		</tr>
		@endif
		
		
		<tr>
			<td>Created at</td>
			<td>{{$model->created_at}}</td>
		</tr>
		
		</tbody>
	</table>
</div>

