<?php
	
namespace App\Http\Controllers\Zhuanlan;

use App\Http\Controllers\Controller;
use App\Model\Que_Column;
use App\Model\Que_Question;
use App\Model\Api\QueArticle;

class ColumnController extends Controller
{
	#顶级栏目展示
	public function column()
	{
		$cname = 'zhuanlan';
		$column = Que_Column::where('cname', $cname)->get()->first();
		$column_list = Que_Column::where('sid', $column->id)->get();
		$column_list = $column_list->pluck('id');
		$questions = QueArticle::whereIn('cnid', $column_list)->orderBy('id','desc')->paginate(20);
		$data = ['question'=>$questions, "column"=>$column];
		return view('article.column')->with('data', $data);				
	}
	
	#专栏二级栏目展示
	public function column_erji($column_erji)
	{
		$column = Que_Column::where('cname', $column_erji)->get()->first();
		$questions = QueArticle::where('cnid', $column->id)->orderBy('id','desc')->paginate(20);
		$data = ['question'=>$questions, "column"=>$column];
		return view('article.column')->with('data', $data);		
	}
}
