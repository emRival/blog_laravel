<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <i class="fa-brands fa-hive fs-5 me-3"> Blog-Ku</i>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
          <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
          <li><a href="#" class="nav-link px-2 text-white">About</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          @guest
          <a href="{{ route("login")}}" class="btn btn-outline-light me-2">
            Login
        </a>
        <a href="{{ route("register")}}" class="btn btn-warning me-2">
          Register
      </a>
          @else

      
      
      <div class="dropdown-center">
        <button class="btn btn-outline-dark text-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="..."
          class="img-fluid me-1" style="max-width: 14%; height: auto;border-radius: 50%;">
          {{ Auth::user()->name }} 
          
        </button>
        <ul class="dropdown-menu">
          <li>
            <a class="dropdown-item" href="{{ route("logout") }}" 
            onclick="event.preventDefault(); document.getElementById('form-logout').submit();"
            ><i class="fa-solid fa-right-from-bracket"></i> logout</a>
          </li>

          <form action="{{ route('logout') }}" method="post" id="form-logout">
            @csrf
          </form>
        </ul>
      </div>
      
      @endguest
           

        </div>
      </div>
    </div>
  </header>