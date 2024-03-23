<?php

namespace App\Repositories\Backend\Impls;

use App\DataTables\BoxDataTable;
use App\DataTables\SongDataTable;
use App\DataTables\SubscriberDataTable;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\BoxRequest;
use App\Http\Requests\SongRequest;
use App\Http\Requests\SubscriberRequest;
use App\Models\Admin;
use App\Models\Box;
use App\Models\Song;
use App\Repositories\Backend\Interf\SongRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class SongRepositoryImpI implements SongRepository
{
    public function getAll()
    {
        return Song::get();
    }

    public function create(SongRequest $request)
    {
        $song = Song::create($request->all());
        return $song;
    }

    public function update(Song $song,  $data)
    {
      $data =   $song->update($data);
        return $song->fresh();
    }

    public function getById($id)
    {
        return Song::with('box', 'subscriber')->where('id', $id)->first();
    }

    public function delete(int $id)
    {
        Song::destroy($id);
    }

    public function DataTable(SongDataTable $dataTable)
    {
        view()->share(['datatable' => true]);
        return $dataTable->render('backend.song.index');
    }
}
