<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Requests\CreateVideoRequest;
use App\Video;
use App\Category;
use Auth;
use Session;
use View;

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
    if(Auth::check())
    {
      $isLogged = "Wyloguj";
      $authPath = "/logout";
    }
    else {
      $isLogged = "Zaloguj";
      $authPath = "/login";
    }

    $videos = Video::latest()->get();
    return view('videos.index')->with('videos', $videos);
    //return View::make('videos.index')->with('videos', $videos);
    //return View::make('videos.index', array('videos' => $videos, 'isLogged' => $isLogged, 'authPath' => $authPath ));
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
     $categories = Category::lists('name', 'id');
     return view('videos.create')->with('categories', $categories);
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

      $categoryIds = $request->input('CategoryList');
      $video->categories()->attach($categoryIds);

      Session::flash('video_created', 'Twój film został dodany');
      return redirect('videos');
    }

    /**
     * Formularz edycji instniejącego rekordu
     */
    public function edit($id)
    {
      $video = Video::findOrFail($id);
      //return view('videos.edit')->with('video', $video);

      $categories = Category::lists('name', 'id');
      return view('videos.edit', compact('video', 'categories'));
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
       $video->categories()->sync($request->input('CategoryList'));
       return redirect('videos');
    }

}
