<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    function index(){
    	$title = "Index Page";
    	return view('pages.index',['title'=>$title]);
    }

    function about(){
    	$title = "About Page";
    	return view('pages.about',compact('title'));
    }

    function services(){
    	// $title = "Services Page";

    	$data = array(
    		'title'=>'Services Page',
    		'services'=> array('Web Design','Programming','SEO')
    	);
    	return view('pages.services')->with($data);
    }

    
}
