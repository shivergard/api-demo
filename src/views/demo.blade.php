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
                            <form id="post_form">
                            <select class="form-control" id="methods" name="id">
                                <option>--none--</option>
                            @foreach($methods as $method)
                                  <option value="{{$method->id}}">{{$method->name}}</option>
                            @endforeach
                            </select>

                            <strong>Method</strong>

                            
                                {!! Form::token() !!}

                                @if (\Config::get('api-demo.default_methods'))

                                  <div class="form-group">
                                    <label for="key">Key</label>
                                    <input type="key" name="key" class="form-control" id="key" placeholder="Key">
                                  </div>
                                  <div class="form-group">
                                    <label for="secret">Secret</label>
                                    <input type="password" name="secret" class="form-control" id="secret" placeholder="Secret">
                                  </div>

                                @endif
                              <div id="additional_params"></div>
                              <button type="submit" id="post_api" class="btn btn-default">POST</button>

                            </form>

                      </div>
                      <div class="col-md-6">
                            <h4>Description</h4>
                            <pre id="description">Select method</pre>
                            <h4>Request</h4>
                            <pre id="request">Select method</pre>
                            <h4>Response</h4>
                            <pre id="response">{"status":0}</pre>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

    window.ajaxCall = function (request , url , callback){

        if (typeof url == 'undefined'){
            url = "{{action("\Shivergard\ApiDemo\PublicApiDemoController@getParams")}}";
        }

        if (typeof callback == 'undefined'){
            callback = window.ajaxSuccess;
        }

        $.ajax({
          dataType: "json",
          url: url,
          data: request,
          success: callback
        });
    };

    window.ajaxSuccess = function (data){
        if (typeof data.instance != 'undefined'){
            $('#request').html(data.instance.path);
            $('#description').html(data.instance.description);
        }

        if (typeof data.params != 'undefined'){
            $.each(data.params, function( k, v ) {
                $('#additional_params').append('<div class="form-group"><label for="secret">' + v.name + '</label> <pre>' + v.description + '</pre><input class="form-control" name="' + v.name + '" id="' + v.name + '" placeholder="' + v.name + '"></div>');
            });
        }
        
    };

    window.previewProgress = function (data){
        $('#response').html(data.response);
    }

    $(function() {

        $( "#methods" ).change(function() {
            $('#request').html('Select method');
            $('#description').html('Select method');
            $('#additional_params').html('');
            window.ajaxCall({id : $(this).val()});
        });

        $('#post_api').click(
            function(event){
                event.preventDefault();
                postData = $('#post_form').serialize();
                if ($( "#methods" ).val() > 0){
                    window.ajaxCall(postData , '{{ action("\Shivergard\ApiDemo\PublicApiDemoController@postRequest") }}' , window.previewProgress);
                }else{
                    $('#description').html('invalid POST method');
                }
                
            }
        );
    });

</script>

@endsection