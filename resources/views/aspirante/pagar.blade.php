@extends('inicio')
@section('pagar')
<div class="row small-spacing">
<div class="col-lg-6 col-xs-12">
    <div class="box-content card white">
        <h4 class="box-title"></h4>
        <!-- /.box-title -->
        <div class="card-content">
            <form class="form-horizontal">
                {{-- <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Enter your email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Enter your password">
                    </div>
                </div> --}}
                
                <div class="form-group margin-bottom-0">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button onclick="todo.demoTx()" class="btn btn-info btn-sm waves-effect waves-light">Pagar</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-content -->
    </div>
    <!-- /.box-content -->
</div>
    
@endsection