<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocialMediaWidgetResource\Pages;
use App\Filament\Resources\SocialMediaWidgetResource\RelationManagers;
use App\Models\SocialMediaWidget;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SocialMediaWidgetResource extends Resource
{
    protected static ?string $model = SocialMediaWidget::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Widgets';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('key')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('facebook')
                    ->maxLength(255),
                Forms\Components\TextInput::make('twitter')
                    ->maxLength(255),
                Forms\Components\TextInput::make('instagram')
                    ->maxLength(255),
                Forms\Components\TextInput::make('linkedin')
                    ->maxLength(255),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('facebook'),
                Tables\Columns\TextColumn::make('twitter'),
                Tables\Columns\TextColumn::make('instagram'),
                Tables\Columns\TextColumn::make('linkedin'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSocialMediaWidgets::route('/'),
            'create' => Pages\CreateSocialMediaWidget::route('/create'),
            'edit' => Pages\EditSocialMediaWidget::route('/{record}/edit'),
        ];
    }
}
