@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12">

                @include('dashboard.shared.error')

                <div class="card">

                    <div class="card-header"><i class="fa fa-align-justify"></i> Archieve Document</div>

                    <form class="form-horizontal" action="{{ route('document.store') }}" method="post"
                        enctype="multipart/form-data">

                        @csrf

                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="orgname-input">Original Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="orgname-input" type="text" name="orgname-input"
                                        value="{{ $inboxDocument }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="name-input">Name</label>
                                <div class="col-md-9">
                                    <input class="form-control {{ $errors->has('name-input') ? 'is-invalid' : '' }}"
                                        id="name-input" type="text" name="name-input"
                                        placeholder="Name your document... (optional)"
                                        value="{{ old('name-input') }}"><span class="help-block"></span>
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="email-input">Email Input</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="email-input" type="email" name="email-input"
                                        placeholder="Enter Email" autocomplete="email"><span class="help-block">Please
                                        enter your email</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="password-input">Password</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="password-input" type="password"
                                        name="password-input" placeholder="Password" autocomplete="new-password"><span
                                        class="help-block">Please enter a complex password</span>
                                </div>
                            </div> --}}

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="date-input">Date</label>
                                <div class="col-md-9">
                                    <input class="form-control {{ $errors->has('date-input') ? 'is-invalid' : '' }}"
                                        id="date-input" type="date" name="date-input" placeholder="date"
                                        value="{{ old('date-input', date('Y-m-d', strtotime($lastModified))) }}"><span
                                        class="help-block">If no date is selected, the document's original date
                                        will be
                                        used.</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="description-input">Description</label>
                                <div class="col-md-9">
                                    <textarea
                                        class="form-control {{ $errors->has('description-input') ? 'is-invalid' : '' }}"
                                        id="description-input" name="description-input" rows="5"
                                        placeholder="Your document's description... (optional)"
                                        value="">{{ old('description-input') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="category-select">Category</label>
                                <div class="col-md-9">
                                    <select
                                        class="form-control {{ $errors->has('category-select') ? 'is-invalid' : '' }}"
                                        id="category-select" name="category-select" size="5" multiple="" disabled>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        <option value="4">Option #4</option>
                                        <option value="4">Option #5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="keyword-input">Keywords</label>
                                <div class="col-md-9">
                                    <input class="form-control {{ $errors->has('keyword-input') ? 'is-invalid' : '' }}"
                                        id="keyword-input" type="text" name="keyword-input" placeholder="Keywords"
                                        value="{{ old('keyword-input') }}"><span class="help-block">Enter at least one
                                        keyword for
                                        your document.</span>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-danger" type="reset">Reset</button>
                            <button class="btn btn-success float-right" type="submit"><i
                                    class="cil-file">&nbsp;</i>Archive</button>
                        </div>

                    </form>

                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- /.row-->
    </div>
</div>

@endsection

@section('javascript')
<script>
    var keywords = {!! json_encode($keywords->toArray(), JSON_HEX_TAG) !!};
</script>

<script src="{{ asset('js/tagify.js') }}"></script>

@endsection