<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketsResource\Pages;
use App\Filament\Resources\TicketsResource\RelationManagers;
use App\Models\Tickets;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TicketsResource extends Resource
{
    protected static ?string $model = Tickets::class;

	protected static ?string $navigationGroup = 'Soporte';
    protected static ?string $navigationIcon = 'heroicon-o-ticket';
	protected static ?string $navigationLabel = 'Tickets';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->label('Título del Ticket')
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->label('Descripción del Ticket')
                    ->maxLength(255),
                Forms\Components\TextInput::make('reporting_user_name')
                    ->required()
                    ->label('Nombre del usuario que reporta')
                    ->maxLength(255),
                Select::make('user_id')
                    ->label('Usuario que lo atiende')
                    ->relationship(name: 'user', titleAttribute: 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('department_id')
                    ->label('Departamento donde surge la incidencia')
                    ->relationship(name: 'department', titleAttribute: 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('ticket_type_id')
                    ->label('Departamento donde surge la incidencia')
                    ->relationship(name: 'ticket_type', titleAttribute: 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('ticket_status_id')
                    ->label('Estado de ingreso del ticket')
                    ->relationship(name: 'ticket_status', titleAttribute: 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Descripción')
                    ->searchable(),
                Tables\Columns\TextColumn::make('reporting_user_name')
                    ->label('Usuario que reporta')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Usuario que atiende')
                    ->searchable(),
                Tables\Columns\TextColumn::make('department.name')
                    ->label('Departamento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ticket_type.name')
                    ->label('Tipo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ticket_status.name')
                    ->label('Estado')
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
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
            'index' => Pages\ListTickets::route('/'),
            'create' => Pages\CreateTickets::route('/create'),
            'view' => Pages\ViewTickets::route('/{record}'),
            'edit' => Pages\EditTickets::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
