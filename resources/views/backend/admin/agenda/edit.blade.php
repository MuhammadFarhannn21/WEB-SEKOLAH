@extends('backend.layouts.master')

@section('konten')
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title" style="margin-left: 18px;">Edit Kategori</h4>
            
        </div>
    </div>
</div>


<div class="col-sm-12">
    <div class="card m-b-20">
        <div class="card-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home2" role="tab">Edit Kategori</a>
                </li>

            </ul>

            <div class="tab-content">
                <div class="tab-pane active p-3" id="profile2" role="tabpanel">
                    <form action="{{ url('/admin/agenda/update',$agenda->id) }}" method="post">
                    {{ csrf_field() }}  
                    {{ method_field('PATCH')}}
                        <div class="form-group">  
                          <div class="table-responsive">  
                               <table class="table" id="dynamic_field">  
                                    <tr>
                                        <th>Judul</th>
                                        <th>Mulai</th>
                                        <th>Selesai</th>
                                    </tr>
                                    <tr>  
                                        <td><input name="title" value="{{ $agenda->title }}" type="text" class="form-control" required /></td> 
                                        <td><input name="start" value="{{ $agenda->start }}" type="date" class="form-control" required /></td>
                                        <td><input name="end" value="{{ $agenda->end }}" type="date" class="form-control" required /></td>  
                                    </tr>  
                               </table>  
                          </div>  
                        </div> 

                        <div class="m-t-20">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{ url('/admin/agenda') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
