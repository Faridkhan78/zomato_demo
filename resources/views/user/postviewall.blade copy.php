<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body style="background-image: url('{{ asset('imageslogo/images (1).jpg') }}') background-size: cover;">

    <div class="container">

        <div class="col-6 mt-4">

            <table class="table table-bordered table-striped">
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th colspan="2">Action</th>
                    {{-- <th>DELETE</th>
                        <th>UPDATE</th> --}}
                </tr>
                <tbody class="">
                    @foreach ($post as $userItem)
                        <tr>
                            <td>{{ $userItem->id }}</td>
                            <td>{{ $userItem->title }}</td>
                            <td>{{ $userItem->description }}</td>
                            {{-- <td>{{ $userItem->image_path}}</td> --}}
                            <td> <img src="{{ asset('storage/' . $userItem->image_path) }}" alt="{{ $userItem->title }}"
                                    style="width: 100px; height: auto;"></td>
                            <td>{{ $userItem->published_date }}</td>


                            <form method="post" action="{{ route('delete', $userItem->id) }}">
                                @csrf
                                @method('DELETE')
                                <td><button class="btn btn-danger btn-sm">DELETE</button>
                                </td>
                            </form>


                            {{-- <td><a href="{{ route('update.page', $userItem->id) }}"
                                    class="btn btn-warning btn-sm">UPDATE</a>
                            </td> --}}
                            <td>
                                <a href="{{ route('update.post', $userItem->id) }}" class="btn btn-primary"
                                    class="btn dw dw-edit2"
                                    onclick="openModel('{{ $userItem->id }}','{{ $userItem->title }}','{{ $userItem->description }}','{{ $userItem->image_path }}','{{ $userItem->published_date }}')">
                                    Edit
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
                <tbody id="tbody" class="searchdata"></tbody>
            </table>

        </div>
    </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

</html>

<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Page</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('updatePost') }}" method="POST">
                        @csrf
                        <input type="text" name="id" id="id">
                        <div class="input-group custom">
                            <input type="text" class="form-control form-control-lg" placeholder="Title"
                                name="title" id="title" />

                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                            </div>

                        </div>
                        <div class="input-group custom">
                            <input type="email" class="form-control form-control-lg" placeholder="Description"
                                name="description" id="description" />
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>

                        </div>

                        <div class="input-group custom">
                            <input type="file" class="form-control form-control-lg" placeholder="Choose File"
                                name="image_path" id="image_path" />
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>

                        <div class="input-group custom">
                            <input type="text" class="form-control form-control-lg" placeholder="Date"
                                name="published_date" id="published_date" />
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>


                    </form>
                </div>

            </div>
        </div>
    </div>

</div>
<script>
    function openModel(id, title, description, image_path, published_date) {
        $('#id').val(id);
        $('#title').val(title);
        $('#description').val(description);
        $('#image_path').val(image_path);
        $('#published_date').val(published_date);
        $('#exampleModal').modal('show');
    }
</script>
