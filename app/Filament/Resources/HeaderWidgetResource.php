<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeaderWidgetResource\Pages;
use App\Filament\Resources\HeaderWidgetResource\RelationManagers;
use App\Models\HeaderWidget;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeaderWidgetResource extends Resource
{
    protected static ?string $model = HeaderWidget::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Widgets';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('key')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('site_title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('site_description')
                    ->maxLength(255),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key'),
                Tables\Columns\TextColumn::make('site_title'),
                Tables\Columns\TextColumn::make('site_description'),
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
            'index' => Pages\ListHeaderWidgets::route('/'),
            'create' => Pages\CreateHeaderWidget::route('/create'),
            'edit' => Pages\EditHeaderWidget::route('/{record}/edit'),
        ];
    }
}
