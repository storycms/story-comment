<div class="media">
  <div class="media-left">
    <img src="//www.gravatar.com/avatar/16250bf5bb2c9f970cdc0f43c830b34f" data-src="//www.gravatar.com/avatar/16250bf5bb2c9f970cdc0f43c830b34f">
  </div>
  <div class="media-body">
    <h4 class="media-heading">Bottom aligned media</h4>
    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
    <p>Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
  </div>
</div>

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <form action="/plugins/comment" method="POST" accept-charset="UTF-8">
      {{ csrf_field() }}
      <input type="hidden" name="post_id" value="{{ $post->id }}" />
      @if ($errors->has('post_id'))
        <small class="help-block">{{ $errors->first('post_id') }}</small>
      @endif

      <div class="form-group">
        <input type="text" class="form-control" name="name" value="{{ request()->old('name') }}" placeholder="Input your name">
        @if ($errors->has('name'))
          <small class="help-block">{{ $errors->first('name') }}</small>
        @endif
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="email" value="{{ request()->old('email') }}" placeholder="Input your email">
        @if ($errors->has('email'))
          <small class="help-block">{{ $errors->first('email') }}</small>
        @endif
      </div>
      <div class="form-group">
        <textarea class="form-control" name="comment" placeholder="Input Message" rows="4">{{ request()->input('comment') }}</textarea>
        @if ($errors->has('comment'))
          <small class="help-block">{{ $errors->first('comment') }}</small>
        @endif
      </div>
      <div class="form-group">
        <button class="btn btn-primary">Send message</button>
      </div>
    </form>
  </div>
</div>
