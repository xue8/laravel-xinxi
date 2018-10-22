<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Api\Common\WebCommonController;
use App\Model\Api\User;
use App\Model\Que_Question;
use App\Model\Api\QueArticle;
use App\Model\Api\WebBasicInfo;

class webbasicinfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'webbasicinfo:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '定时更新网站基础信息';

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
        //会员总数
		$usernum = User::count();
		//文章总数
		$articlenum = QueArticle::count();	
		//问答总数
		$questionnum = Que_Question::count();			
        
        $web = new WebBasicInfo;
        $web->usernum = $usernum;
        $web->questionnum = $questionnum;
        $web->articlenum = $articlenum;
        $web->save();
    }
}
