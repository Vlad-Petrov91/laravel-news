<li class="nav-item"><a class="nav-link {{ request()->routeIs('home')? 'active':'' }}"
                        href="{{ route('home') }}">Главная</a></li>
<li class="nav-item"><a class="nav-link {{ request()->routeIs('category.index')? ' active':'' }}"
                        href="{{ route('news.category.index') }}">Категории</a></li>
<li class="nav-item"><a class="nav-link {{ request()->routeIs('news.index')? ' active':'' }}"
                        href="{{ route('news.index') }}">Новости</a></li>
@auth()
    @if(Auth::user()->isAdmin)
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.index')? 'active':'' }}"
                                href="{{ route('admin.news.index') }}">Admin</a></li>
    @endif
@endauth
