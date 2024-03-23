<?php

namespace App\Repositories\Backend\Impls;

use App\DataTables\BoxDataTable;
use App\DataTables\SubscriberDataTable;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\BoxRequest;
use App\Http\Requests\SubscriberRequest;
use App\Models\Admin;
use App\Models\Box;
use App\Models\Subscriber;
use App\Repositories\Backend\Interf\BoxRepository;
use App\Repositories\Backend\Interf\SubscriberRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class BoxRepositoryImpI implements BoxRepository
{
    public function getAll()
    {
        return Box::get();
    }

    public function create(BoxRequest $request)
    {
        $box = Box::create($request->all());
        return $box;
    }

    public function update(Box $box, $data)
    {
        $box->update($data);
        return $box;
    }

    public function getById($id)
    {
        return Box::where('id', $id)->first();
    }

    public function delete(int $id)
    {
        Box::destroy($id);
    }

    public function DataTable(BoxDataTable $dataTable)
    {
        view()->share(['datatable' => true]);
        return $dataTable->render('backend.box.index');
    }
}
