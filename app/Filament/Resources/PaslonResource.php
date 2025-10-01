<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaslonResource\Pages;
use App\Filament\Resources\PaslonResource\RelationManagers;
use App\Models\Paslon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaslonResource extends Resource
{
    protected static ?string $model = Paslon::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nipd1')
                    ->required()
                    ->maxLength(4),
                Forms\Components\TextInput::make('nisn1')
                    ->required()
                    ->maxLength(10),
                Forms\Components\TextInput::make('nama1')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jk1')
                    ->required()
                    ->maxLength(1),
                Forms\Components\TextInput::make('tmpt_lahir1')
                    ->required()
                    ->maxLength(100),
                Forms\Components\DatePicker::make('tgl_lahir1')
                    ->required(),
                Forms\Components\TextInput::make('agama1')
                    ->required()
                    ->maxLength(100)
                    ->default('Islam'),
                Forms\Components\TextInput::make('nipd2')
                    ->required()
                    ->maxLength(4),
                Forms\Components\TextInput::make('nisn2')
                    ->required()
                    ->maxLength(10),
                Forms\Components\TextInput::make('nama2')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jk2')
                    ->required()
                    ->maxLength(1),
                Forms\Components\TextInput::make('tmpt_lahir2')
                    ->required()
                    ->maxLength(100),
                Forms\Components\DatePicker::make('tgl_lahir2')
                    ->required(),
                Forms\Components\TextInput::make('agama2')
                    ->required()
                    ->maxLength(100)
                    ->default('Islam'),
                Forms\Components\TextInput::make('foto')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slogan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_urut')
                    ->maxLength(1)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama1')->label('Calon Ketua')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama2')->label('Calon Wakil')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slogan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_urut')
                    ->sortable(),
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
            'index' => Pages\ListPaslons::route('/'),
            'create' => Pages\CreatePaslon::route('/create'),
            'edit' => Pages\EditPaslon::route('/{record}/edit'),
        ];
    }
}
