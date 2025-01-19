<?php

namespace App\Filament\Resources\CohortResource\RelationManagers;

use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class MentorshipPairsRelationManager extends RelationManager
{
    protected static string $relationship = 'mentorshipPairs';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('mentor_id')
                    ->relationship(
                        'mentor',
                        'users.name',
                        fn (Builder $query) => $query
                            ->join('users', 'mentors.user_id', '=', 'users.id')
                            ->isApproved()
                            ->availableForCohort($this->ownerRecord->id)
                            ->select('users.name', 'mentors.id')
                    )
                    ->required(),
                Select::make('mentee_id')
                    ->relationship(
                        'mentee',
                        'users.name',
                        fn (Builder $query) => $query
                            ->join('users', 'mentees.user_id', '=', 'users.id')
                            ->isApproved()
                            ->availableForCohort($this->ownerRecord->id)
                            ->select('users.name', 'mentees.id')
                    )
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('mentor_id')
            ->columns([
                TextColumn::make('mentor.user.name')
                    ->label('Mentor'),
                TextColumn::make('mentee.user.name')
                    ->label('Mentee'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
