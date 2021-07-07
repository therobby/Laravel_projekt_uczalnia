<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


    <link href="<?php echo e(asset('css/custom-styles.css')); ?>" rel="stylesheet">
    <style>
        html,
        body {
            /* background-color: #000; */
            /* color: #636b6f; */
            color: #eff0f0;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;

        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 15px;
        }

        .top-left {
            position: absolute;
            left: 10px;
            top: 15px;
        }

        .title {
            font-size: 84px;
            z-index: 10;
        }

        .links>a {
            /* color: #636b6f; */
            color: #eff0f0;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="background"></div>
    <div class="flex-center position-ref full-height">
        <div class="linkbar">
            <div class="blured"></div>
            <div class="top-left links">
                <a href="<?php echo e(url('/shop')); ?>">Sklep</a>
            </div>
            <?php if(Route::has('login')): ?>
            <div class="top-right links">
                <?php if(auth()->guard()->check()): ?>
                <?php if(Auth::user()->isAdmin()): ?>
                <a class="nav-link text-white" href="<?php echo e(route('admin')); ?>">Admin</a>
                <?php endif; ?>
                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <?php echo e(__('Logout')); ?>

                </a>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
                <?php else: ?>
                <a href="<?php echo e(route('login')); ?>">Logowanie</a>

                <?php if(Route::has('register')): ?>
                <a href="<?php echo e(route('register')); ?>">Rejestracja</a>
                <?php endif; ?>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
        <div class="content">
            <div class="blured"></div>
            <div class="content">
                <div class="title m-b-md">
                    Otoczaki
                </div>
                <div>
                    Najlepsze kamyczki w całym wszechświecie!
                </div>
            </div>
        </div>
    </div>
</body>

</html><?php /**PATH C:\xampp\htdocs\otoczaki\resources\views/welcome.blade.php ENDPATH**/ ?>