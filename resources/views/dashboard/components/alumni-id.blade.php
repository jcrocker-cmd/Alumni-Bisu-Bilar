<section class="all-vehicles-section">

@if (session('status'))
  <h6 class="alert alert-success my-0" id="myAlert" style="font-size: 14px;">{{ session('status') }}</h6>
@endif


    <div class="pb-3 d-flex justify-content-between px-3 pt-4">
    <h5 class="title">Alumni ID</h5>
    </div>

<div class="table-responsive px-3 pb-3" style="width: 100%;">

<table class="table align-middle mb-0 bg-light table-hover display responsive nowrap" id="dbTable" style="width: 100%;">
<thead class="table bg-primary text-white">
<tr>
  <th scope="col" class="col-3">Student</th>
  <th scope="col">Alumni No</th>
  <th scope="col">ID No</th>
  <th scope="col">Address</th>
  <th scope="col">Course</th>
  <th scope="col">Actions</th>
</tr>
</thead>
<tbody>
@foreach($alumni_id as $item)
 <tr>
  <td>
    <div class ="d-flex align-items-center">

    <div class="">
        <p class="fw-bold mb-1">{{ $item->name}}</p>
        <p class="text-muted mb-0">example@gmail.com</p>

    </div>
    </div>

  </td>
  <td>
    {{ $item->a_no}}
  </td>
  <td>{{ $item->id_no}}</td>
  
  <td>{{ $item->address}}</td>
  <td>{{ $item->course}}</td>
  <td>
  <a href="#" title="View" class="actions action-view" data-id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="fa fa-eye" aria-hidden="true"></i></a>
  
  @role(['Secretary','Super-Admin', 'Admin'])
  <a href="/delete_alumni_id/{{ $item->id }}" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)" class="actions action-delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
  @endrole

  </td>
  </tr>

  @endforeach

</tbody>
</table>





</div>





<div class="chart-wrapper px-3 pb-3">
  <div class="bg-light db-chart px-3 py-3 mt-4" style=" border-radius: 10px; width: 100%; ">
    <h5><strong>Alumni ID Graphical Reports</strong></h5>
    <canvas id="alumni_id_Chart" style=" margin: 0; padding: 0;"></canvas>

    <select id="display-selector">
      <option value="day" selected>Daily</option>
      <option value="week">Weekly</option>
      <option value="month" >Monthly</option>
      <option value="year" >Year</option>
    </select>

    <select id="chart-type-selector" onchange="chartType(this.value)">
      <option value="bar" selected>Bar Chart</option>
      <option value="line">Line Chart</option>
      <!-- <option value="pie">Pie Chart</option> -->
    </select>
  </div>
</div>




</section>




<!-- MODAL FOR VIEW  ALUMNI ID -->

<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 100%;">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">View Reissuance</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
        <table class="table" cellspacing="0" cellpadding="0" style="border: 1px solid #003049;">
          <thead class="table" style="background: #045597; color: white;">
            <tr>
            <th style="padding: 10px; text-align: left; width: 30%;">Reissuance Details</th>
            <th style="padding: 10px; text-align: left; width: 70%;"></th>
            </tr>
          </thead>
          <tbody>
            <tr style="border-bottom: 1px solid black;">
              <td style="padding: 10px;" >Alumni Id</td>
              <td style="padding: 10px;"><span id="view_a_no"></span></td>
            </tr>
            <tr style="border-bottom: 1px solid black;">
              <td style="padding: 10px;" >ID No</td>
              <td style="padding: 10px;"><span id="view_id_no"></span></td>
            </tr>
            <tr style="border-bottom: 1px solid black;">
              <td style="padding: 10px;" >Name</td>
              <td style="padding: 10px;"><span id="view_name"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Adress</td>
              <td style="padding: 10px;"><span id="view_address"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Birthday</td>
              <td style="padding: 10px;"><span id="view_bday"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Course</td>
              <td style="padding: 10px;"><span id="view_course"></span></td>
            </tr>
            <tr>
              <td style="padding: 10px;">Signature</td>
              <td style="padding: 10px;"><span id="view_sig"><img src="" style="width: 200px;"></span></td>
            </tr>
          </tbody>
        </table>

        <span><strong>Created at:</strong> <span id="view_date"></span></span>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>