<?php

namespace App\DataTables;

use App\Models\Box;
use Yajra\DataTables\Html\Button;
use App\Models\Subscriber;
use Yajra\DataTables\Services\DataTable;

class BoxDataTable extends DataTable
{

    public function dataTable($query)
    {
        $user = auth()->user();
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function ($query) use ($user) {
                $edit_route = route('backend.box.edit', $query->id);
                $delete_rote = route('backend.box.destroy', $query->id);
                $actionBtn = '<div class="d-flex align-self-center">';
                if ($user->can('box.edit')) {
                    $actionBtn .= '<a class="btn btn-outline-info btn-sm mr-3" href="' . $edit_route . '"> <span class="sr-only">Copy</span> <i class="fa fa-edit"></i>
                            </a>';
                }
                    if ($user->can('box.delete')) {
                        $actionBtn .= '<a class="btn btn-outline-danger btn-sm delete-btn" href=" ' .  $delete_rote . ' "> <span class="sr-only">Delete</span> <i class="fa fa-trash"></i>
                                </a>';
                    }
                $actionBtn .= '</div>';
                return $actionBtn;
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ Box $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Box $model)
    {
        return Box::with('subscriber');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->parameters([
                        'responsive' => true,
                        'defaultContent' => '',
                    ])
                    ->setTableId('boxs-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create')->action("window.location = '".route('backend.box.create')."';"),
                        
                    );
    }


    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['name'=>'DT_RowIndex','title'=>'No','data'=>"DT_RowIndex"],
            'name',
            'subscriber.name',
            'prayerzone',
            'action'
        ];
    }
    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Box_' . date('YmdHis');
    }
}
