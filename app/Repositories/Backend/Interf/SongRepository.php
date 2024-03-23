<?php

namespace App\Repositories\Backend\Interf;

use App\DataTables\SongDataTable;
use App\Http\Requests\SongRequest;
use App\Models\Song;

interface  SongRepository
{
    public function getAll();
    public function create(SongRequest $request);
    public function update(Song $box,$data);
    public function getById($id);
    public function delete(int $id);
    public function DataTable(SongDataTable $dataTable);
}
