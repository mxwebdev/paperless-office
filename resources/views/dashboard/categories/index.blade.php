@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> Categories</div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Documents</th>
                                    <th>Color</th>
                                    <th class="text-right">Created at</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td></td>
                                    <td>{{ $category->color }}</td>
                                    <td class="text-right">{{ $category->created_at->diffForHumans() }}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <!-- Pagination Links -->
                        {{ $categories->links() }}
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