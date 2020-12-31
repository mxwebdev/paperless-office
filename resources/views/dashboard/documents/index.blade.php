@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12">

                @include('dashboard.shared.error')

                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> Documents Archive</div>

                    @if (count($documents) > 0)

                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                                <tr>
                                    <th>Preview</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Keywords</th>
                                    <th>Categories</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($documents as $document)
                                <tr>
                                    <td>


                                        <a href="{{ asset($document->path) }}">{{ asset($document->path) }}</a>


                                    </td>
                                    <td>{{ Carbon\Carbon::parse($document->date)->isoFormat('DD.MM.Y') }}</td>
                                    <td>{{ $document->name }}</td>
                                    <td>
                                        @foreach ($document->keywords as $keyword)
                                        {{ $keyword->name }},&nbsp;
                                        @endforeach
                                    </td>
                                    <td></td>
                                    <td class="text-right"></td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <!-- Pagination Links -->
                        {{ $documents->links() }}
                    </div>

                    @else

                    <div class="card-body">
                        <div class="jumbotron text-center">
                            <h1 class="display-3"><i class="cil-sad"></i></h1>
                            <p class="lead">Your archive is all empty. Let's get it filled...</p>
                            <p><a class="btn btn-primary btn-lg" href="{{ route('document.inbox') }}" role="button"><i
                                        class="cil-inbox"></i> Go to inbox...</a></p>
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

@endsection