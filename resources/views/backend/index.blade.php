@extends('cms::layouts.app')

@section('title') Comment @stop

@section('content')
  <div class="container-fluid">
    <table class="table">
      <thead>
        <th>Name</th>
        <th>Email</th>
        <th>Comment</th>
        <th>Status</th>
        <th>Created at</th>
      </thead>
      <tbody>
        @foreach($comments as $comment)
        <tr>
          <td>{{ $comment->name }}</td>
          <td>{{ $comment->email }}</td>
          <td>{{ $comment->comment }}</td>
          <td>{{ $comment->status == 0 ? 'Pending' : 'Published' }}</td>
          <td>{{ $comment->created_at }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $comments->links() }}
  </div>
@stop
