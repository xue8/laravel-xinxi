<?php
	
namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Model\Que_Column;
use App\Model\Que_Question;

class ColumnController extends Controller
{
	#顶级栏目展示
	public function column($cname){
		$column = Que_Column::where('cname', $cname)->get()->first();
		$column_list = Que_Column::where('sid', $column->id)->get();
		$column_list = $column_list->pluck('id');
		$questions = Que_Question::whereIn('cnid', $column_list)->orderBy('id','desc')->paginate(20);
		$data = ['question'=>$questions, "column"=>$column];
		return view('question.column')->with('data', $data);
	}
	#二级栏目展示
	public function column_erji($column_erji){
		$column = Que_Column::where('cname', $column_erji)->get()->first();
		$questions = Que_Question::where('cnid', $column->id)->orderBy('id','desc')->paginate(20);
		$data = ['question'=>$questions, "column"=>$column];
		return view('question.column')->with('data', $data);
	}	
}
