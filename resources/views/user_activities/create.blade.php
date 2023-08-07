<x-layout>


    <div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Activity For {{ $user->name }}</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm"  enctype="multipart/form-data" method="post"
                                  action="{{ route('dashboard.users.activities.create.post', $user) }}">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label>Date:</label>
                                        <div class="input-group date" id="date" data-target-input="nearest">
                                            <input type="date" name="date" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Title</label>
                                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Activity title">
                                    </div>
                                    <div class="form-group">
                                        <label for="customFile">Image</label>
                                        <div >
                                            <input type="file" name="image"  >

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Description</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."></textarea>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


</x-layout>
