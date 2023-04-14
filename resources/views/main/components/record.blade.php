<section id="record_section">

    <span class="record_title">My Records</span>

    <div class="alumniid_application">
        <div class="alumniid_application_sec">
        @if(Auth::user()->alumni_id_applied)
        <span class="text mb-2"><strong> Alumni ID Application</strong></span>
            <div class="table-responsive pb-3" style="width: 100%;">
                <table class="table align-middle mb-0 bg-light table-bordered table-hover display responsive nowrap" id="dbTable" style="width: 100%;">
                    <thead class="table text-black" >
                        <tr>
                            <th scope="col">Student</th>
                            <th scope="col">ALumni #</th>
                            <th scope="col">ID #</th>
                            <th scope="col">Address</th>
                            <th scope="col">Bday</th>
                            <th scope="col">Course</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumni_id as $item)
                        <tr>
                            <td>
                            {{ $item->name}}
                            </td>
                            <td>
                            {{ $item->a_no}}
                            </td>
                            <td>
                            {{ $item->id_no}}
                            </td>
                            <td>
                            {{ $item->address}}
                            </td>
                            <td>
                            {{ $item->bday}}
                            </td>
                            <td>
                            {{ $item->course}}
                            </td>


                            <td>
                            <a href="#" title="View" class="text-dark actions action-view" data-bs-toggle="modal" data-bs-target="#viewModal_alumni_id"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="#" title="Edit" class="actions action-edit" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)" class="text-danger actions action-delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                @else

            <span class="text">Not yet Applied for Alumni ID. <a href="/home-alumni-id"> Apply Now!</a></span>
            @endif
        </div>
    </div>

    <div class="alumnimem_application">
    <div class="alumnimem_application_sec">
        @if(Auth::user()->alumni_mem_applied)
        <span class="text mb-2"><strong> Alumni Membership Application</strong></span>
            <div class="table-responsive pb-3" style="width: 100%;">
                <table class="table align-middle mb-0 bg-light table-bordered table-hover display responsive nowrap" id="dbTable" style="width: 100%;">
                    <thead class="table text-black" >
                        <tr>
                            <th scope="col">Student</th>
                            <th scope="col">ALumni #</th>
                            <th scope="col">ID #</th>
                            <th scope="col">Address</th>
                            <th scope="col">Bday</th>
                            <th scope="col">Course</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumni_id as $item)
                        <tr>
                            <td>
                            {{ $item->name}}
                            </div>
                            </td>
                            <td>
                            {{ $item->a_no}}
                            </td>
                            <td>
                            {{ $item->id_no}}
                            </td>
                            <td>
                            {{ $item->address}}
                            </td>
                            <td>
                            {{ $item->bday}}
                            </td>
                            <td>
                            {{ $item->course}}
                            </td>


                            <td>
                            <a href="#" title="View" class="text-dark actions action-view" data-id="{{ $item->id }}"  data-bs-toggle="modal" data-bs-target="#viewModal"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="#" title="Edit" class="actions action-edit" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)" class="text-danger actions action-delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                @else

            <span class="text">Not yet Applied for Alumni Membership. <a href="/home-alumni-membership"> Apply Now!</a></span>
            @endif
        </div>

    </div>

    <div class="reissueance_application">

    <div class="reissueance_application_sec">
        @if(Auth::user()->reissueance_applied)
        <span class="text mb-2"><strong>Reissueance of ID</strong></span>
            <div class="table-responsive pb-3" style="width: 100%;">
                <table class="table align-middle mb-0 bg-light table-bordered table-hover display responsive nowrap" id="dbTable" style="width: 100%;">
                    <thead class="table text-black" >
                        <tr>
                            <th scope="col">Student</th>
                            <th scope="col">ALumni #</th>
                            <th scope="col">ID #</th>
                            <th scope="col">Address</th>
                            <th scope="col">Bday</th>
                            <th scope="col">Course</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumni_id as $item)
                        <tr>
                            <td>
                            {{ $item->name}}
                            </td>
                            <td>
                            {{ $item->a_no}}
                            </td>
                            <td>
                            {{ $item->id_no}}
                            </td>
                            <td>
                            {{ $item->address}}
                            </td>
                            <td>
                            {{ $item->bday}}
                            </td>
                            <td>
                            {{ $item->course}}
                            </td>


                            <td>
                            <a href="#" title="View" class="text-dark actions action-view" data-bs-toggle="modal" data-bs-target="#viewModal"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="#" title="Edit" class="actions action-edit" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)" class="text-danger actions action-delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                @else

            <span class="text">You have no Reissueance. <a href="/home-reissuance"> Apply Now!</a></span>
            @endif
        </div>

    </div>


</section>



<!-- MODAL FOR VIEW  ALUMNI ID -->

<div class="modal fade" id="viewModal_alumni_id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 100%;">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Alumni ID</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
        <table class="table" cellspacing="0" cellpadding="0" style="border: 1px solid #003049;"  id="dbTable">
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