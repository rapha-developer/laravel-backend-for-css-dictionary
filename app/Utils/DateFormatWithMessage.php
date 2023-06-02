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
    public const NO_DIFFERENCE = 0;
    public const ONE = 1;

    public function __construct($created_at)
    {
        $this->now = Carbon::parse(Carbon::now());
        $this->dateStored = Carbon::parse($created_at);
        
        $this->checkIfIsToday();
        $this->checkIfIsYesterday();
        $this->run();
    }

    /**
     *  Check if date of user is today
     *  @return void
     */
    protected function checkIfIsToday() {
        if ($this->dateStored->isToday()) {
            $this->message = 'today';
            return ;
        }
    }
    
    /**
     *  Check if date of user is yesterday
     *  @return void
     */
    protected function checkIfIsYesterday() {
        if ($this->dateStored->isYesterday()) {
            $this->message = 'yesterday';
            return ;
        }
    }

    /**
     *  Run main function to determine how many days, weeks, months, years ago is this date
     *  @return void
     */
    protected function run() {
        $this->fillPastTimesVariables();
        $this->generateAllPastTimesMessages();
        $this->setMessageWithCustomValidDateMessage();
    }

    /**
     *  Fill {pastDays, pastWeeks, pastMonths, pastYears}
     *  @return void
     */
    protected function fillPastTimesVariables() 
    {
        $this->pastDays   = $this->now->diffInDays($this->dateStored);
        $this->pastWeeks  = $this->now->diffInWeeks($this->dateStored);
        $this->pastMonths = $this->now->diffInMonths($this->dateStored);
        $this->pastYears  = $this->now->diffInYears($this->dateStored);
    }

    /**
     *  Generate all custom messages for different time frames. 
     *  @return Array
     */
    protected function generateAllPastTimesMessages() {
        return [
            'past_days' => [
                'amount' => $this->pastDays,
                'message' => ($this->pastDays === static::ONE) ? ' day ago' : ' days ago'
            ],
            'past_weeks' => [
                'amount' => $this->pastWeeks,
                'message' => ($this->pastWeeks === static::ONE) ? ' week ago' : ' weeks ago'
            ],
            'past_months' => [
                'amount' => $this->pastMonths,
                'message' => ($this->pastMonths === static::ONE) ? ' month ago' : ' months ago'
            ],
            'past_years' => [
                'amount' => $this->pastYears,
                'message' => ($this->pastYears === static::ONE) ? ' year ago' : ' years ago'
            ]
        ];
    }

    /**
     *  Set Message with custom valid date Message.
     *  @return void
     */
    protected function setMessageWithCustomValidDateMessage() {
        $allPastTimes = $this->generateAllPastTimesMessages();
        foreach ($allPastTimes as $pastName => $pastTime) {
            if($pastTime['amount'] !== static::NO_DIFFERENCE) {
                $this->message = $pastTime['amount'] . $pastTime['message'];
            }
        }
    }
}