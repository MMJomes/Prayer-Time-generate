<?php

namespace App\Repositories\Backend\Impls;

use App\DataTables\SubscriberDataTable;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\SubscriberRequest;
use App\Models\Admin;
use App\Models\Subscriber;
use App\Repositories\Backend\Interf\SubscriberRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class SubscriberRepositoryImpl implements SubscriberRepository
{
    public function getAll()
    {
        return Subscriber::get();
    }

    public function create(SubscriberRequest $request)
    {
        $subscriber = Subscriber::create($request->all());
        return $subscriber;
    }

    public function update(Subscriber $subscriber, $data)
    {
        $subscriber->update($data);
        return $subscriber;
    }

    public function getById($id)
    {
        return Subscriber::where('id', $id)->first();
    }

    public function delete(int $id)
    {
        Subscriber::destroy($id);
    }

    public function DataTable(SubscriberDataTable $dataTable)
    {
        view()->share(['datatable' => true]);
        return $dataTable->render('backend.subscriber.index');
    }
}
