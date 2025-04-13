<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BorrowedBookResource\Pages;
use App\Filament\Resources\BorrowedBookResource\RelationManagers;
use App\Models\BorrowedBook;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BorrowedBookResource extends Resource
{
    protected static ?string $model = BorrowedBook::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('book_id')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('borrowed_at')
                    ->required(),
                Forms\Components\DatePicker::make('due_date')
                    ->required(),
                Forms\Components\DatePicker::make('returned_at'),
                Forms\Components\TextInput::make('fine')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(20)
                    ->default('borrowed'),
                Forms\Components\TextInput::make('condition')
                    ->required()
                    ->maxLength(20)
                    ->default('good'),
                Forms\Components\Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('book_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('borrowed_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('due_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('returned_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fine')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('condition')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListBorrowedBooks::route('/'),
            'create' => Pages\CreateBorrowedBook::route('/create'),
            'view' => Pages\ViewBorrowedBook::route('/{record}'),
            'edit' => Pages\EditBorrowedBook::route('/{record}/edit'),
        ];
    }
}
