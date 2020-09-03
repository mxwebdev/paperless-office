@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12">

                @include('dashboard.shared.error')

                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> Document Inbox</div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                                <tr>
                                    <th>Preview</th>
                                    <th>File Name</th>
                                    <th>File Size</th>
                                    <th>Last Modified</th>
                                    <th>Archive</th>
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
                                        <a href="{{ route('document.archive', ['inboxDocument' => $document['full_name'], 'lastModified' => $document['last_modified']]) }}"
                                            class="btn btn-success" type="button"><i
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
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- /.row-->
    </div>
</div>

@endsection

@section('javascript')

@endsection