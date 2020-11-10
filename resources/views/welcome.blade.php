<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-12">
                    <div class="card shadow-lg m-5">
                        <div class="card-header">
                            <h4 class="card-title mt-3">Contact Appliacation Laravel 6 with AJAX</h4>
                        </div>
                        <div class="card-body">
                            <p class="lead text-muted"><em>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, sit!</em></p>
                            <button class="mb-3 btn btn-sm btn-flat btn-success shadow" id="kontak-tambah" data-toggle="collapse" data-target="#kontak-collapse"><i class="fa fa-plus"></i> Add</button>
                            <div id="kontak-collapse" class="collapse">
                                <div class="card">
                                    <div class="card-body shadow">
                                        <form action="{{ route('contact.add') }}" method="POST" id="kontak-form">
                                            @csrf
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group">
                                                        <label for="name">Name:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control form-control-sm shadow-sm" id="name" name="name" placeholder="Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                    <div class="form-group">
                                                        <label for="phone">Phone:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-mobile"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control form-control-sm shadow-sm" id="phone" name="phone" placeholder="08xx">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-12">
                                                    <button type="submit" class="btn btn-sm btn-flat btn-success btn-block shadow-sm"><i class="fa fa-save"></i> Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3 shadow">
                                <div class="card-header m-0">
                                    <h6>Contact List</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="kontak-table" class="table table-bordered table-sm table-striped">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal --}}
        </div>

        <script src="{{ mix('js/app.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('#kontak-table').DataTable({
                    ordering: false,
                });

                $('#kontak-collapse').on('hide.bs.collapse', function () {
                    $('#kontak-tambah').removeClass('btn-danger').addClass('btn-success').html('<i class="fa fa-plus"></i> Add');
                });

                $('#kontak-collapse').on('show.bs.collapse', function () {
                    $('#kontak-tambah').removeClass('btn-success').addClass('btn-danger').html('<i class="fa fa-times"></i> Close');
                });
            });

            document.querySelector('#kontak-form').addEventListener('submit', function (e) {
                e.preventDefault();

                axios.post(this.action, {
                    'name': document.querySelector('#name').value,
                    'phone': document.querySelector('#phone').value,
                }).then((response) => {
                    console.log('success');
                }).catch((error) => {
                    console.log(error.response.data.errors);
                });
            });
        </script>
    </body>
</html>
