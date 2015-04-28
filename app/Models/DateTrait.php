<?php
/**
 * Created by IntelliJ IDEA.
 * User: den
 * Date: 28.04.15
 * Time: 16:30
 */

namespace App\Models;


use Illuminate\Database\Query\Builder;

trait DateTrait {
    public function scopeAtDate($query,$date){
        if( !$date ){
            return $query;
        }
        return $query->whereDate('created_at','=',$date);
    }
    public function scopeToday($query){
        $date = date('Y-m-d');
        return $this->scopeAtDate($query,$date);
    }
}