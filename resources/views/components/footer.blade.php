<style>
.footer-orange-bar {
    background-color: #fa890a;
    color: white;
    padding: 20px 0;
}

.footer-orange-bar a {
    color: white;
    text-decoration: none;
}

.footer-orange-bar a:hover {
    text-decoration: underline;
}

.footer-icons a {
    color: white;
    margin-left: 10px;
}

.footer-icons a:hover {
    color: #ddd;
}
</style>

<footer class="bg-white border-top p-3 mt-4 text-center">
    <div class="container">
        <a href="/"><img src="{{ asset('images/BUas_logo.png') }}" alt="Footer Image" class="img-fluid mb-2 float-end"
                style="width: 200px; height: auto;"></a>
        <form method="POST" action="{{ route('subscribe') }}" class="p-4 rounded bg-light" style="max-width: 500px;">
            @csrf

            @if(session('success'))
                <div class="alert alert-success animate__animated animate__fadeInUp">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <h5 class="text-black">Nieuwsbrief</h5>
            <label for="email" class="form-label">Wil je niets missen? Schrijf je in voor onze nieuwsbrief!</label>

            <div class="input-group mb-3">
                <input type="email" name="email" id="email" placeholder="E-mailadres..." class="form-control" required>
                <button type="submit" class="btn btn-primary">
                    Inschrijven
                </button>
            </div>

            @error('email')
                <div class="text-danger mb-2">{{ $message }}</div>
            @enderror
        </form>        
        <p class="text-black">&copy; 2025 Breda University. All rights reserved.</p>
        
    </div>
</footer>

<!-- Add some margin to move the orange bar further down -->
<div class="mt-4"></div>

<div class="footer-orange-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-start">
                Breda University of Applied Science
            </div>
            <div class="col-md-4 text-center">
                <a href="#">Pers</a> | <a href="https://www.buas.nl/en/privacy-statement">Privacy Terms</a> | <a
                    href="#">Sitemap</a>
            </div>
            <div class="col-md-4 text-end footer-icons">
                <a href="https://www.linkedin.com/school/bredauniversityas/"><i class="fab fa-linkedin"></i></a>
                <a href="https://www.tiktok.com/@bredauniversityas"><i class="fab fa-tiktok"></i></a>
                <a href="https://x.com/bredauas"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/bredauniversityas/"><i class="fab fa-instagram"></i></a>
                <a href="https://www.youtube.com/BredaUniversityofAppliedSciences"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
</div>