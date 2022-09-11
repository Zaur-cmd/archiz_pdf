<?php

namespace App\Traits;

trait UserTrait
{

    /**
     * Присвоить рабочее время  мастеру сраза после регистрация.
     */
    public function setWorkingHoursAttribute($working_hours)
    {
        if ($working_hours != null) {
            $this->attributes['working_hours'] =  json_encode([
                ['Monday' => 'Понедельник', 'start' => $working_hours['start'], 'end' => $working_hours['end']],
                ['Tuesday' => 'Вторник', 'start' => $working_hours['start'], 'end' => $working_hours['end']],
                ['Wednesday' => 'Среда', 'start' => $working_hours['start'], 'end' => $working_hours['end']],
                ['Thursday' => 'Четверг', 'start' => $working_hours['start'], 'end' => $working_hours['end']],
                ['Friday' => 'Пятница', 'start' => $working_hours['start'], 'end' => $working_hours['end']],
                ['Monday' => 'Суббота', 'start' => $working_hours['start'], 'end' => $working_hours['end']],
                ['Saturday' => 'Saturday', 'start' => $working_hours['start'], 'end' => $working_hours['end']],
                ['Sunday' => 'Воскресенье', 'start' => $working_hours['start'], 'end' => $working_hours['end']],
                ['lunch_break' => 'Обеденный перерыв', 'start' => '12:00', 'end' => '13:00']
            ]);
        } else {
            $this->attributes['working_hours'] = null;
        }
    }


    /**
     * Присвоить парол пользователю.
     */
    public function setPasswordAttribute($password)
    {
        if ($password != null) {
            $this->attributes['password'] = bcrypt($password);
        }
    }

    /**
     * Диапазон запроса, включающий только мастеров.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMaster($query)
    {
        return $query->whereType(1);
    }



}
