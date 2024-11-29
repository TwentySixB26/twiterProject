<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
        data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain me-1"> </span>Ideas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="{{ Route::is('login') ? 'active' : '' }} nav-link " aria-current="page" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class=" {{ Route::is('register') ? 'active' : '' }} nav-link" href="/register">Register</a>
                        </li>
                    @endguest
                    @auth()
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('profile') ? 'active' : '' }}" href="/profile">{{ Auth::user()->name }}</a>
                            {{-- Auth::user()->name  digunakan untuk mengambil nama yang sedang login --}}
                        </li>

                        <li class="nav-item">
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"> Logout </button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>



