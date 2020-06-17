@extends('layouts.master')
@section('title')
    Faajs | Create Categories
@endsection

@section('breadcrumb')
    Categories Setup
@endsection
@section('menuname')
    Categories
@endsection
@section('submenu')
    New Category
@endsection

@section('content')
<div class="col-xs-12">
    <div class="card-box">
        <div class="row">
            <div class="col-sm-12 col-xs-12 m-t-20">
                <h4 class="header-title m-t-0">Product Categories</h4>
                <hr>
                {{-- <p class="text-muted font-13 m-b-10">
                    Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
                </p> --}}

                <div class="p-20">
                    <form method="POST" action="{{route('category.store')}}">
                        {{ csrf_field() }}
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                          <strong>Whoops!</strong> There were some problems with your input.<br><br>
                          <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                        @endif
                        @if(session('success'))
                          <div class="alert alert-success">
                              {{ session('success') }}
                          </div> 
                        @endif
                        <div class="row">
                          <div class="col-md-6">
                            <input type="text" name="categoryname" class="form-control" placeholder="Category Name">
                          </div>
                          <div class="col-md-6">
                            <input type="text" name="categorydesc" class="form-control" placeholder="Category Description">
                          </div>
                        </div>
                        {{-- <div class="row">
                          <div class="col-md-6">
                            <input type="text" name="categorydesc" class="form-control" placeholder="Category Description">
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Last name">
                          </div>
                        </div> --}}

                        {{-- <div class="row">
                            <div class="col-md-6">
                              <input type="text" class="form-control" placeholder="First name">
                            </div>
                            <div class="col-md-6">
                              <input type="text" class="form-control" placeholder="Last name">
                            </div>
                          </div> --}}
                          {{-- dropdown --}}
                          {{-- <div class="row">
                            <div class="col-md-6">
                              <input type="text" class="form-control" placeholder="First name">
                            </div>
                            <div class="col-md-6">
                                <select class="form-control">
                                    <option>Select Option</option>
                                    <option>Default select</option>
                                    <option>Undefault select</option>
                                    <option>Data select</option>
                                </select>
                            </div>
                          </div> --}}

                          <div class="form-group m-t-30" style="margin-left: 70%">
                                <button type="submit" class="btn btn-info waves-effect waves-light w-md">
                                    Save
                                </button>
                                <a type="reset" href="{{route('category.view')}}"  class="btn btn-warning waves-effect m-l-5 w-md">
                                    Cancel
                                </a>
                        </div>
                      </form>
                </div>

            </div>

            {{-- <div class="col-sm-6 col-xs-12 m-t-20">
                <h4 class="header-title m-t-0">Range validation</h4>
                <p class="text-muted font-13 m-b-10">
                    Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
                </p>

                <div class="p-20">
                    <form action="#">

                        <div class="form-group">
                            <label>Min Length</label>
                            <div>
                                <input type="text" class="form-control" required
                                       data-parsley-minlength="6" placeholder="Min 6 chars."/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Max Length</label>
                            <div>
                                <input type="text" class="form-control" required
                                       data-parsley-maxlength="6" placeholder="Max 6 chars."/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Range Length</label>
                            <div>
                                <input type="text" class="form-control" required
                                       data-parsley-length="[5,10]"
                                       placeholder="Text between 5 - 10 chars length"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Min Value</label>
                            <div>
                                <input type="text" class="form-control" required
                                       data-parsley-min="6" placeholder="Min value is 6"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Max Value</label>
                            <div>
                                <input type="text" class="form-control" required
                                       data-parsley-max="6" placeholder="Max value is 6"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Range Value</label>
                            <div>
                                <input class="form-control" required type="text range" min="6"
                                       max="100" placeholder="Number between 6 - 100"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Regular Exp</label>
                            <div>
                                <input type="text" class="form-control" required
                                       data-parsley-pattern="#[A-Fa-f0-9]{6}"
                                       placeholder="Hex. Color"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Min check</label>
                            <div>
                                <div class="checkbox checkbox-custom">
                                    <input id="checkbox1" type="checkbox"
                                           data-parsley-multiple="groups"
                                           data-parsley-mincheck="2">
                                    <label for="checkbox1"> And this </label>
                                </div>
                                <div class="checkbox checkbox-pink">
                                    <input id="checkbox2" type="checkbox"
                                           data-parsley-multiple="groups"
                                           data-parsley-mincheck="2">
                                    <label for="checkbox2"> Can't check this </label>
                                </div>
                                <div class="checkbox checkbox-success">
                                    <input id="checkbox3" type="checkbox"
                                           data-parsley-multiple="groups"
                                           data-parsley-mincheck="2" required>
                                    <label for="checkbox3"> This too </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Max check</label>
                            <div>
                                <div class="checkbox checkbox-pink">
                                    <input id="checkbox4" type="checkbox"
                                           data-parsley-multiple="group1">
                                    <label for="checkbox4"> And this </label>
                                </div>
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox5" type="checkbox"
                                           data-parsley-multiple="group1">
                                    <label for="checkbox5"> Can't check this </label>
                                </div>
                                <div class="checkbox checkbox-success">
                                    <input id="checkbox6" type="checkbox"
                                           data-parsley-multiple="group1"
                                           data-parsley-maxcheck="1">
                                    <label for="checkbox6"> This too </label>
                                </div>

                            </div>
                        </div>

                        <div class="form-group m-b-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-default waves-effect m-l-5">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div> --}}

        </div>
        <!-- end row -->


    </div> <!-- end ard-box -->
</div><!-- end col-->
@endsection