<?php
    $formPanelPosition = filament('filament-auth-ui-enhancer')->getFormPanelPosition();
    $mobileFormPanelPosition = filament('filament-auth-ui-enhancer')->getMobileFormPanelPosition();
    $emptyPanelBackgroundImageUrl = filament('filament-auth-ui-enhancer')->getEmptyPanelBackgroundImageUrl();
    $emptyPanelBackgroundImageOpacity = filament('filament-auth-ui-enhancer')->getEmptyPanelBackgroundImageOpacity();
    $showEmptyPanelOnMobile = filament('filament-auth-ui-enhancer')->getShowEmptyPanelOnMobile();
    $emptyPanelView = filament('filament-auth-ui-enhancer')->getEmptyPanelView();
?>
<?php if (isset($component)) { $__componentOriginale960ae7ad1b1ce9e3596e483505fadc9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale960ae7ad1b1ce9e3596e483505fadc9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-panels::components.layout.base','data' => ['livewire' => $livewire]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament-panels::layout.base'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['livewire' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($livewire)]); ?>
    <div
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
          'custom-auth-wrapper flex w-full min-h-screen',
          'lg:flex-row-reverse' => $formPanelPosition === 'left',
          'lg:flex-row' => $formPanelPosition === 'right',
          'flex-col' => $mobileFormPanelPosition === 'bottom' && $showEmptyPanelOnMobile,
          'flex-col-reverse' => $mobileFormPanelPosition === 'top' && $showEmptyPanelOnMobile,
        ]); ?>"
    >
        <!-- Empty Container -->
        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'custom-auth-empty-panel relative justify-center px-4',
            'bg-[var(--empty-panel-background-color)]',
            'hidden lg:flex lg:flex-col lg:flex-grow' => $showEmptyPanelOnMobile === false,
            'flex flex-col flex-grow' => $showEmptyPanelOnMobile === true
            ]); ?>"
        >
            <?php if($emptyPanelView): ?>
                <?php echo $__env->make($emptyPanelView, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php else: ?>
                <?php if($emptyPanelBackgroundImageUrl): ?>
                    <div class="absolute inset-0 h-full w-full bg-cover bg-center"
                         style="background-image: url('<?php echo e($emptyPanelBackgroundImageUrl); ?>'); opacity: <?php echo e($emptyPanelBackgroundImageOpacity); ?>; background-position: center;">
                </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <!-- Form Container -->
        <div class="custom-auth-form-panel flex flex-col justify-center px-4 py-12 sm:px-6 lg:px-20 xl:px-36 w-full lg:w-[var(--form-panel-width)] bg-[var(--form-panel-background-color)]">
            <div class="custom-auth-form-wrapper mx-auto w-full max-w-sm">
                <?php echo e($slot); ?>

            </div>
        </div>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale960ae7ad1b1ce9e3596e483505fadc9)): ?>
<?php $attributes = $__attributesOriginale960ae7ad1b1ce9e3596e483505fadc9; ?>
<?php unset($__attributesOriginale960ae7ad1b1ce9e3596e483505fadc9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale960ae7ad1b1ce9e3596e483505fadc9)): ?>
<?php $component = $__componentOriginale960ae7ad1b1ce9e3596e483505fadc9; ?>
<?php unset($__componentOriginale960ae7ad1b1ce9e3596e483505fadc9); ?>
<?php endif; ?>
<?php /**PATH C:\Users\rijsewijk.r\Herd\laravelfilamentding\vendor\diogogpinto\filament-auth-ui-enhancer\src\/../resources/views/custom-auth-layout.blade.php ENDPATH**/ ?>