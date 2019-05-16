<head>
  <style>
  .btn-dark{
    background-color: #215173;
  }
</style>
</head>

<h1>View Registered Students</h1>
<hr>
<form id="view-registered-students-form" action="./registered_students.php">
  <div class="form-group">
    <label for="companyName">Enter Company Name:</label>
    <input type="text" placeholder="Enter Company Name" class="form-control" name="company_name" id="company_name" required>
  </div>
   <button type="button" class="btn btn-dark" onclick="onViewRegisteredStudentsButtonClicked();">View Registered Students</button>
   <div id="registered-students"></div>
</form>