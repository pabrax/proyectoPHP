<div class="container-fluid d-flex flex-column justify-content-between bg-dark text-light ms-0 me-0" style="height: 100vh;">
    <div class="profile">
        <img src="images/profile.png" alt="">
        <a href="#" class="link-underline link-underline-opacity-0 link-light">Mi perfil</a>
    </div>

    <div class="nav">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ route('home')}} ">Home</a></li>
            @if (Auth::user()->user_type == 'gerente' || Auth::user()->user_type == 'CEO')
                <li class="nav-item"><a class="nav-link" href="{{ route('users')}} ">Usuarios</a></li>
            @endif    
            <li class="nav-item"><a class="nav-link" href="{{ route('tasks')}} ">Tareas</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('assists')}} ">Asistencia</a></li>
        </ul>
    </div>

    <div class="logout">
        <a href="{{ route('logout') }}" class="link-underline link-underline-opacity-0 link-light">Logout</a>
    </div>
</div>
