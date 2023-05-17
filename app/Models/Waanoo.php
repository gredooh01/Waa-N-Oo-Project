<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Waanoo extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'waanoos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_RADIO = [
        'functional' => 'Functional/Good Condition',
        'broken'     => 'Broken',
        'down'       => 'Down',
    ];

    protected $fillable = [
        'island',
        'no',
        'village',
        'recipient',
        'status',
        'expenditure_per_trip',
        'hire_num',
        'catch_weight',
        'total_catchval',
        'comments',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const ISLAND_SELECT = [
        'makin'      => 'Makin',
        'abemama'    => 'Abemama',
        'aranuka'    => 'Aranuka',
        'arorae'     => 'Arorae',
        'beru'       => 'Beru',
        'butaritari' => 'Butaritari',
        'kuria'      => 'Kuria',
        'maiana'     => 'Maiana',
        'marakei'    => 'Marakei',
        'nikunau'    => 'Nikunau',
        'nonouti'    => 'Nonouti',
        'onotoa'     => 'Onotoa',
        'tab_n'      => 'Tab-North',
        'tab_s'      => 'Tab-South',
        'tamana'     => 'Tamana',
        'trw_s'      => 'Tarawa-South',
        'trw_n'      => 'Tarawa-North',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public static function boot()
    {
        parent::boot();
        self::observe(new \App\Observers\WaanooActionObserver);
    }
}
