<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SongDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SongRequest;
use App\Models\Song;
use App\Repositories\Backend\Impls\SongRepositoryImpI;
use App\Repositories\Backend\Interf\BoxRepository;
use App\Repositories\Backend\Interf\SongRepository;
use App\Repositories\Backend\Interf\SubscriberRepository;

class SongsController extends Controller
{
    private BoxRepository $boxRepository;
    private SongRepository $repository;
    private SubscriberRepository $subscriberRepository;
    public function __construct(SubscriberRepository $subscriberRepository , BoxRepository $boxRepository, SongRepositoryImpI $repository){
        $this->repository = $repository;
        $this->subscriberRepository = $subscriberRepository;
        $this->boxRepository = $boxRepository;
        $this->middleware('permission:song.view', ['only' => ['index']]);
        $this->middleware('permission:song.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:song.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:song.delete', ['only' => ['destroy']]);
    }

    public function index(SongDataTable $dataTable){
        return $this->repository->DataTable($dataTable);
    }
    public function create( ){
        $subscribers = $this->subscriberRepository->getAll();
        $boxes = $this->boxRepository->getAll();
        return view('backend.song.create', compact('subscribers', 'boxes'));
    }
    public function store(SongRequest $request){
      $this->repository->create($request);
        return redirect()
            ->route('backend.song.index')
            ->with(['success' => 'New Song   Created!']);
    }
    public function edit($id){
        $song = $this->repository->getById($id);
        if ($song) {
            $subscribers = $this->subscriberRepository->getAll();
            $boxes = $this->boxRepository->getAll();
            return view('backend.song.edit', compact('boxes', 'subscribers', 'song'));
        }
        return redirect('404');
    }
    public function update(Request $request){
        $song = Song::with('box', 'subscriber')->where('id', $request->id)->first();
        if($song){
            $this->repository->update($song, $request->all());
            return redirect()->route('backend.song.index')->with(['success' => 'Successfully Updated!']);
        }
    }
    public function show($id){
        $this->repository->delete($id);
        return redirect()->route('backend.song.index')->with(['success' => 'Successfully Deleted!']);
    }
    public function destroy(Request $request,$id){
        $this->repository->delete($request->id);
        return redirect()->route('backend.song.index')->with(['success' => 'Successfully Deleted!']);
    }

}
