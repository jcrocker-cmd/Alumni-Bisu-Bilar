<section class="all-vehicles-section">

@if (session('status'))
  <h6 class="alert alert-success my-0" id="myAlert" style="font-size: 14px;">{{ session('status') }}</h6>
@endif


    <div class="pb-3 d-flex justify-content-between px-3 pt-4">
    <h5 class="">Dashboard Users</h5>
    <a href="#" title="Add Dashboard Users"><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Users</button></a>
    </div>

<div class="table-responsive px-3 pb-3">

<table class="table align-middle mb-0 bg-light table-hover" id="dbTable">
<thead class="table bg-primary text-white">
<tr>
  <th scope="col" class="col-3">Name</th>
  <th scope="col">Example TR</th>
  <th scope="col">Example TR</th>
  <th scope="col">Example TR</th>
  <th scope="col">Example TR</th>
  <th scope="col">Actions</th>
</tr>
</thead>
<tbody>

 <tr>
  <td>
    <div class ="d-flex align-items-center">
        <img src="user.jpg" alt=""
        style="height: 45px; width: 45px;" class="rounded-circle">
    <div class="ms-3">
        <p class="fw-bold mb-1">Maricel Alambatin</p>
        <p class="text-muted mb-0">example@gmail.com</p>

    </div>
    </div>

  </td>
  <td>
    <span class="badge bg-danger rounded-pill">Example TD</span>
  </td>
  <td>Example TD</td>
  
  <td>Example TD</td>
  <td>Example TD</td>
  <td>
  <a href="#" title="View" class="actions action-view"><i class="fa fa-eye" aria-hidden="true"></i></a>
  <a href="#" title="Edit" class="actions action-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
  <a href="#" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)" class="actions action-delete"><i class="fa fa-trash" aria-hidden="true"></i></a>

  </td>
  </tr>



</tbody>
</table>





</div>




</section>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

    <form action="post_announcement" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Dashboard Users</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @csrf
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Full name:</label>
              <input type="text" class="form-control" id="recipient-name" name="subject">
              <span class="text-danger">Error message</span>
            </div>

            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Username:</label>
              <input type="text" class="form-control" id="recipient-name" name="subject">
              <span class="text-danger">Error message</span>
            </div>

            <div class="mb-3">
              <label for="message-text" class="col-form-label">Password:</label>
              <input type="text" class="form-control" id="recipient-name" name="subject">
              <span class="text-danger">Error message</span>

            </div>

            <div class="mb-3">
              <label for="message-text" class="col-form-label">Previleges:</label>

              <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Default checkbox
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        Checked checkbox
                    </label>
                </div>

              <span class="text-danger">Error message</span>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Create & Send</button>
        </div>
      </form>
    </div>
  </div>
</div>
