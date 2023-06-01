<?php

namespace App\Utils;

use Carbon\Carbon;

class DateFormatWithMessage {
    
    protected $now;
    protected $dateStored;
    protected int $pastDays;
    protected int $pastWeeks;
    protected int $pastMonths;
    protected int $pastYears;

    public string $message = "";
    public const ANY_DIFFERENCE = 0;

    public function __construct($created_at)
    {
        $this->now = Carbon::parse(Carbon::now());
        $this->dateStored = Carbon::parse($created_at);
        
        if ($this->dateStored->isToday()) {
            $this->message = 'Today';
            return ;
        }
        $this->run();
    }
    protected function run() {
        $this->fillPastTimesVariables();
        $this->generateAllPastTimesMessages();
        $this->removeAllTimesUnnecessary();
    }
    protected function fillPastTimesVariables() 
    {
        $this->pastDays   = $this->now->diffInDays($this->dateStored);
        $this->pastWeeks  = $this->now->diffInWeeks($this->dateStored);
        $this->pastMonths = $this->now->diffInMonths($this->dateStored);
        $this->pastYears  = $this->now->diffInYears($this->dateStored);
    }
    protected function generateAllPastTimesMessages() {
        return [
            'past_days' => [
                'amount' => $this->pastDays,
                'message' => $this->pastDays . ' days ago'
            ],
            'past_weeks' => [
                'amount' => $this->pastWeeks,
                'message' => $this->pastWeeks . ' weeks ago'
            ],
            'past_months' => [
                'amount' => $this->pastMonths,
                'message' => $this->pastMonths . ' months ago'
            ],
            'past_years' => [
                'amount' => $this->pastYears,
                'message' => $this->pastYears . ' years ago'
            ]
        ];
    }
    protected function removeAllTimesUnnecessary() {
        $allPastTimes = $this->generateAllPastTimesMessages();
        foreach ($allPastTimes as $pastName => $pastTime) {;
            if($pastTime['amount'] !== static::ANY_DIFFERENCE) {
                $this->message = $pastTime['message'];
            }
        }
    }
}