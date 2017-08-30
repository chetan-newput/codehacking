@extends('layouts.admin')

@section('content')
	<h1>Comments</h1>

	 @if(count($comments) > 0)
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
                    <th>Comment Link</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($comments as $comment)
                      <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->body}}</td>
                        <td>{{$comment->author}}</td>
                        <td>{{$comment->email}}</td>
                        <td><image height="50" src="{{ $comment->photo ? $comment->photo : 'http://www.placehold.it/400x400'}}" alt=""/></td>
                        <td>{{$comment->created_at ? $comment->created_at->diffForHumans() : 'No Date' }}</td>
                        <td><a href="{{route('home.post', $comment->post->id)}}">View Post</a></td>
                        <td><a href="{{route('admin.comment.replies.show', $comment->id)}}">View Replies</a></td>
                        <td>
                        @if($comment->is_active == 1)
                            {!! Form::model($comment,['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                                <input type="hidden" name="is_active" value="0">
                                <div class="form-group">
                                    {!! Form::submit('Un-Approve', ['class'=>'btn btn-warning'])!!}
                                </div>
                            {!! Form::close() !!}
                        @else
                            {!! Form::model($comment,['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comment->id]]) !!}
                                <input type="hidden" name="is_active" value="1">
                                <div class="form-group">
                                    {!! Form::submit('Approve', ['class'=>'btn btn-info'])!!}
                                </div>
                            {!! Form::close() !!}
                        @endif

                       
                            {!! Form::model($comment,['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}
                                <div class="form-group">
                                    {!! Form::submit('Delete', ['class'=>'btn btn-danger'])!!}
                                </div>
                            {!! Form::close() !!}
                        </td>
                      </tr>
                    @endforeach
            </tbody>
        </table>
    @else
        <h1 class="text-center">No Comments</h1>
    @endif
@stop

