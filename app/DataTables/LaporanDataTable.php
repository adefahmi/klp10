<?php

namespace App\DataTables;

use App\Models\Booking;
use App\Models\Laporan;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Utilities\Request;

class LaporanDataTable extends DataTable
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
            ->addColumn('kamar', function(Booking $booking) {
                return $booking->bookings->first()->kamars->nama ?? '';
            })
            ->addColumn('tipekamar', function(Booking $booking) {
                return $booking->bookings->first()->kamars->type->nama ?? '';
            })
            ->addColumn('status', function(Booking $booking) {
                return $booking->bookings->first()->status ?? '';
            })
            ->addColumn('tamu', function(Booking $booking) {
                return $booking->tamu->nama ?? '';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Laporan $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Booking $model, Request $request)
    {
        return $model->newQuery()->filter($request->all())->with('bookings.kamars.type', 'tamu');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('laporan-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('export'),
                        Button::make('pageLength'),
                    )
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
            Column::make('kode_booking'),
            Column::make('tanggal_booking'),
            Column::make('total_berbayar'),
            Column::make('total_transaksi'),
            Column::make('kamar'),
            Column::make('tipekamar'),
            Column::make('status'),
            Column::make('tamu'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Laporan_' . date('YmdHis');
    }
}
