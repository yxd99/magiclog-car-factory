<?php
namespace App\DataTables;
 
use App\Models\Car;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
 
class CarsDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($car) {
                return '<td>
                    <a class="btn btn-sm btn-primary" href="'. route("cars.show", $car->id) .'"><i class="fa fa-fw fa-eye"></i></a>
                    <a class="btn btn-sm btn-success" href="'. route("cars.edit", $car->id) .'"><i class="fa fa-fw fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger" href="'. route("cars.destroy", $car->id) .'" data-confirm-delete="true"><i class="fa fa-fw fa-trash"></i></a> 
                </td>';
                
            })
            ->setRowId('id')
            ->rawColumns(['action']);
    }
 
    public function query(Car $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('created_at', 'desc');
    }
 
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('cars-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1);
    }
 
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::computed('brand')->searchable(true)->title('Marca')->addClass('text-center'),
            Column::computed('model')->searchable(true)->title('Modelo')->addClass('text-center'),
            Column::computed('year')->title('Año')->addClass('text-center'),
            Column::computed('color')->title('Color')->addClass('text-center'),
            Column::computed('price')->title('Precio')->addClass('text-center'),
            Column::computed('action')->title('Acciones')->addClass('text-center'),
        ];
    }
 
    protected function filename(): string
    {
        return 'Cars_'.date('YmdHis');
    }
}
