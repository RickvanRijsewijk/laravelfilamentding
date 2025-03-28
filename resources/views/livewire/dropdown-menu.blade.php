<div class="row justify-content-center">
            @foreach ($categories as $categoryName => $articles)
                <div class="col-auto">
                    <ul class="nav">
                        <li class="nav-item dropdown">
                            <a class="btn btn-secondary dropdown-toggle" role="button" data-bs-toggle="dropdown">
                                {{ $categoryName }}
                                <i class="fas fa-chevron-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                @forelse ($articles as $article)
                                    <li><a class="dropdown-item" href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a></li>
                                @empty
                                    <li><a class="dropdown-item">No articles found</a></li>
                                @endforelse
                            </ul>
                        </li>
                    </ul>
                </div>
            @endforeach

            <div class="col-auto">
                <ul class="nav">
                    <li class="nav-item dropdown">
                        <a class="btn btn-secondary dropdown-toggle" role="button" data-bs-toggle="dropdown">
                            FAQ & Contact
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('faq') }}">FAQ</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        @push('scripts')
        <script>
            document.addEventListener('livewire:load', function () {
                Livewire.on('refreshDropdown', () => {
                    $('.dropdown-toggle').dropdown();
                });
            });
        </script>
        @endpush
