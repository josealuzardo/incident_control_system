<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketStatusesResource\Pages;
use App\Filament\Resources\TicketStatusesResource\RelationManagers;
use App\Models\TicketStatuses;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TicketStatusesResource extends Resource
{
	protected static ?string $model = TicketStatuses::class;

	protected static ?string $navigationGroup = 'Configuración';
	protected static ?string $navigationIcon = 'heroicon-o-list-bullet';
	protected static ?string $navigationLabel = 'Estados de tickets';

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('name')
					->required()
					->label('Nombre')
					->maxLength(255),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('name')
					->searchable(),
			])
			->filters([])
			->actions([
			])
			->bulkActions([
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
			'index' => Pages\ListTicketStatuses::route('/'),
			'create' => Pages\CreateTicketStatuses::route('/create'),
			'view' => Pages\ViewTicketStatuses::route('/{record}'),
			'edit' => Pages\EditTicketStatuses::route('/{record}/edit'),
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
