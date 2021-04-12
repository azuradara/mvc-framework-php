<?php

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.1/tailwind.min.css">
  <title>~</title>

  <style>
      #menu-toggle:checked + #menu {
        display: block;
      }
  </style>
</head>

<body class="antialiased bg-gray-200">
  <header class="lg:px-16 px-6 bg-white flex flex-wrap items-center lg:py-0 py-2">
    <div class="flex-1 flex justify-between items-center">
      <a href="/">
        <svg width="32" height="36" viewBox="0 0 32 36" xmlns="http://www.w3.org/2000/svg"><path d="M15.922 35.798c-.946 0-1.852-.228-2.549-.638l-10.825-6.379c-1.428-.843-2.549-2.82-2.549-4.501v-12.762c0-1.681 1.12-3.663 2.549-4.501l10.825-6.379c.696-.41 1.602-.638 2.549-.638.946 0 1.852.228 2.549.638l10.825 6.379c1.428.843 2.549 2.82 2.549 4.501v12.762c0 1.681-1.12 3.663-2.549 4.501l-10.825 6.379c-.696.41-1.602.638-2.549.638zm0-33.474c-.545 0-1.058.118-1.406.323l-10.825 6.383c-.737.433-1.406 1.617-1.406 2.488v12.762c0 .866.67 2.05 1.406 2.488l10.825 6.379c.348.205.862.323 1.406.323.545 0 1.058-.118 1.406-.323l10.825-6.383c.737-.433 1.406-1.617 1.406-2.488v-12.757c0-.866-.67-2.05-1.406-2.488l-10.825-6.379c-.348-.21-.862-.328-1.406-.328zM26.024 13.104l-7.205 13.258-3.053-5.777-3.071 5.777-7.187-13.258h4.343l2.803 5.189 3.107-5.832 3.089 5.832 2.821-5.189h4.352z"></path></svg>
    </a>
  </div>

   <label for="menu-toggle" class="pointer-cursor lg:hidden block"><svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><title>menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path></svg></label>
  <input class="hidden" type="checkbox" id="menu-toggle" />

  <div class="hidden lg:flex lg:items-center lg:w-auto w-full" id="menu">
    <nav>
      <ul class="lg:flex items-center justify-between text-base text-gray-700 pt-4 lg:pt-0">
        <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400" href="/">Home</a></li>
        <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400" href="/contact">Contact</a></li>
      </ul>
    </nav>
    <a href="#" class="lg:ml-4 flex items-center justify-start lg:mb-0 mb-4 pointer-cursor">
      <img class="rounded-full w-10 h-10 border-2 border-transparent hover:border-indigo-400" src="https://picsum.photos/200" alt="John Doe">
    </a>

  </div>
  </header>

  <main>
	  {{content}}
  </main>

  <nav id="footer" class="bg-gray-500">

    <!-- start container -->
    <div class="container mx-auto pt-8 pb-4">

        <div class="flex flex-wrap overflow-hidden sm:-mx-1 md:-mx-px lg:-mx-2 xl:-mx-2">

            <div class="w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-px md:px-px md:w-1/2 lg:my-2 lg:px-2 lg:w-1/4 xl:my-2 xl:px-2 xl:w-1/4 pb-6">
                <!-- Column 1 Content -->
                <img style="max-width: 70%;height:auto;" class="" src="https://pngimage.net/wp-content/uploads/2019/05/fake-logo-png-.png" alt="Logo">
            </div>

            <div class="w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-px md:px-px md:w-1/2 lg:my-2 lg:px-2 lg:w-1/4 xl:my-2 xl:px-2 xl:w-1/4 pb-6">
                <!-- Column 2 Content -->


                <h4 class="text-white">Important</h4>
                <ul class="nav navbar-nav">
                    <li id="navi-2" class="leading-7 text-sm">
                        <a class="text-white underline text-small" href="/page-1">
                            Page 1 </a>
                    </li>
                    <li id="navi-1" class="leading-7 text-sm"><a class="text-white underline text-small" href="/page-2">Page 2</a></li>
                </ul>


            </div>

            <div class="w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-px md:px-px md:w-1/2 lg:my-2 lg:px-2 lg:w-1/4 xl:my-2 xl:px-2 xl:w-1/4 pb-6">
                <!-- Column 3 Content -->
                <h4 class="text-white">Info</h4>
                <ul class="">
                <li id="navi-2" class="leading-7 text-sm">
                    <a class="text-white underline text-small" href="/page-1">
                        Page 1 </a>
                </li>
                <li id="navi-1" class="leading-7 text-sm"><a class="text-white underline text-small" href="/page-2">Page 2</a></li>
                </ul>
            </div>

            <div class="w-full overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-px md:px-px md:w-1/2 lg:my-2 lg:px-2 lg:w-1/4 xl:my-2 xl:px-2 xl:w-1/4 pb-6">
                <!-- Column 4 Content -->

                <h4 class="text-white">Products</h4>
                <ul class="">
                <li id="navi-2" class="leading-7 text-sm">
                    <a class="text-white underline text-small" href="/page-1">
                        Page 1 </a>
                </li>
                <li id="navi-1" class="leading-7 text-sm"><a class="text-white underline text-small" href="/page-2">Page 2</a></li>
                </ul>
            </div>

        </div>



        <!-- Start footer bottom -->

        <div class="pt-4 md:flex md:items-center md:justify-center " style="border-top:1px solid white">
            <ul class="">
                <li class="md:mx-2 md:inline leading-7 text-sm" id="footer-navi-2"><a class="text-white underline text-small" href="/disclaimer">Disclaimer</a></li>
                <li class="md:mx-2 md:inline leading-7 text-sm" id="footer-navi-2"><a class="text-white underline text-small" href="/cookie">Cookie policy</a></li>
                <li class="md:mx-2 md:inline leading-7 text-sm" id="footer-navi-2"><a class="text-white underline text-small" href="/privacy">Privacy</a></li>
                </ul>
            </div>


        <!-- end container -->
        </div>



</nav>
</body>
</html>