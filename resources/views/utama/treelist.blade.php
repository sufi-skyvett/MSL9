@extends('layouts.defaultlayout')

@section('contentheader')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Treelist</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Treelist</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('content')
{{-- <a class="offline-button" href="../index.html">Back</a> --}}

<div id="example">

    <div id="treelist"></div>

    <script id="photo-template" type="text/x-kendo-template">
       <div class='employee-photo'
        style='background-image: url(../kendo/content/web/treelist/people/#:data.EmployeeID#.jpg);'></div>
       <div class='employee-name'>#: FirstName #</div>
    </script>

    <script>
        $(document).ready(function() {
            var service = "https://demos.telerik.com/kendo-ui/service";

            $("#treelist").kendoTreeList({
                dataSource: {
                    transport: {
                        read: {
                            url: service + "/EmployeeDirectory/All",
                            dataType: "jsonp"
                        }
                    },
                    schema: {
                        model: {
                            id: "EmployeeID",
                            parentId: "ReportsTo",
                            fields: {
                                ReportsTo: { field: "ReportsTo",  nullable: true },
                                EmployeeID: { field: "EmployeeId", type: "number" },
                                Extension: { field: "Extension", type: "number" }
                            },
                            expanded: true
                        }
                    }
                },
                height: 540,
                filterable: true,
                sortable: true,
                columns: [
                    { field: "FirstName", title: "First Name", width: 280,
                      template: $("#photo-template").html() },
                    { field: "LastName", title: "Last Name", width: 160 },
                    { field: "Position" },
                    { field: "Phone", width: 200 },
                    { field: "Extension", width: 140 },
                    { field: "Address" }
                ],
                pageable: {
                    pageSize: 15,
                    pageSizes: true
                }
            });
        });
    </script>

    <style>
        .employee-photo {
            display: inline-block;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-size: 32px 35px;
            background-position: center center;
            vertical-align: middle;
            line-height: 32px;
            box-shadow: inset 0 0 1px #999, inset 0 0 10px rgba(0,0,0,.2);
            margin-left: 5px;
        }

        .employee-name {
            display: inline-block;
            vertical-align: middle;
            line-height: 32px;
            padding-left: 3px;
        }
    </style>
</div>

@endsection
