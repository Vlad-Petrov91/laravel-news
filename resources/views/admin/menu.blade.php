<li class="nav-item"><a class="nav-link {{request()->routeIs('home')? ' active':''}}"
                        href="{{ route('home') }}">Главная</a></li>
<li class="nav-item"><a class="nav-link {{request()->routeIs('admin.news.index')? ' active':''}}"
                        href="{{ route('admin.news.index') }}">Admin</a></li>
<li class="nav-item"><a class="nav-link {{request()->routeIs('admin.news.create')? ' active':''}}"
                        href="{{ route('admin.news.create') }}">Создать новость</a></li>
<li class="nav-item"><a class="nav-link {{request()->routeIs('admin.category.index')? ' active':''}}"
                        href="{{ route('admin.category.index') }}">Категории</a></li>
<li class="nav-item"><a class="nav-link {{request()->routeIs('admin.users.index')? ' active':''}}"
                        href="{{ route('admin.users.index') }}">Пользователи</a></li>
