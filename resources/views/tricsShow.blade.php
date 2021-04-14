<!DOCTYPE html>
<html>
<head>
    <title>Trics Edit</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<br />

<div class="container">
    <h3 align="center">Want to Make Any Change?</h3>
    <br />

    <br />
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title" align="center">Magic Trics</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <form action="{{url('/check/'.$tric->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Chapter Number</th>
                            <th>Title</th>
                            <th>b1h</th>
                            <th>b1</th>
                            <th>imageOne</th>
                            <th>imageTwo</th>
                            <th>Edit</th>

                        </tr>

                        <tr>
                            <td >{{ $tric->id }}</td>
                            <td><input type="text"name="chapterNumber" class="form-control " value="{{ $tric->chapterNumber }}"></td>
                            <td><input type="text"name="title" class="form-control " value="{{ $tric->title }}"></td>
                            <td><input type="text"name="b1h" class="form-control " value="{{ $tric->b1h }}"></td>
                            <td><input type="text"name="b1" class="form-control " value="{{ $tric->b1 }}"></td>
                            <td><input type="text"name="imageOne" class="form-control" value="{{ $tric->imageOne }}"></td>
                            <td><input type="text"name="imageTwo" class="form-control" value="{{ $tric->imageTwo }}"></td>
                            <td><input type="submit" value="Update"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
