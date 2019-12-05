<?php

namespace Manhle\CategoryPackage\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Manhle\CategoryPackage\Models\Category;

class CategoryDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('name', 'backs.pages.category.name')
            ->addColumn('description', 'backs.pages.category.description')
            ->addColumn('slug', 'backs.pages.category.slug')
            ->addColumn('action', 'backs.pages.category.actions')
            ->rawColumns(['name', 'description', 'slug', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\CategoryDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Category $model)
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
            ->setTableId('user-dt')
            ->addTableClass('table table-hover table-bordered table-striped')
            ->stateSave(true)
            ->columns($this->getColumns())
            ->responsive(false)
            // ->select(['style' => 'os', 'items' => 'row'])
            ->minifiedAjax()
            ->lengthMenu([20, 50, 100, 200])
            ->pageLength(100)
            ->orderBy(0)
            ->domBs4()
            ->buttons(
            // Button::make('create'),
                Button::make('pageLength'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
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
            Column::make('id'),
            Column::computed('name')
                ->exportable(false)
                ->printable(false)
                ->width(300)
                ->addClass('text-center'),
            Column::computed('description')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
            Column::computed('slug')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Category_' . date('YmdHis');
    }
}
