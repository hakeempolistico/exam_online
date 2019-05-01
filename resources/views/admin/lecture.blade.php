@extends('layouts.template')

@section('title')
    <title>Subjects | Online Exam</title>
@endsection

@section('content')
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Subject List</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
                    <li><a href="/dashboard"><i class="demo-pli-home"></i></a></li>
                    {{-- <li><a href="#">Tables</a></li> --}}
                    <li class="active">Subjects</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>

                
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    
                    <!-- Basic Data Tables -->
                    <!--===================================================-->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Record of lectures with details</h3>
                        </div>
                        <div class="panel-body">
                            <a href="{{ route('lecture.create') }}" class="btn btn-info btn-labeled mar-btm"><i class="btn-label demo-pli-add"></i> Lecture</a>
                            <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Module</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--===================================================-->
                    <!-- End Striped Table -->


                    
                    
                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->

@endsection


@section('css')

    <!--DataTables [ OPTIONAL ]-->
    <link href="/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css" rel="stylesheet">

@endsection

@section('js')

    <!--DataTables [ OPTIONAL ]-->
    <script src="/plugins/datatables/media/js/jquery.dataTables.js"></script>
    <script src="/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
    <script src="/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>


    <script>
        
        $(document).on('nifty.ready', function() {
            $.fn.DataTable.ext.pager.numbers_length = 5;
            $('#demo-dt-basic').dataTable( {
                ajax : {
                    url : '{{ route('lecture.all') }}',
                }, 
                responsive: true,
                language: {
                    paginate: {
                      previous: '<i class="demo-psi-arrow-left"></i>',
                      next: '<i class="demo-psi-arrow-right"></i>'
                    }
                }
            });
            
        });


    </script>

@endsection