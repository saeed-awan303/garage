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
		<tr>
			<td>FAQ's Category</td>
			<td>{{$faq->faq_cat->title}}</td>
		</tr>
		
		

		<tr>
			<td>Created at</td>
			<td>{{$faq->created_at}}</td>
		</tr>
		
		</tbody>
	</table>
</div>

