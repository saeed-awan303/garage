<div class="card-datatable table-responsive">
	<table id="clients" class="datatables-demo table table-striped table-bordered">
		<tbody>
		<tr>
			<td>Title</td>
			<td>{{$faq->title}}</td>
		</tr>
        @if($faq->faqs)
		<tr>
			<td>FAQ's</td>
			<td>
                @foreach($faq->faqs as $faqw)
				<strong> Question # {{ $loop->index +1 }} </strong>
                  =>  {{$faqw->question}} <br>
                @endforeach
            </td>
		</tr>
		@endif
		
		
		<tr>
			<td>Created at</td>
			<td>{{$faq->created_at}}</td>
		</tr>
		
		</tbody>
	</table>
</div>

