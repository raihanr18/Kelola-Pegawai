<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ManajerResource\Pages;
use App\Filament\Resources\ManajerResource\RelationManagers;
use App\Models\Manajer;
use App\Models\Pegawai;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\select;

class ManajerResource extends Resource
{
    protected static ?string $model = Manajer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Select::make('pegawai_id')
                    ->label('Pegawai')
                    ->required()
                    ->disabledOn('edit')
                    ->options(Pegawai::all()->pluck('nama', 'id')),
                DatePicker::make('tanggal_penunjukan')
                    ->label('Tanggal Penunjukan Pegawai')
                    ->required()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('pegawai.nama')
                    ->searchable(),
                TextColumn::make('tanggal_penunjukan')
            ])
            ->filters([
                //
            ])
            ->actions([
                
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
            'index' => Pages\ListManajers::route('/'),
            'create' => Pages\CreateManajer::route('/create'),
        ];
    }
}
