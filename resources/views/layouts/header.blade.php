<div>

<b-navbar toggleable="lg" type="light" class="main-header container-fluid navbar navbar-expand-lg fixed-top main-header col-md-10 offset-md-1">
    <b-navbar-brand href="{{ url('/') }}"><img src="../images/trust_growth.png" alt=""></b-navbar-brand>

    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

    <b-collapse id="nav-collapse" is-nav>
            <!-- Right aligned nav items -->
      <b-navbar-nav class="ml-auto" style="width:100%;">
        <b-nav-form class="container-fluid">
          <b-form-input size="sm" class="form-control col-lg mr-sm-2 d-flex p-2" placeholder="Search"></b-form-input>
          <b-button size="sm" class="btn my-2 my-sm-0 all-btn secondary-bg-color" type="submit">Search</b-button>
        </b-nav-form>

        
        <b-navbar-nav>
        @guest
          <b-nav-item href="{{ route('login') }}" style="color:#000">{{ __('Login') }}</b-nav-item>
          @if (Route::has('register'))
            <b-nav-item href="{{ route('register') }}" style="color:#000">{{ __('Register') }}</b-nav-item>
         
        </b-navbar-nav>
        @endif
        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('login') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
    </b-collapse>
  </b-navbar>
</div>