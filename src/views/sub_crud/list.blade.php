@foreach ($list as $item)
<tr>
    @foreach($fields as $col)
        <td>{{ $item->$col }}</td>
    @endforeach
    <td>
        <button type="button" img-id="{{ $item->id }}" onclick="window.location = '{{ action("$controller@show" , array('id' => $item->id , 'method' => $method)) }}'" class="btn">Show</button>
        <button type="button" img-id="{{ $item->id }}" onclick="window.location = '{{  action("$controller@edit" , array('id' => $item->id , 'method' => $method))  }}'" class="btn edit-item">Edit</button>
        <button type="button" img-id="{{ $item->id }}" onclick="if (confirm('Drop it ?')) { dropNode('{{$item->id}}'); } " class="btn btn-danger delete-item">Delete</button>
        {!! Form::open(array('url' => action("$controller@destroy" , array('id' => $item->id , 'method' => $method)) , 'id' => 'drop_'.$item->id )) !!}
            {!! Form::hidden('_method', 'DELETE') !!}
        {!! Form::close() !!}
    </td>
</tr>
@endforeach