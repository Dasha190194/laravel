<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Zofe\Rapyd\DataGrid\DataGrid;
use Zofe\Rapyd\DataSet;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $set = DataSet::source([['id' => 1234, 'name' => 'alla']])->paginate(10)->getSet();
        $grid = DataGrid::source([['id' => 1234, 'name' => 'alla']]);

        $grid->add('id','Title', true)->style("width:100px");
        $grid->add('name','Body')->attributes(["class"=>"custom_column"]);  //field name, label, sortable
        $grid->paginate(10); //pagination


        return view('home', compact('grid'));
    }
}
