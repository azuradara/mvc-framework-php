<?php
/** @var $this \app\core\View */

use app\core\Application;

var_dump(Application::$app->user);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.1/tailwind.min.css">
    <title><?php echo $this->title ?></title>

    <style>
        #menu-toggle:checked + #menu {
            display: block;
        }
    </style>
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link
            rel="apple-touch-icon"
            sizes="76x76"
            href="./assets/img/apple-icon.png"
    />

</head>

<body class="antialiased bg-gray-200">
<header class="lg:px-16 px-6 bg-white flex flex-wrap items-center lg:py-0 py-2">
    <div class="flex-1 flex justify-between items-center">
        <a href="/">
            <svg width="32" height="36" viewBox="0 0 32 36" xmlns="http://www.w3.org/2000/svg">
                <path
                        d="M15.922 35.798c-.946 0-1.852-.228-2.549-.638l-10.825-6.379c-1.428-.843-2.549-2.82-2.549-4.501v-12.762c0-1.681 1.12-3.663 2.549-4.501l10.825-6.379c.696-.41 1.602-.638 2.549-.638.946 0 1.852.228 2.549.638l10.825 6.379c1.428.843 2.549 2.82 2.549 4.501v12.762c0 1.681-1.12 3.663-2.549 4.501l-10.825 6.379c-.696.41-1.602.638-2.549.638zm0-33.474c-.545 0-1.058.118-1.406.323l-10.825 6.383c-.737.433-1.406 1.617-1.406 2.488v12.762c0 .866.67 2.05 1.406 2.488l10.825 6.379c.348.205.862.323 1.406.323.545 0 1.058-.118 1.406-.323l10.825-6.383c.737-.433 1.406-1.617 1.406-2.488v-12.757c0-.866-.67-2.05-1.406-2.488l-10.825-6.379c-.348-.21-.862-.328-1.406-.328zM26.024 13.104l-7.205 13.258-3.053-5.777-3.071 5.777-7.187-13.258h4.343l2.803 5.189 3.107-5.832 3.089 5.832 2.821-5.189h4.352z">
                </path>
            </svg>
        </a>
    </div>

    <label for="menu-toggle" class="pointer-cursor lg:hidden block">
        <svg class="fill-current text-gray-900"
             xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
            <title>menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
        </svg>
    </label>
    <input class="hidden" type="checkbox" id="menu-toggle"/>

    <div class="hidden lg:flex lg:items-center lg:w-auto w-full" id="menu">
        <nav>
            <ul class="lg:flex items-center justify-between text-base text-gray-700 pt-4 lg:pt-0">
                <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400"
                       href="/">Home</a></li>
                <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400"
                       href="/contact">Contact</a></li>

                <?php if (Application::guestUser()): ?>
                    <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400"
                           href="/login">Log In</a></li>
                    <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400"
                           href="/signup">Sign Up</a></li>
                <?php endif; ?>
            </ul>
        </nav>

        <?php if (!Application::guestUser()): ?>
            <a href="/profile" class="lg:ml-4 flex items-center justify-center lg:mb-0 mb-4 pointer-cursor">
                <p class="ml-5 mr-2"><?php echo Application::$app->user->getDisplayName() ?></p>
                <img class="rounded-full w-10 h-10 border-2 border-transparent hover:border-indigo-400"
                     src="https://picsum.photos/200" alt="John Doe">
            </a>
            <a href="/logout" class="ml-2">Log Out</a>
        <?php endif; ?>
    </div>
</header>

<main>
    <div class="container mx-auto">
        <?php if (Application::$app->session->getPop('success')): ?>
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md"
                 role="alert">
                <div class="flex">
                    <div class="py-1">
                        <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20">
                            <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold"><?php echo Application::$app->session->getPop('success') ?></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        {{content}}
    </div>
</main>

</body>

</html>