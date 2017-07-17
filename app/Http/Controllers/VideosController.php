<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Video;

class VideosController extends Controller
{
  /**
   * Wyświetlam listę wszystkich filmow
   * @return $videos [type] [description]
   */
  public function index()
  {
    $videos = Video::latest()->get();
    return view('videos.index')->with('videos', $videos);
  }


}
