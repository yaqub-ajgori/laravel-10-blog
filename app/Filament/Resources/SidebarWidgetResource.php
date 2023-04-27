<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SidebarWidgetResource\Pages;
use App\Filament\Resources\SidebarWidgetResource\RelationManagers;
use App\Models\SidebarWidget;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SidebarWidgetResource extends Resource
{
    protected static ?string $model = SidebarWidget::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Widgets';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('key')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('content')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image'),
                Forms\Components\TextInput::make('btn_text')
                    ->maxLength(255),
                Forms\Components\TextInput::make('btn_link')
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_active'),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
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
            'index' => Pages\ListSidebarWidgets::route('/'),
            'create' => Pages\CreateSidebarWidget::route('/create'),
            'edit' => Pages\EditSidebarWidget::route('/{record}/edit'),
        ];
    }
}
