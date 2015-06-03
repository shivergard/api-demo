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
					  		<select class="form-control" id="methods">
					  			<option>--none--</option>
					  		@foreach($methods as $method)
								  <option>{{$method->name}}</option>
					  		@endforeach
					  		</select>

  							<strong>Params</strong>

  							<form>
							  <div class="form-group">
							    <label for="key">Key</label>
							    <input type="key" class="form-control" id="key" placeholder="Key">
							  </div>
							  <div class="form-group">
							    <label for="secret">Secret</label>
							    <input type="password" class="form-control" id="secret" placeholder="Secret">
							  </div>
							  <div id="additional_params"></div>
							  <button type="submit" class="btn btn-default">POST</button>
							</form>

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