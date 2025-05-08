<div class="">
    <div id="lorem-left" class="tab-pane fade show active accordion-item" role="tabpanel">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs  " data-bs-toggle="tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="http://localhost/d/awal" onclick="table_link()" id="btnTabTable" class="nav-link " data-bs-toggle="tab" aria-selected="true" role="tab">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-border-all" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                <path d="M4 12l16 0"></path>
                                <path d="M12 4l0 16"></path>
                            </svg> Tabel Data </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#dataForm" id="btnTabForm" class="nav-link active" data-bs-toggle="tab" aria-selected="false" role="tab" tabindex="-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ad-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M11.933 5h-6.933v16h13v-8"></path>
                                <path d="M14 17h-5"></path>
                                <path d="M9 13h5v-4h-5z"></path>
                                <path d="M15 5v-2"></path>
                                <path d="M18 6l2 -2"></path>
                                <path d="M19 9h2"></path>
                            </svg>
                            Form</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane " id="dataTabel" role="tabpanel">
                    </div>                        
                        <div class="tab-pane active show " id="dataForm" role="tabpanel">      
                                <form class="form" id="id_form" action="" method="POST">
                                        <tr>
                                            <td style="vertical-align:left;" align="left" width="100px"><label class="form-label col-12 ">Nama User</label></td>
                                            <td width="400px">
                                                <input type="text" name="username" class="form-control"  value="@if( $t_userr !=''){{ $t_userr->username}}@endif"><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:left;" align="left" width="100px"><label class="form-label col-12 ">Password User</label></td>
                                            <td width="400px">
                                                <input type="hidden" id="txtPrimarykey" name="id" class="form-control" value="@if($t_userr !='') {{$t_userr->id}}@endif">
                                                <input type="hidden" id="action" class="form-control">
                                                <input type="text" name="password" class="form-control"  value="@if( $t_userr !=''){{ $t_userr->username}}@endif"><br>
                                                <div style="float:right;">
                                                    <a href="{{route('awal.index')}}" class="ps-btn danger" id="btnCancel" onclick="actCancel()"><i class="fas fa-window-close"></i>&nbsp;Cancel</a>
                                                    <button type="submit" class="ps-btn success" id="savedata"><i class="fa fa-save"></i> &nbsp;Save</button>
                                                </div>
                                            </td>
                                        </tr>
                                </form>                 
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript'>
    function table_link() {
        window.location.replace('{{route("awal.store")}}');
    }
    $(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#savedata').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#id_form').serialize(),
                url: '{{route("awal.store")}}',
                type: 'POST',
                dataType: 'json',
                success: function(data) {
                 
                        alert('berhasil');
                        $('#savedata').html('Save');
                        table_link();
                   
                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#savedata').html('Save Changes');
                }
            });
        });
    });
</script>