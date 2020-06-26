<?php

class HomeController
{
    public function index()
    {
        $data = 'NewCo';
        return view('home/index', compact('data'));
    }
    
}