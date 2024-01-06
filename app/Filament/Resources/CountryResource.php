<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CountryResource\Pages;
use App\Filament\Resources\CountryResource\RelationManagers;
use App\Models\Country;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CountryResource extends Resource
{
    protected static ?string $model = Country::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';
    protected static ?string $navigationLabel='Country';
    protected static?string $modelLabel = 'Country';
    protected static?string $navigationGroup='System Management';
    protected static? int $navigationSort=1;
    //protected static?string $slug='Employees-Countries';


    public static function form(Form $form): Form
    {
        return $form
        ->Schema(
            [
                Forms\Components\Section::make('Country Details')
                ->schema([                //
                    Forms\Components\TextInput::make('name')->required(),
                    
                    Forms\Components\TextInput::make('code')->required(),
                    Forms\Components\TextInput::make('phonecode')->required()
                ])->columns(3)
            ]
            );
           
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                ->searchable()->sortable(),
                Tables\Columns\TextColumn::make('code')
                ->searchable()->sortable(),
                Tables\Columns\TextColumn::make('phonecode')
                ->searchable()->sortable(),
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
            'index' => Pages\ListCountries::route('/'),
            'create' => Pages\CreateCountry::route('/create'),
            'edit' => Pages\EditCountry::route('/{record}/edit'),
        ];
    }
}
