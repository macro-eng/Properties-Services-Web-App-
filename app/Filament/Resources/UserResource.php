<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facade\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationLabel='المستخدمين';
    protected static ?string $navigationGroup='المستخدمين';

    // protected static  bool $shouldRegisterNavigation=false;
    protected static ?string $navigationIcon = 'heroicon-s-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 TextInput::make('name')
                    ->label('الاسم')
                    ->required()
                    ->maxLength(255),
                Select::make("role")
                ->options([
                    "owner"=>"مالك العقار",
                    "tanant"=>"مستاجر",
                    "visitor"=>"زائر",
                    'admin'=>'administrator',
                ])
                ->label('نوع المستخدم')
                ->required()
                ->native(false),
                TextInput::make('email')
                    ->label('البريد الالكتروني')
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make("password")
                ->password()
                ->dehydrateStateUsing(fn(string $state):string=> Hash::make($state))
                ->label('كلمة السر')
                ->required(),
                Select::make('role')
                       ->multiple()
                       ->relationship('role','name')
                       ->editOptionForm([
                        TextInput::make("name")
                        ->required(),
                        
                       ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("name")
                ->label("الاسم") ,
                TextColumn::make("role")
                ->label("الدور")  ,
                TextColumn::make("role.name")
                ->label("اسم الدور")
                
                
                
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
