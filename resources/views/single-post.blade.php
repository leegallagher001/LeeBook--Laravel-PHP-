<x-layout> {{-- brings the layout.blade.php into the page - anything between the x-layout tags is treated as the '$slot' content --}}
    <div class="container py-md-5 container--narrow">
      <div class="d-flex justify-content-between">
        <h2>{{$post->title}}</h2>
        @can('update', $post) {{-- Should only show edit or delete buttons if post is being viewed by the post's author --}}
        <span class="pt-2">
          <a href="#" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
          <form class="delete-post-form d-inline" action="/post/{{$post->id}}" method="POST">
            @csrf {{-- issues a CSRF token for the delete request --}}
            @method('DELETE') {{-- Fulfils the delete request --}}
            <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
          </form>
        </span>
        @endcan
      </div>

      <p class="text-muted small mb-4">
        <a href="#"><img class="avatar-tiny" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" /></a>
        Posted by <a href="#">{{$post->user->username}}</a> on {{$post->created_at->format('j/n/Y')}}
      </p>

      <div class="body-content">
        {!! $post->body !!} {{-- tells Blade to render this as HTML as it normally wouldn't do that as a security feature (SHOULD BE USED CAREFULLY) --}}
      </div>
    </div>
</x-layout>
