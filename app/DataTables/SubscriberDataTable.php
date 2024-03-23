<?php

namespace App\DataTables;
use Yajra\DataTables\Html\Button;
use App\Models\Subscriber;
use Yajra\DataTables\Services\DataTable;

class SubscriberDataTable extends DataTable
{

    public function dataTable($query)
    {
        $user = auth()->user();
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function ($query) use ($user) {
                $edit_route = route('backend.subscriber.edit', $query->id);
                $delete_rote = route('backend.subscriber.destroy', $query->id);
                $actionBtn = '<div class="d-flex align-self-center">';
                if ($user->can('subscriber.edit')) {
                    $actionBtn .= '<a class="btn btn-outline-info btn-sm mr-3" href="' . $edit_route . '"> <span class="sr-only">Copy</span> <i class="fa fa-edit"></i>
                            </a>';
                }
                    if ($user->can('subscriber.delete')) {
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
     * @param \App\Models\Subscriber $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Subscriber $model)
    {
        return $model->newQuery();
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
                    ->setTableId('subscribers-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create')->action("window.location = '".route('backend.subscriber.create')."';"),
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
        return 'Subscribers_' . date('YmdHis');
    }
}
