<?php

namespace App\DataTables;

use App\Models\TYpertitle;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TYpertitleDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<TYpertitle> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                return '<a href="' . route('admin.Typertitle.edit', $query->id) . '" class="btn btn-primary"><i class="fas fa-edit"></i></a>  <a href="' . route('admin.Typertitle.destroy', $query->id) . '" class="btn btn-danger delete-item"><i class="fas fa-trash"></i></a>';
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<TYpertitle>
     */
    public function query(TYpertitle $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('typertitle-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([])
            ->parameters([
                'columnDefs' => [
                    [
                        'className' => 'text-left',
                        'targets' => [0, 1, 2],    // columns: Id, Title, Action
                    ],
                    [
                        'width' => '60px',      // 👈ID column width
                        'targets' => 0,         // first column (Id)
                    ],
                ],
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('title'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'TYpertitle_' . date('YmdHis');
    }
}
