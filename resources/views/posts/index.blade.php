<?php
$page = 'index'
?>

@extends('layouts.master')



@section('content')

    <div class="col-sm-8 blog-main">

    	@if (session('status'))
		    <div class="alert alert-success">
		        {{ session('status') }}
		    </div>
		  @endif

        @foreach($posts as $post)
        
          @include('posts.post')

        @endforeach

        <nav class="blog-pagination">
          <a class="btn btn-outline-primary" href="#">Older</a>
          <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

    </div><!-- /.blog-main -->

@endsection


