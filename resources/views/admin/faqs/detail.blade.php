<div class="card-datatable table-responsive">
	<table id="clients" class="datatables-demo table table-striped table-bordered">
		<tbody>
		<tr>
			<td>Question</td>
			<td>{{$faq->question}}</td>
		</tr>
		<tr>
			<td>Answer</td>
			<td>{{$faq->answer}}</td>
		</tr>
		{{-- <tr>
			<td>Roles</td>
			<td>
				@if(!empty($user->getRoleNames()))
					@foreach($user->getRoleNames() as $v)
					<label class="badge badge-success">{{ $v }}</label>
					@endforeach
				@endif
			</td>
		</tr> --}}
		

		<tr>
			<td>Created at</td>
			<td>{{$faq->created_at}}</td>
		</tr>
		
		</tbody>
	</table>
</div>

