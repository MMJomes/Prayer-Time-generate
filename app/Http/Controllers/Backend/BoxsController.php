<?php

namespace App\Http\Controllers\Backend;
use App\DataTables\BoxDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BoxRequest;
use App\Models\Box;
use App\Repositories\Backend\Impls\BoxRepositoryImpI;
use App\Repositories\Backend\Interf\SubscriberRepository;

class BoxsController extends Controller
{

    private BoxRepositoryImpI $repository;
    private SubscriberRepository $subscriberRepository;
    public function __construct(SubscriberRepository $subscriberRepository , BoxRepositoryImpI $repository){
        $this->repository = $repository;
        $this->subscriberRepository = $subscriberRepository;
        $this->middleware('permission:box.view', ['only' => ['index']]);
        $this->middleware('permission:box.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:box.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:box.delete', ['only' => ['destroy']]);
    }

    public function index(BoxDataTable $dataTable){
        return $this->repository->DataTable($dataTable);
    }
    public function create( ){
        $subscribers = $this->subscriberRepository->getAll();
        return view('backend.box.create', compact('subscribers'));
    }
    public function store(BoxRequest $request){

        $this->repository->create($request);
        return redirect()
            ->route('backend.box.index')
            ->with(['success' => 'New Box Created!']);
    }
    public function edit($id){
        $box = $this->repository->getById($id);
        if ($box) {
            $subscribers = $this->subscriberRepository->getAll();
            return view('backend.box.edit', compact('box', 'subscribers'));
        }
        return redirect('404');
    }
    public function update(BoxRequest $request, Box $box){
        $this->repository->update($box, $request->validated());
        return redirect()->route('backend.box.index')->with(['success' => 'Successfully Updated!']);

    }
    public function show($id){
        $this->repository->delete($id);
        return redirect()->route('backend.box.index')->with(['success' => 'Successfully Deleted!']);
    }
    public function destroy(Request $request,$id){
        $this->repository->delete($request->id);
        return redirect()->route('backend.box.index')->with(['success' => 'Successfully Deleted!']);
    }
}
