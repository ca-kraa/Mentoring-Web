<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand" href="/dashboard">
            <img src="https://i.ibb.co/HhM1Qgg/image.png" alt="Logo" height="30">
        </a>
        <div class="navbar-text mx-auto">
            <span id="clock"></span>
        </div>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://64.media.tumblr.com/4ca997be665ee395717da67b53784ab2/b6932c7dbfb05c51-b3/s1280x1920/c68386df0bef1c3a0d58173dd65dd0a639b83339.jpg" alt="Profile" class="img-circle" style="width: 30px;">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>

