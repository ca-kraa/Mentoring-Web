<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <a class="navbar-brand" href="/dashboard">
                <img src="https://i.ibb.co/HhM1Qgg/image.png" alt="Logo" height="30">
            </a>
            <div class="navbar-text ml-4">
                <ul class="nav d-flex">
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link text-success">
                            <i class="fas fa-home text-success"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('siswa.index')); ?>" class="nav-link text-success">
                            <i class="fas fa-users text-success"></i> Siswa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('skor.index')); ?>" class="nav-link text-success">
                            <i class="fas fa-ranking-star text-success"></i> Skor
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('review.index')); ?>" class="nav-link text-success">
                            <i class="fas fa-chart-simple text-success"></i> Review
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="<?php echo e(route('logout')); ?>" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<?php /**PATH D:\UdaCoding\Codingan\mentoring\mentoring\resources\views/atribut/navbar.blade.php ENDPATH**/ ?>