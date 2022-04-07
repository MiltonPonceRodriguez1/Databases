<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro de Dominios</title>

    <!-- BOOTSTAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!--ToastrJS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Remote Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Stint+Ultra+Condensed&display=swap" rel="stylesheet">

    <!-- SweetAlert -->

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!--ToastrJS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- SWEETALERT -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>


    <div class="text-center mb-5 mt-4">
        <h1>Registro de Paginas Web.</h1>
    </div>
    
    <!-- SWEET ALERT INSERTAR REGISTRO -->
    <div>
        @if (isset($data) && $data['code'] == 200)
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Success!',
                    text: 'Your record has been saved successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
        @elseif (isset($data) && $data['code'] == 400)
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Error!',
                    text: 'Your record has not been saved successfully',
                    showConfirmButton: false,
                    timer: 1500
                })

            </script>
        @endif
    </div>

    <!-- SWEET ALERT FUNCION ALMACENADA ELIMINAR -->
    <div>
        @if (isset($data_delete) && $data_delete['code'] == 200)
                
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Success!',
                    text: 'Your record has been delete successfully!',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
        @elseif (isset($data_delete) && $data_delete['code'] == 400)
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Error!',
                    text: 'The web application does not exist!',
                    showConfirmButton: false,
                    timer: 1500
                })

            </script>
        @endif
    </div>

    <!-- SWEET ALERT INSERTAR REGISTRO -->
    <div>
        @if (isset($response) && $response['code'] == 200)
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Success!',
                    text: 'Your record has been increase successfully',
                    showConfirmButton: false,
                    timer: 1500
                })
            </script>
        @endif
    </div>


    <div class="container">
        <div class="row">
            <div class="col">
                <form method="post" action="{{route('Register.store')}}">
                    @csrf
                    <div class="row">
                        <div class="input-group">
                            <span class="input-group-text">Page Name:</span>
                            <input type="text" class="form-control" name="page_name">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="input-group">
                            <span class="input-group-text">URL:</span>
                            <input type="text" class="form-control" name="url">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <div class="input-group">
                                <span class="input-group-text">Root Domain:</span>
                                <input type="text" class="form-control" name="root_domain">
                            </div>
                        </div>

                        <div class="col">
                            <div class="input-group">
                                <span class="input-group-text">Hosting:</span>
                                <input type="text" class="form-control" name="hosting">
                            </div>
                        </div>
                        
                    </div>

                    <div class="row mt-4">
                        <div class="input-group">
                            <span class="input-group-text">Metas:</span>
                            <input type="text" class="form-control" name="metas">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="input-group">
                            <span class="input-group-text">Age:</span>
                            <input type="number" class="form-control" name="age">
                        </div>
                    </div>

                    <div class="row mt-4">
                        
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-outline-success" type="submit">Enviar Datos</button>
                        </div>
                        
                    </div>
                </form>
            </div>

            <div class="col">
                <div class="row">
                    <form method="post" action="{{route('Register.increase')}}">
                        @csrf
                        <div class="form-group row">
                            <div class="col">
                                <div class="input-group">
                                    <span class="input-group-text">Page Name:</span>
                                    <input type="text" class="form-control" name="inc_page_name">
                                </div>
                            </div>

                            <div class="col">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" class="btn btn-outline-warning form-control">Increase Age</button>
                                </div>
                            </div>
                            
                        </div>
                    </form>

                    <form method="post" action="{{route('Register.decrease')}}">
                        @csrf
                        <div class="form-group row mt-4">
                            <div class="col">
                                <div class="input-group">
                                    <span class="input-group-text">Page Name:</span>
                                    <input type="text" class="form-control" name="dec_page_name">
                                </div>
                            </div>

                            <div class="col">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" class="btn btn-outline-warning form-control">Decrease Age</button>
                                </div>
                            </div>
                            
                        </div>
                    </form>

                    <form method="post" action="{{route('Register.delete')}}">
                        @csrf
                        <div class="form-group row mt-4">
                            <div class="col">
                                <div class="input-group">
                                    <span class="input-group-text">Page Name:</span>
                                    <input type="text" class="form-control" name="delete_page_name">
                                </div>
                            </div>

                            <div class="col">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" class="btn btn-outline-danger form-control">Delete WebApp</button>
                                </div>
                            </div>
                            
                        </div>
                    </form>

                    <div class="row mt-4">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <a class="btn btn-outline-info" href="{{route('Register.getOldest')}}">Get the Oldest</a>
                        </div>
                    </div>
                    

                    <div class="row mt-4">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <a class="btn btn-outline-primary" href="{{route('Register.show')}}">Queries</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <hr/>

        @if (isset($web_apps))
        <div class="table-responsive table-style border border-dark rounded mt-5 mb-5">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">NAME</th>
                        <th scope="col" class="text-center">URL</th>
                        <th scope="col" class="text-center">ROOT DOMAIN</th>
                        <th scope="col" class="text-center">HOSTING</th>
                        <th scope="col" class="text-center">METAS</th>
                        <th scope="col" class="text-center">AGE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($web_apps as $web_apps)
                    <tr class="text-center">
                        <th scope="row">{{ $web_apps->name }}</th>
                        <td>{{ $web_apps->url }}</td>
                        <td>{{ $web_apps->root_domain }}</td>
                        <td>{{ $web_apps->hosting }}</td>
                        <td>{{ $web_apps->metas }}</td>
                        <td>{{ $web_apps->age }}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>

    <!-- CSS -->
    <script src="{{ asset('js/ajax.js') }}"></script>

</body>

</html>
