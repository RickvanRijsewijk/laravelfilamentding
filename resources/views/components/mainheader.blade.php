<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<?php
use App\Models\Category;
$categories = Category::with('articles')->get()->mapWithKeys(function ($category) {
        return [$category->name => $category->articles];
    });
?>

<style>

    @media (min-width: 992px) {

        .navbar-nav {
            flex-wrap: wrap;
        }

        .navbar .dropdown-menu {
            position: absolute;
            left: 0;
            right: auto;
            width: max-content;
            z-index: 1050;
            white-space: nowrap;
        }

        .navbar .dropdown-menu.show {
            display: block;
            top: 100%;
            left: 0;
        }
    
        .navbar-nav {
            justify-content: flex-end;
        }


        .dropdown-menu {
            text-align: left;
        }

        .navbar-expand-lg .navbar-nav .nav-link {
            padding-right: 1.5rem;
        }
        .navbar .dropdown-menu {
            position: absolute; 
            left: 0;
            right: auto;
            width: max-content;
            z-index: 1050;
        }
    }

    .dropdown-toggle::after {
        content: none;
    }

    .dropdown-menu {
        opacity: 0;
        transform: translateY(-10px);
        visibility: hidden;
        display: none;
        transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
    }

    .dropdown:hover .dropdown-menu {
        opacity: 1;
        transform: translateY(0px);
        visibility: visible;
        display: block;
        transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
    }


    .dropdown-toggle {
        color: #000000;
        background-color: #FFFFFF;
        position: relative;
        padding-right: 30px !important;
        border: none;
        text-decoration: none;
        overflow: hidden;
        transition: color 0.3s ease, background-color 0.3s ease;
    }

    .dropdown-toggle::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: currentColor;
        visibility: hidden;
        transition: width 0.3s ease, visibility 0.3s ease;
    }

    .dropdown-toggle:hover {
        color: black;
        background-color: #f8f9fa;
    }

    .dropdown-toggle:hover::after {
        width: 100%;
        visibility: visible;
    }

    .dropdown-toggle:active {
        color: black !important;
        background-color: #f8f9fa !important;
    }

    .dropdown-toggle .fa-chevron-down {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%) rotate(0deg);
        transition: transform 0.2s ease;
        font-size: 1em;
    }

    .dropdown:hover .dropdown-toggle .fa-chevron-down {
        transform: translateY(-50%) rotate(180deg);
    }

    .avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }

    .sticky-top {
        position: sticky;
        top: 0;
        z-index: 1020;

        width: 100%;
        transition: all 0.3s ease;
    }

    .sticky-top.scrolled {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .header-wrapper {
        background: white;
    }

    body {
        padding-top: 0;
    }

    .login-button {
        --bs-btn-color: #FFFFFF;
        --bs-btn-bg: #6c757d;
        transition: transform 0.3s ease, background-color 0.3s ease;
        transform-origin: center;
    }
    .login-button:hover {
        --bs-btn-color: #fa890a;
        --bs-btn-bg: #fa890a;
        --bs-btn-hover-color: #FFFFFF;
        --bs-btn-hover-bg: #fa890a;
        transform: scale(1.1);
    }

    /* .nav-link {
        position: relative;
        text-align: center;
        align-items: center;
        display: flex;
        justify-content: center; 
        padding-right: 30px;
        border: none;
    } */

</style>

<body>
    <div class="header-wrapper sticky-top">
        <nav class="navbar navbar-expand-lg bg-body-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('images/BUas_logo.png') }}" alt="BUas Logo" class="img" 
                        style="max-height: {{ Route::currentRouteName() === 'dashboard' ? '50px' : '80px' }};">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item me-2">
                            @auth
                            <a href="/admin" class="btn login-button">Go to Admin panel</a>
                            @else
                            <a href="/admin/login" class="btn login-button">Login</a>
                            @endauth
                        </li>
                        @foreach ($categories as $categoryName => $articles)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown-{{ $loop->index }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $categoryName }}
                                    <i class="fas fa-chevron-down"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown-{{ $loop->index }}">
                                    @forelse ($articles as $article)
                                        <li><a class="dropdown-item" href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a></li>
                                    @empty
                                        <li><a class="dropdown-item">No articles found</a></li>
                                    @endforelse
                                </ul>
                            </li>
                        @endforeach
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="faqDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                FAQ & Contact
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="faqDropdown">
                                <li><a class="dropdown-item" href="{{ route('faq') }}">FAQ</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const navbarToggler = document.querySelector(".navbar-toggler");
            const navbarCollapse = document.querySelector(".navbar-collapse");
    
            navbarToggler.addEventListener("click", function () {
                navbarCollapse.classList.toggle("show"); // Toggle the navbar visibility properly
            });
    
            // Close navbar when clicking outside (only in mobile mode)
            document.addEventListener("click", function (event) {
                if (!navbarToggler.contains(event.target) && !navbarCollapse.contains(event.target)) {
                    navbarCollapse.classList.remove("show");
                }
            });
        });
    </script>
    

</body>