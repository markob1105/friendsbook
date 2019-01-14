<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Post;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
//use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('photos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * @var UploadedFile
         */

        $file = $request->file('file');

        $name = str_random(10) . '_' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.jpg';
        //dd(pathinfo($name, PATHINFO_FILENAME));
        $thumbnailImage = Image::make($file)->encode('jpg');
        $thumbnailPath = '/upload/thumbnail/' . $name;

        $thumbnailImage->resize(40, 40, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $thumbnailImage->save(public_path($thumbnailPath));


        $mediumImage = Image::make($file)->encode('jpg');
        $mediumPath = '/upload/medium/' . $name;
        $mediumImage->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $mediumImage->save(public_path($mediumPath));


        $largeImage = Image::make($file)->encode('jpg');
        $largePath = '/upload/large/' . $name;
        $largeImage->resize(1920, 1080, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $largeImage->save(public_path($largePath));

        $post = Auth::user()->posts()->create([
           'post_type_id' => 2
        ]);

        // prvi način
        /*$photo = new Photo;
        $photo->thumbnail = $thumbnailPath;
        $photo->medium = $mediumPath;
        $photo->large = $largePath;
        $photo->description = request('description');
        $photo->post_id = $post->id;
        $photo->save();*/

        // drugi način
       /* $photo = Photo::create([
            'thumbnail' => $thumbnailPath,
            'medium' => $mediumPath,
            'large' => $largePath,
            'description' => request('description'),
            'post_id' => $post->id
        ]);*/

        // treći način
        $photo = $post->photo()->create([
            'thumbnail' => $thumbnailPath,
            'medium' => $mediumPath,
            'large' => $largePath,
            'description' => request('description')
        ]);

        /*$post = Post::find(10);

        $photo = $post->photo;*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
