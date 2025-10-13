<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema(
                        [

                            TextInput::make('title')
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                ->required(),
                            TextInput::make('slug')->required(),
                            // ]), 
                            Select::make('category_id')
                                ->relationship(name: 'category', titleAttribute: 'name')
                                ->searchable()
                                ->preload(),
                           SpatieMediaLibraryFileUpload::make('thumbnail')
    ->collection('posts'),
                            RichEditor::make('content')

                            ,
                            Toggle::make('is_published')
                                ->required(),
                        ]
                    )->columnSpanFull(),


            ]);
    }
}
