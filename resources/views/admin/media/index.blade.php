@extends('layouts.admin')

@section('content')
    
    <h1> Media </h1>
    @if($photos)
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                

                    @foreach($photos as $photo)
                      <tr>
                        <td>{{$photo->id}}</td>
                        <td><image height="50" src="{{ $photo->file ? $photo->file : 'http://www.placehold.it/400x400'}}" alt=""/></td>
                        <td>{{$photo->create_at ? $photo->create_at->diffForHumans() : 'No Date' }}</td>
                        <td>
                        {!! Form::model($photo,['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete Photo', ['class'=>'btn btn-danger'])!!}
                            </div>
                        {!! Form::close() !!}
                        </td>
                        
                      </tr>
                    @endforeach

               
            </tbody>
        </table>
    @endif
@stop

@section('footer')



@stop