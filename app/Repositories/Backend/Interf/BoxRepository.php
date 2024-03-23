<?php

namespace App\Repositories\Backend\Interf;

use App\DataTables\BoxDataTable;
use App\Http\Requests\BoxRequest;
use App\Models\Box;

interface  BoxRepository
{
    public function getAll();
    public function create(BoxRequest $request);
    public function update(Box $box,$data);
    public function getById($id);
    public function delete(int $id);
    public function DataTable(BoxDataTable $dataTable);
}
