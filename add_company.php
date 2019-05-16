<head>
  <style>
  .btn-dark{
    background-color: #215173;
  }
</style>
</head>

<h1>Add Company</h1>
<hr>
<form id="add-company-form">
  <div class="form-group">
    <label for="companyName">Company:</label>
    <input type="text" placeholder="Add Company Name" class="form-control" name="company_name" id="company_name">
  </div>
  <div class="form-group">
    <label for="companyProfile">Profile:</label>
    <input type="text" placeholder="Add Company Profile" class="form-control" name="company_profile" id="company_profile">
  </div>
  <div class="form-group">
    <label for="branchesAllowed">Branches Allowed:</label>
    <input type="text" placeholder="Branches Allowed (for ex. ECE, CSE etc.)" class="form-control" name="branches_allowed" id="branches_allowed">
  </div>
  <div class="form-group">
    <label for="package">Package:</label>
    <input type="text" placeholder="Package" class="form-control" name="package" id="package">
  </div> 
    <div class="form-group">
    <label for="registrationDeadline">Registration Deadline:</label>
    <input type="date" placeholder="Registration Deadline" class="form-control" name="registration_deadline" id="registration_deadline">
  </div>
  <button type="button" class="btn btn-dark" onclick="onAddCompanyButtonClicked();">Add Company</button>
</form>