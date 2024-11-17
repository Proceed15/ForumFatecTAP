<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="img/Logo nav.png" type="image/x-icon">
</head>

<link rel="stylesheet" href="/css/form.css">
<link rel="stylesheet" href="/css/header.css">
<link rel="stylesheet" href="/css/users.css">
<link rel="stylesheet" href="/css/landing.css">
<link rel="stylesheet" href="/css/topic.css">
<link rel="stylesheet" href="/css/profile.css">
<link rel="stylesheet" href="/css/btn.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="/js/toggleModal.js" defer></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  
<title> Fórum - Laravel </title>
</head>

<body>
    <header>
        <div class="nav-logo">
            <a href="../">
                <img src="../../../img/Logo nav.png" alt="" href="register">
            </a>
        </div>
        <div class="nav-search">
            <div class="search-wrapper">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="search" name="" id="" placeholder="Search for topics">
            </div>
        </div>
        <div class="nav-user">
            <i class="fa-solid fa-bell"></i>
            <div class="nav-profile"></div>
        </div>
    </header>
    <div class="profile" id="profile-modal" > 
        <i class="fa-solid fa-x profile-modal-close"></i>
        <div class="profile-modal"  @guest style="display:none;" @endguest></div>
        <div class="profile-info">
            @auth
                <p>Usuario</p>
                <p>Email</p>
                <div class="logout">
                    <a href="#">My Account</a>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Exit</a>
                    <form id="logout-form" action="#" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            @else
                <p><a href="#">Sign In</a> or <a href="#">Sign Up</a></p>
            @endauth
        </div>
    </div>
    <main>
        <div class="landing">
            <div class="sidebar">
                <div class="sidebar-menu">
                    <h2>MENU</h2>
                    <p class="menu-item" onclick="selectMenuItem(this)"><i class="fa-regular fa-compass"></i>Explore Topics</p>
                    <p class="menu-item" onclick="selectMenuItem(this)"><i class="fa-solid fa-tag"></i>Tags</p>
                </div>
                <div class="sidebar-personalnav">
                    <h2>PERSONAL NAVIGATOR</h2>
                    <p class="menu-item" onclick="selectMenuItem(this)"><i class="fa-regular fa-circle-question"></i>My Questions</p>
                    <p class="menu-item" onclick="selectMenuItem(this)"><i class="fa-regular fa-comments"></i>My Answers</p>
                    <p class="menu-item" onclick="selectMenuItem(this)"><i class="fa-regular fa-thumbs-up"></i>My Likes</p>
                </div>
                <div class="sidebar-premium">

                </div>
            </div>
            <div class="center">
                <div class="filters">
                    <div class="filters-new filter">
                        <p><i class="fa-regular fa-clock"></i>New</p>
                    </div>
                    <div class="filters-trending filter ">
                        <p><i class="fa-solid fa-turn-up"></i>Trending</p>
                    </div>
                    <div class="filters-category filter">
                        <p><i class="fa-solid fa-sliders"></i>Category</p>
                    </div>
                </div>
                <div class="content">
                    
                    @yield('content')
                        
                </div>
                
            </div>
            <div class="sidebar">
                @yield('actionButton')
                <div class="suggestions">
                    <h3>Suggestions</h3>
                    <div class="suggestions-users">
                        <div class="user">
                            <img src="" alt="">
                            <p>Nome</p>
                            <button><i class="fa-solid fa-plus"></i>Follow</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

        
    </main>

</body>
</html>
