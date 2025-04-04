<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfilePageController;
use App\Http\Controllers\SubscriptionController;
use App\Models\Category;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::post('/logout', function () {
//     Auth::logout();
//     return redirect('/');
// })->name('logout');

Route::get('/test', function () {
    // Fetch categories and their articles
    $categories = Category::with('articles')->get()->mapWithKeys(function ($category) {
        return [$category->name => $category->articles];
    });

    // Pass the categories to the view
    return view('test', compact('categories'));
})->name('test');

Route::get('/faq', function () {
    $faqs = [
        [
            'question' => 'Wat is het verschil tussen architectuur en informatiemanagement?',
            'answer' => '<p><strong>Architectuur</strong> richt zich op het ontwerpen en realiseren van fysieke of digitale structuren. Dit omvat niet alleen de esthetische en functionele aspecten van een gebouw of IT-systeem, maar ook de manier waarop deze onderdelen samenwerken en integreren in een groter geheel.</p>
                        <p><strong>Informatiemanagement</strong> gaat over het organiseren, beheren en beveiligen van informatie binnen een organisatie. Het omvat processen zoals data governance, compliance, en de strategische inzet van informatie als een waardevolle hulpbron. Terwijl architectuur vaak visueel en structureel van aard is, richt informatiemanagement zich meer op data, processen en de toegankelijkheid van informatie.</p>'
        ],
        [
            'question' => 'Hoe kan ik een architectuurbesluit aanvragen?',
            'answer' => '<p>Het aanvragen van een architectuurbesluit begint met het verzamelen van alle benodigde documenten en tekeningen van het project. Vervolgens dient u een formeel verzoek in bij de relevante instantie, zoals de gemeentelijke bouwafdeling of een architectuurcommissie. Dit proces omvat meestal het indienen van een gedetailleerd plan, een uitleg over de ontwerpintenties, en de naleving van lokale bouwvoorschriften.</p>
                        <p>Na de indiening volgt vaak een beoordelingsproces waarbij experts uw aanvraag evalueren en eventueel feedback geven of aanvullende informatie vragen voordat een definitief besluit wordt genomen.</p>'
        ],
        [
            'question' => 'Waar kan ik richtlijnen en beleid vinden?',
            'answer' => '<p>Richtlijnen en beleid met betrekking tot architectuur zijn doorgaans te vinden via verschillende officiële kanalen. Overheidsinstanties publiceren vaak documenten zoals het Bouwbesluit en gemeentelijke bestemmingsplannen, die gedetailleerde instructies geven over bouwtechnische en stedenbouwkundige eisen.</p>
                        <p>Daarnaast bieden architectuurverenigingen en brancheorganisaties, zoals de BNA (Bond van Nederlandse Architecten), richtlijnen en best practices. Ook internationale normen, zoals ISO-standaarden, kunnen als referentie dienen voor bepaalde aspecten van ontwerp en bouw.</p>'
        ],
        [
            'question' => 'Hoe wordt informatieveiligheid gewaarborgd?',
            'answer' => '<p><strong>Informatieveiligheid</strong> wordt gegarandeerd door een combinatie van technische, organisatorische en beleidsmatige maatregelen. Dit omvat het implementeren van internationale normen zoals ISO 27001, die eisen stellen aan het beveiligingsbeheer van informatie.</p>
                        <p>Daarnaast maken organisaties gebruik van encryptietechnieken om data te beschermen, voeren zij streng toegangsbeheer uit om onbevoegde toegang te voorkomen, en worden regelmatige audits uitgevoerd om de effectiviteit van beveiligingsmaatregelen te controleren.</p>
                        <p>Het trainen van medewerkers in bewustwording van cyberdreigingen speelt ook een cruciale rol in het handhaven van een veilige informatieomgeving.</p>'
        ],
        [
            'question' => 'Test question',
            'answer' => '<p>This is a test answer to verify the formatting.</p>'
        ],
        [
            'question' => 'Test question',
            'answer' => '<p>This is a test answer to verify the formatting.</p>'
        ]
    ];
    
    

    return view('faq', compact('faqs'));
})->name('faq');

Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
Route::get('/unsubscribe', [SubscriptionController::class, 'unsubscribe'])->name('unsubscribe');

Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/category/{category_id}', [ArticleController::class, 'getArticlesByCategory']);

// Article routes
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfilePageController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfilePageController::class, 'update'])->name('profile.update');
});
