<div class="nav-bar">
    <div class="flex-box nav-main">

        {{--left side of the navbar--}}
        <div class="nav-group flex-box">
            <div class="nav-item nav-title">
                Pop Shop
            </div>
            <div class="nav-item">
                |
            </div>
            {{--<div class="nav-item">
                <a class="link-clear nav-link" href="/dashboard">
                    Dashboard
                </a>
            </div>
            <div class="nav-item">
                <a class="link-clear nav-link" href="/marketplace">
                    Marketplace
                </a>
            </div>--}}
            @foreach(config('pop.category') as $category)
                <div class="nav-item">
                    <a class="link-clear nav-link" href="dashboard?{{ $category }}">
                        {{ $category }}
                    </a>
                </div>
            @endforeach
        </div>

        {{--right side of the nav bar hold avatar and notification icon--}}
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
        </div>
    </div>
</div>