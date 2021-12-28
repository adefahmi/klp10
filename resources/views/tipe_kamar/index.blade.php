@extends('layout.app')

@section('contents')
<div class="content">
    <div class="card">
        <div class="card-header">
            <h5 class="d-flex justify-content-between align-items-center">
                Tipe Kamar
                <a class="btn btn-primary" href="{{route('tipekamar.create')}}" > Add Data</a>
              </h5>
        </div>
        <div class="card-body pb-20">
            <div class="table-responsive">
                {!! $dataTable->table([
                    'class' => 'table table-striped', true]) !!}
            </div>
        </div>
    </div>
</div>

@endsection

@section('css_before')
<link rel="stylesheet" href="/js/plugins/datatables/dataTables.bootstrap4.css">
<link rel="stylesheet" href="/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="/js/plugins/sweetalert2/sweetalert2.min.css">
@endsection

@section('js_after')
<script src="/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="/js/plugins/datatables/buttons/dataTables.buttons.min.js"></script>
<script src="/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
<script src="/js/plugins/es6-promise/es6-promise.auto.min.js"></script>
<script src="/js/plugins/sweetalert2/sweetalert2.all.min.js"></script>

    {{$dataTable->scripts()}}

    <script>
        jQuery(function(){
            $('table').on('click', '.delete-confirm', function () {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                Swal.fire({
                    title: `Are you sure?`,
                    text: `${name} will be permanantly deleted!`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection

