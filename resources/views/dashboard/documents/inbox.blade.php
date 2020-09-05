@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12">

                @include('dashboard.shared.error')

                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> Document Inbox</div>

                    @if (!empty($inboxDocumentsWithMeta))

                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                                <tr>
                                    <th>Preview</th>
                                    <th>File Name</th>
                                    <th>File Size</th>
                                    <th>Last Modified</th>
                                    <th>Fast Lane <i class="cil-info" data-toggle="tooltip" title=""
                                            data-original-title="Use the fast lane to add keywords and archive your document quickly."></i>
                                    </th>
                                    <th>Archive <i class="cil-info" data-toggle="tooltip" title=""
                                            data-original-title="Add additional information to your document (e.g. name, description, etc.) before sending it to the archive."></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($inboxDocumentsWithMeta as $document)
                                <tr>
                                    <td></td>
                                    <td>{{ $document['full_name'] }}</td>
                                    <td>{{ number_format($document['size']/1000000, 2, ',', '.') }} MB</td>
                                    <td>{{ Carbon\Carbon::parse($document['last_modified'])->diffForHumans() }}</td>


                                    <td>
                                        <form class="form-horizontal" action="{{ route('document.store') }}"
                                            method="post" enctype="multipart/form-data">

                                            @csrf

                                            <input type="hidden" name="orgname-input" id="orgname-input"
                                                value="{{ $document['full_name'] }}">
                                            <input type="hidden" name="date-input" id="date-input"
                                                value="{{ $document['last_modified'] }}">
                                            <input type="hidden" name="orgname-input" id="orgname-input"
                                                value="{{ $document['full_name'] }}">
                                            <input type="hidden" name="name-input" id="name-input">
                                            <input type="hidden" name="description-input" id="description-input">

                                            <div class="input-group"><input
                                                    class="form-control {{ $errors->has('keyword-input') ? 'is-invalid' : '' }}"
                                                    id="keyword-input" type="text" name="keyword-input"
                                                    placeholder="Keywords" value="{{ old('keyword-input') }}"><span
                                                    class="input-group-append">
                                                    <button class="btn btn-primary" type="submit"><i
                                                            class="cil-file"></i></button></span>

                                            </div>
                                        </form>
                                    </td>

                                    <td>
                                        <a href="{{ route('document.archive', ['inboxDocument' => $document['full_name'], 'lastModified' => $document['last_modified']]) }}"
                                            class="btn btn-primary" type="button"><i
                                                class="cil-file">&nbsp;</i>Archive</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <!-- Pagination Links -->
                        {{-- {{ $inbox->links() }} --}}
                    </div>

                    @else

                    <div class="card-body">
                        <div class="jumbotron text-center">
                            <h1 class="display-3"><i class="cil-check"></i></h1>
                            <p class="lead">Nothing to archive! Your office work is done for today...</p>
                        </div>
                    </div>

                    @endif

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
<script src="{{ asset('js/tooltips.js') }}"></script>

@endsection