<?php

namespace App\Http\Controllers\Backend;
use App\DataTables\SubscriberDataTable;
use App\Repositories\Backend\Interf\SubscriberRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriberRequest;
use App\Models\Subscriber;

class SubscribersController extends Controller
{

    private SubscriberRepository $repository;
    public function __construct(SubscriberRepository $repository){
        $this->repository = $repository;
        $this->middleware('permission:subscriber.view', ['only' => ['index']]);
        $this->middleware('permission:subscriber.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:subscriber.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:subscriber.delete', ['only' => ['destroy']]);
    }
    public function index(SubscriberDataTable $dataTable){
        return $this->repository->DataTable($dataTable);
    }
    public function create( ){

        return view('backend.subscriber.create');
    }
    public function store(SubscriberRequest $request){

        $this->repository->create($request);

        return redirect()
            ->route('backend.subscriber.index')
            ->with(['success' => 'New Subscriber Created!']);
    }
    public function edit($id){
        $subscriber = $this->repository->getById($id);
        if ($subscriber) {
            return view('backend.subscriber.edit', compact('subscriber'));
        }
        return redirect('404');
    }
    public function update(SubscriberRequest $request, Subscriber $subscriber){
        $this->repository->update($subscriber, $request->validated());
        return redirect()->route('backend.subscriber.index')->with(['success' => 'Successfully Updated!']);

    }
    public function show($id){
        $this->repository->delete($id);
        return redirect()->route('backend.subscriber.index')->with(['success' => 'Successfully Deleted!']);
    }
    public function destroy(Request $request,$id){
        $this->repository->delete($request->id);
        return redirect()->route('backend.subscriber.index')->with(['success' => 'Successfully Deleted!']);
    }
}
