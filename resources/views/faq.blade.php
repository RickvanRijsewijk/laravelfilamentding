<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breda University</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<style>
    .collapse.show {
        visibility: visible;
    }

    .accordion-button {
        color: #000 !important;
        /* Default text color */
        background-color: #fff !important;
        /* Default background color */
        border: none !important;
        transition: color 0.3s ease, background-color 0.3s ease;
        /* Smooth transition for color and background */
    }

    .accordion-button:not(.collapsed) {
        color: #fff !important;
        /* Text color when active */
        background-color: #fa890a !important;
        /* Active background color */
    }

    .accordion-button:focus {
        box-shadow: 0 0 0 0.25rem rgba(250, 137, 10, 0.5) !important;
        /* Focus outline with orange tint */
    }

    /* Change the accordion arrow color */
    .accordion-button::after {
        color: #6c757d !important;
        /* Set arrow color */
        background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='%23333' xmlns='http://www.w3.org/2000/svg'%3e%3cpath fill-rule='evenodd' d='M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z' clip-rule='evenodd'/%3e%3c/svg%3e") !important;
        transform: scale(.7) !important;
        transition: background-image 0.3s ease; /* Smooth transition for background image */
    }

    /* Optional: Change arrow color when active */
    .accordion-button:not(.collapsed)::after {
        color: #6c757d !important;
        /* Arrow color when active */
        background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='%23333' xmlns='http://www.w3.org/2000/svg'%3e%3cpath fill-rule='evenodd' d='M0 8a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1z' clip-rule='evenodd'/%3e%3c/svg%3e") !important;
        transition: transform 0.3s ease; /* Smooth arrow rotation */
    }

    .accordion-collapse {
        transition: height 0.3s ease; /* Smooth height transition */
    }

    .accordion-collapse.collapse {
        display: block; /* Prevent snapping by keeping the display consistent */
        height: 0; /* Start with height 0 */
        overflow: hidden; /* Hide overflowing content */
        transition: height 0.3s ease; /* Smooth height transition */
    }

    .accordion-collapse.collapse.show {
        height: auto; /* Expand to full height */
    }
</style>

<body class="bg-white">
    <x-mainheader />


    <div class="container mt-5">
        <h1 class="mb-4 animate__animated animate__fadeInUp">Veelgestelde Vragen</h1>

        <div class="accordion" id="accordionExample">
            @foreach ($faqs as $index => $faq)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $index }}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"> {{ $faq['question'] }}</button>
                </h2>
                <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body animate__animated animate__fadeInUp">
                        {!! $faq['answer'] !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <x-footer />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        $('[data-bs-toggle="collapse"]').on('click', function(e) {
            if ($($(this).data('bs-target')).hasClass('collapsing'))
                return false;
        });
    </script>
</body>

</html>