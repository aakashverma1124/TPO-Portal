<head>
  <style>
  .btn-dark{
    background-color: #215173;
  }
</style>
</head>
<h1> Photo/Resume Details </h1>
<hr>

<form action="./upload.php" method="post" id="upload-files-form" enctype="multipart/form-data">
  <div class="form-group">
    <label for="uploadPhoto">Select Photo:</label>
    <div class="photo-field-value"><input type="file" class="form-control" id="uploadedPhoto" name="uploadedPhoto"></div>
  </div>
  <div class="form-group">
    <label for="uploadResume">Select Resume:</label>
    <div class="photo-field-value"><input type="file" class="form-control" id="uploadedResume" name="uploadedResume"></div>
  </div>
  <button type="submit" class="btn btn-dark" >Submit</button>
</form>