<div class="card-datatable table-responsive">
	<table id="clients" class="datatables-demo table table-striped table-bordered">
		<tbody>
		<tr>
			<td>Service Title</td>
			<td>{{$service->title}}</td>
		</tr>
		<tr>
			<td>Slug</td>
			<td>{{$service->slug}}</td>
		</tr>
		<tr>
			<td>Status</td>
			<td>
				@if($service->status == 1)
					<label class="label label-success label-inline mr-2">Active</label>
				@else
					<label class="label label-danger label-inline mr-2">Inactive</label>
				@endif
			</td>
		</tr>
		<tr>
			<td>Categories</td>
			<td>
				@foreach($service->category as $cat)
					{{$cat->title}} <br>
				@endforeach
				
			</td>
		</tr>
        @if($service->image)
        <tr>
			<td>Image</td>
			<td>
			 <img src="{{asset("uploads/$service->image")}}" width="150px" height="100px" alt="">
			</td>
		</tr>
        @endif
		<tr>
			<td>Created at</td>
			<td>{{$service->created_at}}</td>
		</tr>
		
		</tbody>
	</table>
</div>

