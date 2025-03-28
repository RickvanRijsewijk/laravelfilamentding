<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use App\Models\Category;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Log;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Throwable;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $activeNavigationIcon = 'heroicon-s-document-text';
    protected static ?string $navigationGroup = 'Content Beheer';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\RichEditor::make('content')
                        ->required()
                        ->columnSpanFull(),
                    Select::make('category_id')
                        ->label('Category')
                        ->relationship('category', 'name')
                        ->required()
                        ->options(Category::all()->pluck('name', 'id')->toArray())
                        ->searchable(),
                    Forms\Components\DateTimePicker::make('published_at'),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->placeholder('NULL'),
                TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable()
                    ->placeholder('Not published')
                    
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('Publish')
                    ->visible(fn ($record) => !$record->published_at)
                    ->action(function ($record): void {
                        try {
                            $record->update(['published_at' => now()]);
                            Notification::make()
                                ->title('Success')
                                ->color('success')
                                ->body('Article published successfully!')
                                ->seconds(3)
                                ->send();
                        } catch (Throwable $e) {
                            Log::error("Error publishing article {$record->id}: " . $e->getMessage());
                            Notification::make()
                                ->title('Failed to publish article!')
                                ->color('danger')
                                ->body($e->getMessage())
                                ->seconds(3)
                                ->danger()
                                ->send();
                        }
                        })
                    ->icon('heroicon-o-check')
                    ->color('success'),
                Tables\Actions\Action::make('Unpublish')
                    ->visible(fn ($record) => $record->published_at) // Show only if published
                    ->action(function ($record) {
                        $record->update(['published_at' => null]);
                        Notification::make()
                            ->title('Success')
                            ->color('success')
                            ->body('Article published successfully!')
                            ->seconds(3)
                            ->success()
                            ->send();
                    })
                    ->icon('heroicon-o-x-circle')
                    ->color('danger'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('publish')
                        ->label('Publish')
                        ->icon('heroicon-o-check')
                        ->color('success')
                        ->action(function ($records): void {
                            try {
                                $records->each(function (Article $record) {
                                    $record->update(['published_at' => now()]);
                                });
                                Notification::make()
                                    ->title('Articles published successfully!')
                                    ->success()
                                    ->send();
                            } catch (Throwable $e) {
                                Log::error("Error publishing articles: " . $e->getMessage());
                                Notification::make()
                                    ->title('Failed to publish articles!')
                                    ->danger()
                                    ->send();
                            }
                        }),
                    Tables\Actions\BulkAction::make('unpublish')
                        ->label('Unpublish')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->action(function ($records): void {
                            try {
                                $records->each(function (Article $record) {
                                    $record->update(['published_at' => null]);
                                });
                                Notification::make()
                                    ->title('Articles unpublished successfully!')
                                    ->success()
                                    ->send();
                            } catch (Throwable $e) {
                                Log::error("Error unpublishing articles: " . $e->getMessage());
                                Notification::make()
                                    ->title('Failed to unpublish articles!')
                                    ->color('danger')
                                    ->danger()
                                    ->send();
                            }
                        }),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}