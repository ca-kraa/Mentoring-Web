<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
    <div class="container">
        <div class="navbar-text">
            <span id="clock"></span>
        </div>
         <a class="navbar-brand" href="/dashboard">
            <img src="https://i.ibb.co/HhM1Qgg/image.png" alt="Logo" height="30">
        </a>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://64.media.tumblr.com/4ca997be665ee395717da67b53784ab2/b6932c7dbfb05c51-b3/s1280x1920/c68386df0bef1c3a0d58173dd65dd0a639b83339.jpg" alt="Profile" class="img-circle" style="width: 30px;">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<script>
    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();

        var timeString = hours + ':' + minutes + ':' + seconds;

        document.getElementById('clock').textContent = timeString;

        setTimeout(updateClock, 1000);
    }

    updateClock();
</script>
<?php /**PATH D:\UdaCoding\Codingan\mentoring\resources\views/atribut/navbar.blade.php ENDPATH**/ ?>