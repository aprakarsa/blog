<?php
$page = 'index'
?>

@extends('layouts.master')



@section('content')

    <div class="col-sm-8 blog-main">

  		<h1>{{ $post->title }}</h1>

  		{{ $post->body }}

  		<hr>

  		  @if (session('status'))
		    <div class="alert alert-success">
		        {{ session('status') }}
		    </div>
		  @endif

  		<div class="comments">
  			@foreach($post->comments as $comment)
			
			<ul class="list-group">
				<li class="list-group-item">

				<strong>
					{{ $comment->user->name }},
					
					{{ $comment->created_at->diffForHumans() }}
					:&nbsp;
				</strong>

				{{ $comment->body }}

				</li>	
			</ul>

  			@endforeach
  		</div>

		@if( Auth::check() )		

			<hr>

	  		<div>

				<form method="post" action="/posts/{{ $post->id }}/comments">
		
					{{ csrf_field() }}

						<div class="card-block">

	  					<div class="form-group">
		  					<textarea name="body" placeholder="Your comment here." class="form-control" required>{{ old('body') }}</textarea>
	  					</div>

					</div>

		  			<div class="form-group">
						<button type="submit" class="btn btn-primary">Add Comment</button>
					</div>

					@include('layouts.error')

				</form>

	  		</div>

	  	@endif

    </div><!-- /.blog-main -->

@endsection