<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Movie;
use Carbon\Carbon;
use App\Http\Requests\MovieRequest;
use Intervention\Image\ImageManager;
use Input;
use Image;
use Request;
use File;

class MoviesController extends Controller {


    #Home page
	public function index()
    {
        #Display latest first
        $movies = Movie::latest()->get();

        return view('index', compact('movies'));
    }

    #Create Movie
    public function create()
    {
        return view('create');
    }

    #Store movie data into a database
    public function store(MovieRequest $request)
    {
        $movie = new Movie(array(
            'name' => $request->get('name'),
            'year'  => $request->get('year'),
            'description'  => $request->get('description')
        ));

        $destinationPath = 'images';
        $file = Input::file('image');
        if(!empty($file))
        {
            $temp = explode(".", $file->getClientOriginalName());
            $filename = current($temp) . round(microtime(true)) . '.' . end($temp);
            Image::make($file->getRealPath())->resize(800, 600)->save($destinationPath . $filename);
            $movie->filePath = $filename;
            $file->move($destinationPath, $filename);
        } else {
            $movie->filePath = 'No image';
        }

        $movie->save();

        return redirect('home')->with('message', 'Movie Created');

    }

    #Display Movie
    public function show($id)
    {
        $movie = Movie::findOrFail($id);

        return view('show', compact('movie'));
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);

        return view('edit', compact('movie'));
    }

    public function update(MovieRequest $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update(Request::all());

        $destinationPath = 'images';
        $file = Input::file('image');
        if(!empty($file))
        {
            $temp = explode(".", $file->getClientOriginalName());
            $filename = current($temp) . round(microtime(true)) . '.' . end($temp);
            $movie->filePath = $filename;
            $file->move($destinationPath, $filename);
        }

        $movie->save();

        return redirect('home')->with('message', 'Your changes are saved!');

    }

    public function destroy($id)
    {
        $deleteMovie = Movie::findOrFail($id);

        File::delete(public_path('images/' . $deleteMovie->filePath));

        $deleteMovie->destroy($id);

        return redirect('home')->with('message', 'Movie is succefully deleted!');
    }

}
