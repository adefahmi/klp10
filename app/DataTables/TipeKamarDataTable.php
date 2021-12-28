<?php

namespace App\DataTables;

use App\Models\TipeKamar;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TipeKamarDataTable extends DataTable
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
            ->addIndexColumn()
            ->addColumn('action', function (TipeKamar $tipekamar) {
                $aksi = view('components.table_action')->with([
                    'data' => $tipekamar->nama,
                    'action' => route('tipekamar.destroy', $tipekamar->id), // for delete
                    'route' => route('tipekamar.edit', $tipekamar->id), // for edit
                ]);

                return $aksi;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TipeKamar $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TipeKamar $model)
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
                    ->setTableId('tipekamar-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->dom('Bfrtip')
                    ->orderBy(1)
                    ->parameters([
                        'responsive' => true,
                        'autoWidth' => false,
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex')
                    ->title('#')
                    ->width(50)
                    ->searchable(false)
                    ->orderable(false),
            Column::make('nama'),
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
        return 'TipeKamar_' . date('YmdHis');
    }
}
