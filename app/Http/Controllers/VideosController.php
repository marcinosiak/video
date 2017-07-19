<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Requests\CreateVideoRequest;
use App\Video;
use Auth;

class VideosController extends Controller
{
  
  public function __construct()
  {
    $this->middleware('auth', ['only' => 'create']);
    //$this->middleware('auth', ['except' => 'index']);
  }

  /**
   * Wyświetlam listę wszystkich filmow
   * @return $videos [type] [description]
   */
  public function index()
  {
    $videos = Video::latest()->get();
    return view('videos.index')->with('videos', $videos);
  }

  /**
   * Wyświetlenie jednego filmu
   */
   public function show($id)
   {
     $video = Video::findOrFail($id);
     return view('videos.show')->with('video', $video);
   }

   /**
    * Wyświetla formularz dodawania nowego filmu
    */
   public function create()
   {
     return view('videos.create');
   }

   /**
    * zapisuje nowy film do bazy danych
    */
    //public function store()
    public function store(CreateVideoRequest $request)
    {
      // Obiekt klasy Request przechowuje wszystkie pola z formularza
      //$input = Request::all();
      //Video::create($input);

      // aby walidacja formularza działała
      //Video::create($request->all());
      $video = new Video($request->all());

      Auth::user()->video()->save($video);
      //Session::flash('video_created', 'Twoj film został dodany');
      return redirect('videos');
    }

    /**
     * Formularz edycji instniejącego rekordu
     */
    public function edit($id)
    {
      $video = Video::findOrFail($id);
      return view('videos.edit')->with('video', $video);
    }

    /**
     * Aktualizuje rekord w bazie
     * int $id - identyfikator filmu
     * CreateVideoRequest $request - przechowuje pola formularza w ktroym edytujemy zmiany
     */
    public function update($id, CreateVideoRequest $request)
    {
       $video = Video::findOrFail($id);
       $video->update($request->all());
       return redirect('videos');
    }

}
