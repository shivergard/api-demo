@extends((\Config::get('api-demo.extend_view') ? \Config::get('api-demo.extend_view') : 'api-demo::app'))

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Demo</div>
				<div class="panel-body">
					<div class="row">
					  <div class="col-md-6">
					  		<h4>Params</h4>

					  </div>
					  <div class="col-md-6">
					  		<h4>Response</h4>
					  		<pre>{"status":0}</pre>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection