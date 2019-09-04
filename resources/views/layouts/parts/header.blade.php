<div class="nav-bar">
    <div class="flex-box nav-main">

        {{--left side of the navbar--}}
        <div class="nav-group flex-box">
            <div class="nav-item nav-title">
                <a class="link-clear nav-link" href="/">
                    Pop Shop
                </a>
            </div>
            <div class="nav-item">
                |
            </div>
            @foreach(config('pop.category') as $category)
                <div class="nav-item">
                    <a class="link-clear nav-link" href="dashboard?{{ $category }}">
                        {{ $category }}
                    </a>
                </div>
            @endforeach
        </div>

        {{--right side of the nav bar hold avatar and notification icon--}}
        @auth
            <div class="nav-group flex-box">
                <div class="nav-item">
                    <a class="link-clear nav-link" href="/profile">
                        Abd Al-gader Sirag
                    </a>
                </div>
                <div class="nav-item">
                    <a href="/profile">
                        <img class="nav-avatar" src="/test/avatar.png" alt="">
                    </a>
                </div>
                <div class="nav-item">
                    <img class="notification-icon" src="/site/notify.svg" alt="">
                </div>
                <div class="nav-item">
                    <form id="logout" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                    <span style="cursor: pointer;"
                          onclick="event.preventDefault();document.getElementById('logout').submit();"
                          class="link-clear nav-link">
                        Logout
                    </span>
                </div>
            </div>
        @else
            <div class="nav-group flex-box">
                <div class="nav-item">
                    <a class="link-clear nav-link" href="/login">
                        Login
                    </a>
                </div>
                <div class="nav-item">
                    <a class="link-clear nav-link" href="/register">
                        Register
                    </a>
                </div>
            </div>
        @endauth
    </div>
</div>