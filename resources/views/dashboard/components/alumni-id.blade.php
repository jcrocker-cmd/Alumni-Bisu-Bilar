<section class="all-vehicles-section">

@if (session('status'))
  <h6 class="alert alert-success my-0" id="myAlert" style="font-size: 14px;">{{ session('status') }}</h6>
@endif


    <div class="pb-3 d-flex justify-content-between px-3 pt-4">
    <h5 class="">Alumni ID</h5>
    </div>

<div class="table-responsive px-3 pb-3">

<table class="table align-middle mb-0 bg-light table-hover" id="dbTable">
<thead class="table bg-primary text-white">
<tr>
  <th scope="col" class="col-3">Student</th>
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