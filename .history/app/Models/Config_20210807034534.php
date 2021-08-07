<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $table = 'config';

    protected $fillable = [
        'key',
        'value'
    ];

    /**
     * Toggle Dummy Ticket Testing.
     *
     * @return void
     */
    public static function toggleDummyTicketTest()
    {
        $configSetting = (new self)->newQuery()->where('key', '=', 'DUMMY_TICKET_TEST')->firstOrCreate([
            'key' => 'DUMMY_TICKET_TEST'
        ],
        [
            'key' => 'DUMMY_TICKET_TEST',
            'value' => true
        ]);

        if(!$configSetting->wasRecentlyCreated){
            $configSetting->value = !$configSetting->value;
            $configSetting->save();
        }
    }

    /**
     * Return value of Dummy Ticket Testing.
     * 
     * @return mixed
     */
    public static function isActiveDummyTicketTest()
    {
        $configSetting = (new self)->newQuery()->where('key', '=', 'DUMMY_TICKET_TEST')->firstOrCreate([
            'key' => 'DUMMY_TICKET_TEST'
        ],
        [
            'key' => 'DUMMY_TICKET_TEST',
            'value' => true
        ]);

        return $configSetting->value;
    }
}
