<?php

namespace App\Repositories\Backend\Interf;

use App\DataTables\SubscriberDataTable;
use App\Http\Requests\SubscriberRequest;
use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Collection;

interface  SubscriberRepository
{
    public function getAll();
    public function create(SubscriberRequest $request);
    public function update(Subscriber $subscriber,$data);
    public function getById($id);
    public function delete(int $id);
    public function DataTable(SubscriberDataTable $dataTable);
}
