<div class="nav-bar">
    <div class="flex-box nav-main">

        {{--left side of the navbar--}}
        <div class="nav-group flex-box">
            <div class="nav-item nav-title" style="padding: 12px 0 0 1%;">
                {{--<a class="link-clear nav-link" href="/">Pop Shop </a>--}}
                <a class="link-clear nav-link" href="/">
                    <img style="width: 90px" src="/site/pop shop.jpg">
                </a>
            </div>
            <div class="nav-item nav-icon" style="padding-right: 10px">|</div>
            @auth
                <div class="nav-item nav-icon">
                    <a class="link-clear nav-link" href="/dashboard">
                        Dashboard
                    </a>
                </div>
                <div class="nav-item nav-icon">
                    <a class="link-clear nav-link" href="/payment">
                        Payment
                    </a>
                </div>
                <div class="nav-item nav-icon">
                    <a class="link-clear nav-link" href="/items">
                        Items
                    </a>
                </div>
            @else
                @foreach(config('pop.category') as $category)
                    <div class="nav-item nav-icon">
                        <a class="link-clear nav-link" href="/#{{ $category }}">
                            {{ $category }}
                        </a>
                    </div>
                @endforeach
            @endauth
        </div>

        {{--right side of the nav bar hold avatar and notification icon--}}
        @auth
            <div class="nav-group flex-box">
                <div class="nav-item">
                    <a class="link-clear nav-link flex-box" href="/profile">
                        <div class="nav-icon" style="padding: 7px 6px 0 0;">Abd Al-gader Sirag</div>
                        <img class="nav-avatar" src="/test/avatar.png" alt="">
                    </a>
                </div>
                <div class="nav-item">
                    <img class="notification-icon" src="/site/notify.svg" alt="">
                </div>
                <div class="nav-item nav-icon">
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