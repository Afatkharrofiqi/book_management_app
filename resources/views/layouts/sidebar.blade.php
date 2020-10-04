<li class="{{ request()->is('home') ? 'active' : '' }}">
    <a href="/home"><span class="oi oi-home"></span> Home</a>
</li>
@can('manage-users')
    <li class="{{ request()->is('users*') ? 'active' : '' }}">
        <a href="{{route('users.index')}}">
            <span class="oi oi-people"></span> Manage Users
        </a>
    </li>
@endcan
@can('manage-categories')
<li class="{{ request()->is('categories*') ? 'active' : '' }}">
    <a href="{{route('categories.index')}}">
        <span class="oi oi-tag"></span> Manage Categories
    </a>
</li>
@endcan
@can('manage-books')
<li class="{{ request()->is('books*') ? 'active' : '' }}">
    <a href="{{route('books.index')}}">
        <span class="oi oi-book"></span> Manage Books
    </a>
</li>
@endcan