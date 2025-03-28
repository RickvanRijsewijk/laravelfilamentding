<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<style>
    .dropdown-toggle::after {
        content: none;
    }

    .dropdown-menu {
        opacity: 0;
        transform: translateY(-10px);
        visibility: hidden;
        display: block;
        transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
    }

    .dropdown:hover .dropdown-menu {
        opacity: 1;
        transform: translateY(0px);
        visibility: visible;
        transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
    }

    .nav-button {
        color: #000000;
        background-color: #FFFFFF;
        position: relative;
        text-align: center;
        align-items: center;
        display: flex;
        justify-content: center;
        padding-right: 30px;
        border: none;
    }

    .nav-button:hover {
        color: black;
        background-color: #f8f9fa;
    }

    .nav-button:active {
        color: black !important;
        background-color: #f8f9fa !important;
    }

    .dropdown-toggle {
        color: #000000;
        background-color: #FFFFFF;
        position: relative;
        padding-right: 30px;
        border: none;
    }

    .dropdown-toggle:hover {
        color: black;
        background-color: #f8f9fa;
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
        transition: transform 0.3s ease;
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
        --bs-btn-hover-color: #FFFFFF;
        --bs-btn-hover-bg: #fa890a;
    }
</style>

<div class="header-wrapper sticky-top">
    <header class="bg-white shadow-sm p-3 border-bottom">
        <div class="container-header ml-4">
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <a class="navbar-brand" href="/">
                    <x-application-logo />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            @auth
                            <a href="/admin" class="btn login-button">Admin panel</a>
                            <!-- <a href="/profile" class="btn login-button"><i class="fa-solid fa-user"></i></a> -->
                            @else
                            <a href="/admin/login" class="btn login-button">Login</a>
                            @endauth

                        </li>
                    </ul>

                </div>
            </nav>
        </div>
    </header>
    <nav class="bg-white border-bottom p-2">
        <div class="container-nav">
            <livewire:DropdownMenu />
        </div>
    </nav>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
