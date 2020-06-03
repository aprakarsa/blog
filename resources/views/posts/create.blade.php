<?php
$page = 'create'
?>

@extends('layouts.master')



@section('content')

	<div class="col-sm-8 blog-main">
        <div class="blog-post">
			<h1>Publish a Post</h1>
			<hr>
			<form method="post" action="/posts">

				{{ csrf_field() }}

			  <div class="form-group">
			    <label for="title">Title</label>
			    <input type="text" class="form-control" id="title" placeholder="Enter a title" name="title" value="{{ old('title') }}">
			  </div>
			  
			  <div class="form-group">
			    <label for="body">Body</label>
			    <textarea class="form-control" id="body" placeholder="Enter content" name="body">{{ old('body') }}</textarea>
			  </div>
			  
				<div class="form-group">

			  		<button type="submit" class="btn btn-primary">Publish</button>

			  	</div>

				@include('layouts.error')

			</form>

		</div>
	</div>

@endsection