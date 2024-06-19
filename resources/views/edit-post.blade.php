<x-layout>
    <div class="container py-md-5 container--narrow">
    
        <form action="/post/{{$posted->id}}" method="POST">
          <p><small><a href="/post/{{$posted->id}}">&laquo; Back to post permalink</a></small></p>
            @csrf
            @method('PUT')
          <div class="form-group">
            <label for="post-title" class="text-muted mb-1"><small>Title</small></label>
            <input value="{{old('title', $posted->title)}}" name="title" id="post-title" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
        @error('title')
        <p class="m-0 small alert-danger shasow-sm">{{$message}}</p>
        @enderror  
        </div>
  
          <div class="form-group">
            <label for="post-body" class="text-muted mb-1"><small>Body Content</small></label>
            <textarea  name="body" id="post-body" class="body-content tall-textarea form-control" type="text"> {{old('body', $posted->body)}} </textarea>
            @error('body')
            <p class="m-0 small alert-danger shasow-sm">{{$message}}</p>
            @enderror  
        </div>  
          <button class="btn btn-primary">Save Changes</button>
         </form>
      </div>
    </x-layout>