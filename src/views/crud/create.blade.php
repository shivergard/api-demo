@extends((\Config::get('api-demo.extend_view') ? \Config::get('api-demo.extend_view') : 'api-demo::app'))

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<button id="search_filter" type="button" onclick="window.location = '{{ action($controller."@index") }}'" class="btn btn-primary">Back</button>
        </div>
        <div class="col-md-8 col-md-offset-2">
	<!-- if there are creation errors, they will show here -->
	{!! $form->open(array('class' => 'form-horizontal' ,'url' => action($controller."@store"))) !!}
		@foreach($fields as $col)
			<div class="form-group">
				<div class="col-md-4">
					{!! $form->label($col, $col) !!}
				</div>
				<div class="col-md-6">
					{!! $form->text($col, Input::old($col), array('class' => 'form-control')) !!}
				</div>
			</div>
		@endforeach

	{!! $form->submit('Create', array('class' => 'btn btn-primary')) !!}

	{!! $form->close() !!}
	{!! $html->ul($errors->all()) !!}
</div>
@endsection