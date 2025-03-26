<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breda University</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<style>
    .collapse.show {
        visibility: visible;
    }
    .accordion-button {
        color: #000 !important; /* Default text color */
        background-color: #fff !important; /* Default background color */
        border: none !important;
    }

    .accordion-button:not(.collapsed) {
        color: #fff !important; /* Text color when active */
        background-color: #fa890a !important; /* Active background color */
    }

    .accordion-button:focus {
        box-shadow: 0 0 0 0.25rem rgba(250, 137, 10, 0.5) !important; /* Focus outline with orange tint */
    }

    /* Change the accordion arrow color */
    .accordion-button::after {
        color: #6c757d !important; /* Set arrow color */
    }

    /* Optional: Change arrow color when active */
    .accordion-button:not(.collapsed)::after {
        color: #6c757d !important; /* Arrow color when active */
    }
</style>

<body class="bg-white">
    <x-mainheader />


    <div class="container mt-5">
        <h1 class="mb-4">Veelgestelde Vragen</h1>

        <div class="accordion" id="accordionExample">
            @foreach ($faqs as $index => $faq)
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading{{ $index }}">
                    <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapse{{ $index }}"
                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                        aria-controls="collapse{{ $index }}">
                        {{ $faq['question'] }}
                    </button>
                </h2>
                <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
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
        $(".panel-group").children().click(function(e) {
            if ($(e.currentTarget).siblings().children(".collapsing").length > 0) {
                return false;
            }
        })
    </script>
</body>
</html>