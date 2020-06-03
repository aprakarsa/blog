<?php
$page = 'registration'
?>

@extends('layouts.master')

@section('content')
	
	<div class="col-sm-8">
		<h1>Register</h1>
		<form action="/register" method="post">
			
			{{ csrf_field() }}

			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
			</div>

			<div class="form-group">
				<label for="email">Email:</label>
				<input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
			</div>

			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password" required>
			</div>

			<div class="form-group">
				<label for="password_confirmation">Password Confirmation:</label>
				<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>

			@include('layouts.error')

		</form>
	</div>

@endsection