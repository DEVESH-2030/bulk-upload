<html lang="en">
  <head>
    <title>Upload File</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  {{-- body --}}
  <body> 
    <div class="container">
      <h2>Upload File</h2>
      <div class="box box-primary">
        <div class="box-body">
          <form class="form-inline" action="{{ route('upload') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-group">
              <label for="file">Choose File</label>
              <input type="file" class="form-control ml-1 pt-1" id="file" placeholder="Enter file" name="file">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary ml-1"><i class="fa fa-upload"></i>Upload</button>
            </div>
          </form> 
        </div>
      </div>
    </div>
  </body>
</html>
 