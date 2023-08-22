@extends('layouts.aplicacion2')

@section('styles')
@endsection

@section('title')
    <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>Zonas Internacionales</span></li>
@endsection

@section('content')
    <div class="layout-px-spacing">
        <div class=" layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing  d-flex justify-content-center align-items-center">

                <div class="col-9 layout-spacing  ">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>ZONAS INTERNACIONALES</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <form>
                                <div class="form-group mb-4 col-6">
                                    <label for="exampleFormControlInput2">CODIGO</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="">
                                </div>

                                <div class="form-group  m-3 ">
                                    <label for="exampleFormControlTextarea1">ZONAS</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>

                                <input type="submit" name="" value="Nuevo" class="mt-4 mb-4 btn btn-primary">
                                <input type="submit" name="" value="Cambiar" class="mt-4 mb-4 btn btn-primary">
                                <input type="submit" name="" value="Borrar" class="mt-4 mb-4 btn btn-primary">
                                <input type="submit" name="" value="Ver" class="mt-4 mb-4 btn btn-primary">
                                <input type="submit" name="" value="Cerrar" class="mt-4 mb-4 btn btn-primary">

                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

<style>
/*    .btn-primary {
      background-image: linear-gradient(to right, #2d7bac, #00bfffab);
      color: #00bfffab;
      border: 1px solid #a7d9f8;
    }*/
  </style>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            const dataTable = $('#zero-config').DataTable({
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                    },
                    "sInfo": "Mostrando página _PAGE_ de _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Buscar...",
                    "sLengthMenu": "Resultado :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7
            });

        });
    </script>
@endsection
