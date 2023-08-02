<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('pays.index') }}">Pays</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('pays.create') }}">Ajouter Pays</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('region.index') }}">Région</a>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            
          </li>
          <li class="nav-item dropdown">
        
              
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
        
            
          </li>
         
        </ul>
        
      </div>
    </div>
  </nav>