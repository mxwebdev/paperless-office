@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> Keywords</div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                                <tr>
                                    <th>Keyword</th>
                                    <th>Documents</th>
                                    <th>Color</th>
                                    <th class="text-right">Created at</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($keywords as $keyword)
                                <tr>
                                    <td>{{ $keyword->name }}</td>
                                    <td></td>
                                    <td>{{ $keyword->color }}</td>
                                    <td class="text-right">{{ $keyword->created_at->diffForHumans() }}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <!-- Pagination Links -->
                        {{ $keywords->links() }}
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