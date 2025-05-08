<div class="row row-cards">

            <div class="card-body">
                <div class="">
                    
                        <div class="table-responsive">
                        
                        <div><a class="ps-btn success" href="{{route('awal.create')}}"><i class="icon icon-plus mr-2"></i>Add</a></div>
                        </div>
                            <hr>
                            <div class="table-responsive">
                                <table id="t_userr" class="table table-bordered table-condensed table-striped">
                                    <thead>
                                        <tr>
                                            <th width="50"><b>#ID</th>
                                            <th width="200"><b>Username</th>
                                            <th width="200"><b>Password</th>
                                            <th width="100"><b>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>

<script type="text/javascript">
    $(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('#t_userr').DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            "language": {
                "lengthMenu": "Show _MENU_",
            },
            "dom": "<'row mb-2'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start dt-toolbar'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end dt-toolbar'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">",
            ajax: "{{ route('awal.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'password',
                    name: 'password'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ]
        });

     
        $('body').on('click', '.deleteForm', function() {
            var id = $(this).data("id");
            confirm("Are You sure want to delete this Data User!");
            $.ajax({
                type: "DELETE",
                url: "{{ route('awal.store') }}" + '/' + id,
                success: function(data) {
                    table.draw();
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });

        // Print functionality
        // $('#printTable').on('click', function () {
        //     var tableContent = $('#t_activity').clone();
        //     var newWindow = window.open('', '', 'height=600,width=800');
        //     newWindow.document.write('<html><head><title>Print Data</title>');
        //     newWindow.document.write('<style>table {width: 100%; border-collapse: collapse;} table, th, td {border: 1px solid black;} th, td {padding: 10px; text-align: left;}</style>');
        //     newWindow.document.write('</head><body>');
        //     newWindow.document.write('<h3>Data Program</h3>');
        //     newWindow.document.write(tableContent[0].outerHTML);
        //     newWindow.document.write('</body></html>');
        //     newWindow.document.close();
        //     newWindow.print();
        // });
    });
</script>