<x-layout>

    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User Activities</h1>
                    </div>

                    <div>
                        <a href="{{ route('dashboard.users.activities.create', $user) }}" class="btn btn-primary">Add Activity</a>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Activities</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($activities as $activity)

                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $activity->title }}</td>
                                                <td>{{ $activity->description }}</td>
                                                <td>{{ $activity->date }}</td>
                                                <td>
                                                    <img src="{{ asset($activity->image ) }}" alt="">
                                                </td>

                                                <td>
                                                    <a href="{{ route('dashboard.users.activities.edit', [$user->id, $activity->id]) }}" class="btn btn-primary">Edit</a>
                                                </td>
                                            </tr>


                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    {{ $activities->links() }}
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


</x-layout>
