    <div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
          <a class="nav-link <?php if($page=='index') echo 'active'; ?>" href="/">Home</a>

          @if ( Auth::check() )
            <a class="nav-link <?php if($page=='create') echo 'active'; ?>" href="/posts/create">Create Post</a>
          @else
            <a class="nav-link <?php if($page=='registration') echo 'active'; ?>" href="/register">Register</a>
          @endif

          {{-- @if ( auth()->check() ) --}}
          @if ( Auth::check() )
            <a class="nav-link ml-auto" href="/logout">Welcome back, {{ auth()->user()->name }} |  Logout</a>
          @else
            <a class="nav-link ml-auto" href="/login">Login</a>
          @endif

        </nav>
      </div>
    </div>
