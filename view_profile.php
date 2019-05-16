<head>
  <style>
  .btn-dark{
    background-color: #215173;
  }
</style>
</head>
<h1>View Profile for Verification</h1>
<hr>
<form id="view-profile-form" action="/check_user.php">
  <div id="" class="form-group">
    <label for="admission_number">Admission Number:</label>
    <input type="text" placeholder="Student's Admission Number for verification" class="form-control" id="admission_number" name="admission_number">
  </div>
  <button type="button" class="btn btn-dark" onclick="onViewProfileClicked();">View Profile</button>
</form>