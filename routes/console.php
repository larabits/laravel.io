<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use Spatie\ScheduleMonitor\Models\MonitoredScheduledTaskLogItem;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command('schedule-monitor:sync')->dailyAt('04:56');
Schedule::command('model:prune', ['--model' => MonitoredScheduledTaskLogItem::class])->daily();
Schedule::command('horizon:snapshot')->everyFiveMinutes();
Schedule::command('lio:post-article-to-twitter')->twiceDaily(14, 18);
Schedule::command('lio:generate-sitemap')->daily()->graceTimeInMinutes(25);
Schedule::command('lio:update-article-view-counts')->twiceDaily();
