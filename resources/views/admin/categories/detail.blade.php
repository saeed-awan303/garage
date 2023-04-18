<div class="card-datatable table-responsive">
	<table id="clients" class="datatables-demo table table-striped table-bordered">
		<tbody>
		<tr>
			<td>Title</td>
			<td>{{$category->title}}</td>
		</tr>
		<tr>
			<td>Slug</td>
			<td>{{$category->slug}}</td>
		</tr>
		<tr>
			<td>Services</td>
			<td>{{$category->services->title}}</td>
		</tr>
		@if($category->parent)
        <tr>
			<td>Parent</td>
			<td>{{$category->parent->title ?? ''}}</td>
		</tr>
        @endif
		<tr>
			<td>Status</td>
			<td>
				@if($category->status)
					<label class="label label-success label-inline mr-2">Active</label>
				@else
					<label class="label label-danger label-inline mr-2">Inactive</label>
				@endif
			</td>
		</tr>
		<tr>
			<td>Created at</td>
			<td>{{$category->created_at}}</td>
		</tr>
		
		</tbody>
	</table>
</div>

