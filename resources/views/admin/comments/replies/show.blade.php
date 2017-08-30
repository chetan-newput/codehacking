@extends('layouts.admin') 

@section('content')
<h1>Replies</h1> 

@if(count($replies) > 0)
    @foreach($replies as $reply)
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Body</th>
                    <th>Author</th>
                    <th>Email</th>
                    <th>Photo</th>
                    <th>Created</th>
                    <th>Post Link</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->body}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>
                        <image height="50" src="{{ $reply->photo ? $reply->photo : 'http://www.placehold.it/400x400'}}" alt="" />
                    </td>
                    <td>{{$reply->created_at ? $reply->created_at->diffForHumans() : 'No Date' }}</td>
                    <td><a href="{{route('home.post', $reply->comment->post->id)}}">View Post</a></td>
                    <td>
                        @if($reply->is_active == 1) {!! Form::model($reply,['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}
                        <input type="hidden" name="is_active" value="0">
                        <div class="form-group">
                            {!! Form::submit('Un-Approve', ['class'=>'btn btn-warning'])!!}
                        </div>
                        {!! Form::close() !!} @else {!! Form::model($reply,['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}
                        <input type="hidden" name="is_active" value="1">
                        <div class="form-group">
                            {!! Form::submit('Approve', ['class'=>'btn btn-info'])!!}
                        </div>
                        {!! Form::close() !!} @endif {!! Form::model($reply,['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy', $reply->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger'])!!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            </tbody>
        </table>
    @endforeach
@else
    <h1 class="text-center">No Replys</h1> 
@endif 

@stop