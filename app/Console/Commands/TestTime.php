<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TestTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testtime';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
//        DB::connection()->enableQueryLog();
//        DB::table('users')->where('id', 1)->update(['name'=> '444']);
//        $log = DB::getQueryLog();
//        Log::info($log);

        $monolog = Log::getMonolog();
        $monolog->popHandler();
        Log::useDailyFiles(storage_path().'/logs/info.log', 30);
        Log::info('每分钟输出一次当前的日期时间到日志当中'.date('Y-m-d H:i:s'));
    }
}
