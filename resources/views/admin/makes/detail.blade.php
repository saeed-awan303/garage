<div class="card-datatable table-responsive">
	<table id="clients" class="datatables-demo table table-striped table-bordered">
		<tbody>
		<tr>
			<td>Title</td>
			<td>{{$make->title}}</td>
		</tr>
        @if($make->models)
		<tr>
			<td>Makes</td>
			<td>
                @foreach($make->models as $model)
				<strong> Model # {{ $loop->index +1 }} </strong>
                  =>  {{$model->title}} <br>
                @endforeach
            </td>
		</tr>
		@endif
		
		
		<tr>
			<td>Created at</td>
			<td>{{$make->created_at}}</td>
		</tr>
		
		</tbody>
	</table>
</div>

