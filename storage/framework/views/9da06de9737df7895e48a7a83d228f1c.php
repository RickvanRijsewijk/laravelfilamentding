<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breda University</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-white">
    <?php if (isset($component)) { $__componentOriginalf8a2c09b831844529ffde1cd942b840f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf8a2c09b831844529ffde1cd942b840f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.mainheader','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mainheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf8a2c09b831844529ffde1cd942b840f)): ?>
<?php $attributes = $__attributesOriginalf8a2c09b831844529ffde1cd942b840f; ?>
<?php unset($__attributesOriginalf8a2c09b831844529ffde1cd942b840f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf8a2c09b831844529ffde1cd942b840f)): ?>
<?php $component = $__componentOriginalf8a2c09b831844529ffde1cd942b840f; ?>
<?php unset($__componentOriginalf8a2c09b831844529ffde1cd942b840f); ?>
<?php endif; ?>

    <!-- Main Content Section -->
    <main class="container py-4">
        <h3 class="fs-5 text-black">Welcome to Breda University!</h3>
        <p>The standard Lorem Ipsum passage, used since the 1500s
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum.<br><br>

            Section 1.10.32 of de Finibus Bonorum et Malorum, written by Cicero in 45 BC
            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
            aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
            dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor
            sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore
            magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
            suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in
            ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas
            nulla pariatur?<br><br>

            1914 translation by H. Rackham
            But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and
            I will give you a complete account of the system, and expound the actual teachings of the great explorer of
            the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself,
            because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter
            consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain
            pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can
            procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical
            exercise, except to obtain some advantage from it? But who has any right to find fault with a man who
            chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no
            resultant pleasure?<br><br>

            Section 1.10.33 of de Finibus Bonorum et Malorum, written by Cicero in 45 BC
            At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti
            atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique
            sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum
            facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
            impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor
            repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et
            voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus,
            ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores
            repellat.<br><br>

            1914 translation by H. Rackham
            On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and
            demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain
            and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through
            weakness of will, which is the same as saying through shrinking from toil and pain. These cases are
            perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when
            nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain
            avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will
            frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always
            holds in these matters to this principle of selection: he rejects pleasures to secure other greater
            pleasures, or else he endures pains to avoid worse pains.
        </p>
    </main>

    <!-- Footer Section -->
    <?php if (isset($component)) { $__componentOriginal8a8716efb3c62a45938aca52e78e0322 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a8716efb3c62a45938aca52e78e0322 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $attributes = $__attributesOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $component = $__componentOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__componentOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html><?php /**PATH C:\Users\rijsewijk.r\Herd\laravelfilamentding\resources\views/welcome.blade.php ENDPATH**/ ?>