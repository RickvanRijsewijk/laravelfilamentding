<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<style>
    .dropdown-toggle::after {
        content: none;
    }

    .dropdown-menu {
        opacity: 0;
        transform: translateY(-15px);
        visibility: hidden;
        display: block;
        transition: opacity 0.3s ease, transform 0.3s ease, visibility 0s 0.3s;
    }

    .dropdown:hover .dropdown-menu {
        opacity: 1;
        transform: translateY(0);
        visibility: visible;
        transition: opacity 0.3s ease, transform 0.3s ease;
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
                    <?php if (isset($component)) { $__componentOriginal8892e718f3d0d7a916180885c6f012e7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8892e718f3d0d7a916180885c6f012e7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.application-logo','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('application-logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8892e718f3d0d7a916180885c6f012e7)): ?>
<?php $attributes = $__attributesOriginal8892e718f3d0d7a916180885c6f012e7; ?>
<?php unset($__attributesOriginal8892e718f3d0d7a916180885c6f012e7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8892e718f3d0d7a916180885c6f012e7)): ?>
<?php $component = $__componentOriginal8892e718f3d0d7a916180885c6f012e7; ?>
<?php unset($__componentOriginal8892e718f3d0d7a916180885c6f012e7); ?>
<?php endif; ?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <?php if(auth()->guard()->check()): ?>
                            <a href="/admin" class="btn login-button">Admin panel</a>
                            <a href="/profile" class="btn login-button"><i class="fa-solid fa-user"></i></a>
                            <?php else: ?>
                            <a href="/admin/login" class="btn login-button">Login</a>
                            <?php endif; ?>
                            
                        </li>
                    </ul>

                </div>
            </nav>
        </div>
    </header>
    <nav class="bg-white border-bottom p-2">
        <div class="container-nav">
            <div class="row justify-content-center">
                <div class="col-auto">
                    <ul class="nav">
                        <li class="nav-item dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown">
                                Werken Onder Architectuur
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if(isset($articles['Werken Onder Architectuur'])): ?>
                                <?php $__currentLoopData = $articles['Werken Onder Architectuur']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a class="dropdown-item"
                                        href="<?php echo e(route('articles.show', $article->slug)); ?>"><?php echo e($article->title); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <li><a class="dropdown-item">No articles found</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <ul class="nav">
                        <li class="nav-item dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown">
                                Informatiemanagement
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if(isset($articles['Informatiemanagement'])): ?>
                                <?php $__currentLoopData = $articles['Informatiemanagement']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a class="dropdown-item"
                                        href="<?php echo e(route('articles.show', $article->slug)); ?>"><?php echo e($article->title); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <li><a class="dropdown-item">No articles found</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <ul class="nav">
                        <li class="nav-item dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown">
                                Data & Security
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if(isset($articles['Data & Security'])): ?>
                                <?php $__currentLoopData = $articles['Data & Security'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a class="dropdown-item"
                                        href="<?php echo e(route('articles.show', $article->slug)); ?>"><?php echo e($article->title); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <li><a class="dropdown-item">No articles found</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <ul class="nav">
                        <li class="nav-item dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown">
                                Applicaties & Tools
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if(isset($articles['Applicaties & Tools'])): ?>
                                <?php $__currentLoopData = $articles['Applicaties & Tools'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a class="dropdown-item"
                                        href="<?php echo e(route('articles.show', $article->slug)); ?>"><?php echo e($article->title); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <li><a class="dropdown-item">No articles found</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <ul class="nav">
                        <li class="nav-item dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown">
                                Governance & Compliance
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if(isset($articles['Governance & Compliance'])): ?>
                                <?php $__currentLoopData = $articles['Governance & Compliance'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a class="dropdown-item"
                                        href="<?php echo e(route('articles.show', $article->slug)); ?>"><?php echo e($article->title); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <li><a class="dropdown-item">No articles found</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <ul class="nav">
                        <li class="nav-item dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown">
                                Community & Kennisdeling
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if(isset($articles['Community & Kennisdeling'])): ?>
                                <?php $__currentLoopData = $articles['Community & Kennisdeling'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a class="dropdown-item"
                                        href="<?php echo e(route('articles.show', $article->slug)); ?>"><?php echo e($article->title); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <li><a class="dropdown-item">No articles found</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <ul class="nav">
                        <li class="nav-item dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown">
                                FAQ & Contact
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if(isset($articles['FAQ & Contact'])): ?>
                                <?php $__currentLoopData = $articles['FAQ & Contact'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a class="dropdown-item"
                                        href="<?php echo e(route('articles.show', $article->slug)); ?>"><?php echo e($article->title); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <li><a class="dropdown-item">No articles found</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script><?php /**PATH C:\Users\rijsewijk.r\Herd\laravelfilamentding\resources\views/components/mainheader.blade.php ENDPATH**/ ?>