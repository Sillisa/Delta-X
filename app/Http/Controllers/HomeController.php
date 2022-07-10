<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\Song;
use App\Models\songartistrel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('home');
    }

    public function songlist(Request $request){
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Song::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Song::select('count(*) as allcount')->where('songName', 'like', '%' . $searchValue . '%')->count();

        $records = Song::orderBy($columnName, $columnSortOrder)
            ->where('songName', 'like', '%' . $searchValue . '%')
            ->skip($start)
            ->take($rowperpage)
            ->get();
            $sno=1;
            foreach ($records as $record) {

                $artist=songartistrel::
                        join('artists','songartistrels.artistId', '=', 'artists.id')
                        ->where('songartistrels.songId',$record->id)
                        ->pluck('artists.artistName');

                        
            $img = '<img src="'.asset('storage/media/' . $record->artWork).'" width="100px"/>';
            
            $data_arr[] = array(
                "id" => $sno++,
                "img" => $img,
                "songName" => $record->songName,
                "releaseDate" => date('d-m-Y',strtotime($record->releaseDate)),
                "artist" => $artist,
                "rating" => '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>'
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
    }

    public function addSong(Request $request){
        $output['artist'] = Artist::get();
        return view('songForm',$output);
    }
    public function addSongForm(Request $request){
        $model = new Song();
        $model->songName = $request->post('songName');
        $model->releaseDate = date('Y-m-d',strtotime($request->post('releaseDate')));
        if ($request->hasfile('artWork')) {
            $artWork = $request->file('artWork');
            $artWork_name = time() . rand(1, 100) . '.' . $artWork->extension();
            $artWork->move(public_path('/storage/media'), $artWork_name);
            $model->artWork = $artWork_name; 
        }
        $model->save(); 
        foreach( $request->post('artist') as $item){
            $data= ['songId'=>$model->id,'artistId'=>$item];
            songartistrel::insert($data);
        }
        return redirect('/');
    }
    public function addArtistForm(Request $request){

        $model = new Artist();
        $model->artistName = $request->post('artistName');
        $model->dob = date('Y-m-d',strtotime($request->post('dob')));
        $model->bio = $request->post('bio');

        $model->save();
        return redirect('add-song');
    }

    
}
