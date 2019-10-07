<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'drawings_or_paye',
        'is_more_than_three_years',
        'years_in_business',
        'work_type',
        'number_of_staff',
        'on_tools',
        'other_not_on_tools',
        'income',
        'payment_frequency',
        'acc_cover_plan',
        'cover_plus_extra_cover_amount'
    ];
}
