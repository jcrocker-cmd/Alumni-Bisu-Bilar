<section class="announcement-section">

@if (session('status'))
  <h6 class="alert alert-success my-0" id="myAlert" style="font-size: 14px;">{{ session('status') }}</h6>
@endif


    <div class="pb-3 d-flex justify-content-between px-3 pt-4">
    <h5 class="">Announcements</h5>
    <a href="#" title="Add Announcement"><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i> Add Announcements</button></a>
    </div>

<div class="table-responsive px-3 pb-3">

<table class="table align-middle mb-0 bg-light table-hover" id="dbTable">
<thead class="table bg-primary text-white">
<tr>
  <th scope="col" class="col-sm-2">Subject</th>
  <th scope="col" class="col-7">Description</th>
  <th scope="col">Date</th>
  <th scope="col">Actions</th>
</tr>
</thead>
<tbody>
@foreach($announce as $item)
 <tr>
  <td>{{ $item->subject}}</td>
  
  <td>{{ $item->description}}</td>
  <td>{{ date('F j, Y', strtotime($item->date)) }}</td>
  <td>
  <a href="#" title="View" class="actions action-view"><i class="fa fa-eye" aria-hidden="true"></i></a>
  <a href="#" title="Edit" class="actions action-edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
  <a href="/delete_announcement/{{ $item->id }}" title="Delete" onclick="return confirm(&quot;Confirm delete?&quot;)" class="actions action-delete"><i class="fa fa-trash" aria-hidden="true"></i></a>

  </td>
  </tr>

@endforeach

</tbody>
</table>





</div>




</section>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

    <form action="post_announcement" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Announcements</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @csrf
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Subject:</label>
              <input type="text" class="form-control" id="recipient-name" name="subject">
              <span class="text-danger">Error message</span>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Description:</label>
              <textarea rows="5" class="form-control" id="message-text" name="description"></textarea>
              <span class="text-danger">Error message</span>

            </div>

            <div class="mb-3">
              <label for="message-text" class="col-form-label">Date:</label>
              <input type="date" class="form-control" name="date" id="">
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

