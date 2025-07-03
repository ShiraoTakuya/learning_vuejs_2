<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

class CommonController extends Controller
{
    public function csv_to_array($csvPath){
      $csvData = array_map('str_getcsv', file($csvPath));
      $headers = array_shift($csvData);
      $jsonData = array_map(function($row) use ($headers) {
          return array_combine($headers, $row);
      }, $csvData);

      return $jsonData;
    }

    public function form1(){
      $errors = [];
      foreach (request()->all() as $key => $item) {
          $errors[$key] = "error: " . $key;
      }
      return redirect()->back()->withInput()->withErrors($errors);      
    }
    
    public function page1(){
      $csvPath = resource_path('form/register.csv');
      $registerFormData = $this->csv_to_array($csvPath);
      
      $data = [
          'formRoute' => route('form1'),
          'initialData' => $registerFormData,
          'old' => session()->getOldInput(),
          'errors' => session('errors') ? session('errors')->getMessages() : [],
      ];

      return Inertia::render('Page1', ['data' => $data]);
    }
    
    public function page2(){
      return Inertia::render('Page2');
    }
}