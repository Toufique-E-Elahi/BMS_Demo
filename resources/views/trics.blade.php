<!DOCTYPE html>
<html>
<head>
    <title>Trics</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<br />

<div class="container">
    <h3 align="center">Welcome to World Book</h3>
    <br />
    @error('select_file')
        <div class="alert alert-danger">
            Upload Validation Error<br><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @enderror

    @if($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel/import') }}">
        @csrf
        <div class="form-group">
            <table class="table">
                <tr>
                    <td width="40%" align="right"><label>Select File for Upload</label></td>
                    <td width="30%">
                        <input type="file" name="select_file" id="control"/>
                    </td>
                    <td width="15%" align="left">
                        <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                    </td>
                    <td width="15%" align="left">
                        <input type="button" name="delete" class="btn btn-danger" onclick="reset($('#control'))" value="Delete">
                    </td>
                </tr>
                <tr>
                    <td width="40%" align="right"></td>
                    <td width="30"><span class="text-muted">.xls, .xslx</span></td>
                    <td width="15%" align="left"></td>
                    <td width="15%" align="left"></td>
                </tr>
            </table>
        </div>
    </form>

    <br />
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title" align="center">Best Books</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <th>chapterNumber</th>
                        <th>Title</th>
                        <th>b1h</th>
                        <th>b1</th>
                        <th>imageOne</th>
                        <th>imageTwo</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->chapterNumber }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->b1h }}</td>
                            <td>{{ $row->b1}}</td>
                            <td>{{ $row->imageOne }}</td>
                            <td>{{ $row->imageTwo }}</td>
                            <td><a href="/check/{{$row->id}}">Edit</a></td>
                            <td>
{{--                            Adding an additional form for the sake of delete submission    --}}
                                <form method="POST" action="/check/{{$row->id}}">
                                    @csrf
                                    @method('DELETE')

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-danger delete-row" value="Delete">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    $('.delete-row').click(function(e){
        e.preventDefault() // Don't post the form, unless confirmed
        if (confirm('Are you sure?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });


</script>
</html>
