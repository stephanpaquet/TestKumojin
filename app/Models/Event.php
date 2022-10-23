<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'dateBegin', 'dateEnd', 'timezone'];

    /**
     * Adjust the event date according to its timezone
     * @param $value
     * @return string
     */
    public function getDateBeginLocalAttribute($value): string
    {
        return Carbon::createFromDate($this->dateBegin)
            ->addHour($this->timezone)
            ->toDateTimeString();
    }

    /**
     * @param $value
     * @return void
     */
    public function setDateBeginAttribute($value): void
    {
        $this->attributes['dateBegin'] = self::GetDate($value);
    }

    /**
     * @param $value
     * @return string
     */
    public function getDateEndLocalAttribute($value): string
    {
        return Carbon::createFromDate($this->dateEnd)
            ->addHour($this->timezone)
            ->toDateTimeString();
    }

    /**
     * @param $value
     * @return void
     */
    public function setDateEndAttribute($value): void
    {
        $this->attributes['dateEnd'] = self::GetDate($value);

    }

    protected static function GetDate($value)
    {
        if (strpos($value, 'T') !== false) {
            list($date) = explode('T', $value);
            return $date;
        } else {
            return $value;
        }
    }
}
