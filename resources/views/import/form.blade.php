@extends('layouts.app')

@section('content')
<div class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">File <span
                            class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type='file' id="file" name='file' class="form-control">
                        <div class='alert alert-danger mt-2 d-none text-danger' id="err_file"></div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="button" id="submit" value='Submit' class='btn btn-success'>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection()