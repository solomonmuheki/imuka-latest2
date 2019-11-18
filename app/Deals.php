<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deals extends Model
{
    //
    protected $table = 'deals';

    protected $fillable = ['companyName', 'companyType','companyIndustry', 'companyAddress', 'companyTel', 'companyEmail','raisedAmount', 'DealDetailedDesc','image'];
}
