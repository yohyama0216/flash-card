<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">
                    <span data-feather="play"></span>
                    学習開始
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/setting">
                    <span data-feather="settings"></span>
                    学習設定
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/history">
                    <span data-feather="list"></span>
                    学習履歴
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  @if($current == 'search')active @endif" href="/sentence">
                    <span data-feather="search"></span>
                    英文、和文検索
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  @if($current == 'search')active @endif" href="/user">
                    <span data-feather="user"></span>
                    学習者一覧
                </a>
            </li>
        </ul>
    </div>
</nav>