@extends('layouts.master')

@section('content')
@if(session('sukses'))
    <div class="alert alert-success" role="alert">
        {{session('sukses')}}
    </div>
@endif
<div class="row mt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
    
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Paket</span>
                    <span class="info-box-number">
                    {{-- {{$jmlpaket->count()}} --}}
                    <small>paket</small>
                    </span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
    
                <div class="info-box-content">
                    <span class="info-box-text">Pagu</span>
                    <span class="info-box-number"><small>Rp</small>
                        {{-- {{number_format($jmlpaket->sum('pagurmp'))}} --}}
                    </span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
    
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
    
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
    
                <div class="info-box-content">
                    <span class="info-box-text">Progres Keuangan</span>
                    <span class="info-box-number">
                        {{-- {{number_format($jmlpaket->avg('progres_keu'),2)}} --}}
                    </span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
    
                <div class="info-box-content">
                    <span class="info-box-text">Progres Fisik</span>
                    <span class="info-box-number">
                        {{-- {{number_format($jmlpaket->avg('progres_fisik'),2)}} --}}
                    </span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
    </div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Paket</h3>

                <div class="card-tools">
                    <button class="btn btn-success" data-toggle="modal" data-target="#addNew">
                        Add New
                        <i class="fas fa-user-plus fa-fw"></i>
                    </button>
                </div>
            </div>
            <a href="/paket/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>No</th>
                            <th>Kode Satker</th>
                            <th>Nama Paket</th>
                            <th>Pagu</th>
                            <th>Penyerapan Keuangan</th>
                            <th>Progres Keuangan</th>
                            <th>Progres Fisik</th>
                            {{-- <th>TA</th> --}}
                            <th>Modify</th>
                        </tr>
                        {{-- $total = 0; --}}
                    @foreach ($data_paket as $paket)  
                    
                        <tr>
                            <td>{{$paket->id}}</td>
                            <td>{{$paket->kdsatker}}</td>
                            <td>{{$paket->nmpaket}}</td>
                            <td class="text-right">{{number_format($paket->pagurmp)}}</td>
                            <td>{{$paket->trgoutput}}</td>
                            <td></td>
                            <td></td>
                            {{-- <td class="text-right">{{number_format($paket->keuangan)}}</td>
                            <td class="text-right">{{number_format($paket->progres_keu,2)}}</td>
                            <td class="text-right">{{number_format($paket->progres_fisik,2)}}</td> --}}
                            {{-- <td>{{$paket->ta}}</td> --}}
                            <td>
                                <a href="/paketaccess/{{$paket->id}}/edit">
                                    <i class="fa fa-edit blue"></i>
                                </a>
                                /
                                <a href="/paketaccess/{{$paket->id}}/delete">
                                    <i class="fa fa-trash red" onclick="return confirm('Yakin data mau dihapus')"></i>
                                </a>
                            </td>
                        </tr>
                            {{-- {{$total=$total+[pagurmp]}} --}}
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
{{--                             
                            <td class="text-right">{{number_format($total)}}</td>
                            <td></td>
                            <td class="text-right">{{number_format($avg_keu,2)}}</td>
                            <td class="text-right">{{number_format($avg_fisik,2)}}</td> --}}
                            {{-- <td></td> --}}
                            <td></td>
                        </tr>
                    </tfoot>
                    
                </table>
                {{$data_paket->links()}}
            </div>
        
        </div>
       
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="addNewLabel">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">                    
                    <form action="/paket/create"  method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="kdsatker">Kode Satker</label>
                            <input name="kdsatker" type="text" class="form-control" id="kdsatker" placeholder="Kode Satker">
                        </div>
                        <div class="form-group">
                            <label for="nmpaket">Nama Paket</label>
                            <input name="nmpaket" type="text" class="form-control" id="nmpaket" placeholder="Nama Paket">
                        </div>
                        <div class="form-group">
                            <label for="pagurmp">Pagu</label>
                            <input name="pagurmp" type="number" class="form-control" id="pagurmp" placeholder="Pagu">
                        </div>   
                        <div class="form-group{{$errors->has('keuangan') ? 'has-error' : ''}}">
                            <label for="keuangan">Penyerapan Keuangan</label>
                            <input name="keuangan" type="number" class="form-control" id="keuangan" placeholder="Penyerapan Keuangan">
                            @if($errors->has('keuangan'))
                                <span class="help-block">{{$errors->first('keuangan')}}</span>
                            @endif
                        </div>                     
                        <div class="form-group{{$errors->has('progres_keu') ? 'has-error' : ''}}">
                            <label for="progres_keu">Progres Keuangan</label>
                            <input name="progres_keu" type="number" step="0.01" class="form-control" id="progres_keu" placeholder="Progres Keuangan">
                            @if($errors->has('progres_keu'))
                                <span class="help-block">{{$errors->first('progres_keu')}}</span>
                            @endif
                        </div>
                        <div class="form-group{{$errors->has('progres_fisik') ? 'has-error' : ''}}">
                            <label for="progres_fisik">Progres Fisik</label>
                            <input name="progres_fisik" type="number" step="0.01" class="form-control" id="progres_fisik" placeholder="Progres Fisik">
                            @if($errors->has('progres_fisik'))
                                <span class="help-block">{{$errors->first('progres_fisik')}}</span>
                            @endif
                        </div>    
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>            
            </div>
        </div>
    </div>
</div>
</div>

@endsection