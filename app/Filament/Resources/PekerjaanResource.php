<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PekerjaanResource\Pages;
use App\Filament\Resources\PekerjaanResource\RelationManagers;
use App\Models\Departmen;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Pekerjaan;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PekerjaanResource extends Resource
{
    protected static ?string $model = Pekerjaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Select::make('pegawai_id')
                    ->label('Pegawai')
                    ->required()
                    ->options(Pegawai::all()->pluck('nama', 'id')),
                Select::make('departmen_id')
                    ->label('Departmen')
                    ->required()
                    ->options(Departmen::all()->pluck('nama_departmen', 'id')),
                Select::make('jabatan_id')
                    ->label('Jabatan')
                    ->required()
                    ->options(Jabatan::all()->pluck('nama_jabatan', 'id')),
                DatePicker::make('tanggal_mulai')
                    ->label('Tanggal Mulai')
                    ->required(),
                DatePicker::make('tanggal_selesai')
                    ->label('Tanggal Selesai')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('pegawai_id'),
                TextColumn::make('departmen_id'),
                TextColumn::make('jabatan_id'),
                TextColumn::make('tanggal_mulai'),
                TextColumn::make('tanggal_selesai'),
            ])
            ->filters([
                //
                SelectFilter::make('sort')
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
            'index' => Pages\ListPekerjaans::route('/'),
            'create' => Pages\CreatePekerjaan::route('/create'),
            'edit' => Pages\EditPekerjaan::route('/{record}/edit'),
        ];
    }
}
