@if (session('accountstatus'))
  <h6 class="alert alert-success my-0" id="myAlert" style="font-size: 14px;">{{ session('accountstatus') }}</h6>
@endif

@if (session('successpassword'))
  <h6 class="alert alert-success my-0" id="myAlert" style="font-size: 14px;">{{ session('successpassword') }}</h6>
@endif

@if (session('failpassword'))
  <h6 class="alert alert-danger my-0" id="myAlert" style="font-size: 14px;">{{ session('failpassword') }}</h6>
@endif

<section id="settings" class="px-3 py-4">
    <h5 class="pb-2">Settings</h5>

    <div class="settings-wrapper bg-white px-3 py-4">
        <h6>Edit profile Information</h6>
        <hr>

        <div class="settings-row-1 bg-white">
            <div class="settings-col-1">
                <div class="mb-2" style="width: 100%;">
                    <label for="exampleFormControlInput1" class="form-label">First Name</label>
                    <input type="email" class="form-control bg-white" id="exampleFormControlInput1" placeholder="First Name">
                </div>

                <div class="mb-2" style="width: 100%;">
                    <label for="exampleFormControlInput1" class="form-label">Middle Name</label>
                    <input type="email" class="form-control bg-white" id="exampleFormControlInput1" placeholder="Middle Name">
                </div>

                <div class="mb-2" style="width: 100%;">
                    <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                    <input type="email" class="form-control bg-white" id="exampleFormControlInput1" placeholder="Last Name">
                </div>
                
                <div class="mb-2" style="width: 100%;">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input type="email" class="form-control bg-white" id="exampleFormControlInput1" placeholder="Edit Username">
                </div>
            </div>

            <div class="settings-col-2">
                <div class="addphoto">
                    <img src="images/LOGO.png"
                    id="change-img-add" style="object-fit: cover;">
                    <!-- <p class="text-center mt-3">Change Profile Photo</p> -->
                </div>

                <div class="img-button mt-3">
                    <input type="file" name="carphoto" id="addphotoBtn" accept="image/jpg, image/jpeg, image/png" hidden>
                    <button onclick ="addPhoto()" type="button" class="addphoto-btn btn btn-primary" id="addphotoBtn">Choose Image</button>
                </div>
            </div>
        </div>

        <div class="mt-2 password-button text-right">
            <button type="submit" class="btn btn-success" id="default-btn">Update Information</button>
        </div>

    </div>


    <div class="settings-wrapper bg-white px-3 py-4 mt-4">
        <h6 class="mt-3">Edit Password</h6>
        <hr>

        <form action="/change-admin-password" method="post" class="py-2">
        @csrf
        @method('put')
        <div class="mb-3 old_password">
            <div class="input-group">
                <input type="password" class="form-control border-right-0" placeholder="Old Password" id="oldPassword" name="old_password">
                <span class="input-group-text"><i class="far fa-eye" id="togglePassword1" style="cursor: pointer;"></i></span>
            </div>
            @if($errors->any('old_password'))
                <p class="my-0 text-danger" style="font-size: 12px;">{{$errors->first('old_password')}}</p>
            @endif
        </div>

        <div class="mb-3 new_password">
            <div class="input-group">
                <input type="password" class="form-control border-right-0" placeholder="New Password" id="newPassword" name="new_password">
                <span class="input-group-text"><i class="far fa-eye" id="togglePassword2" style="cursor: pointer;"></i></span>
            </div>
            @if($errors->any('new_password'))
                <p class="my-0 text-danger" style="font-size: 12px;">{{$errors->first('new_password')}}</p>
            @endif
        </div>

        <div class="mb-3 confirm_password">
            <div class="input-group">
                <input type="password" class="form-control border-right-0" placeholder="Confirm Password" id="confirmPassword" name="confirm_password">
                <span class="input-group-text"><i class="far fa-eye" id="togglePassword3" style="cursor: pointer;"></i></span>
            </div>
            @if($errors->any('confirm_password'))
                <p class="my-0 text-danger" style="font-size: 12px;">{{$errors->first('confirm_password')}}</p>
            @endif
        </div>


        <div class="mb-2 password-button justify-content-right">
        <button type="submit" class="btn btn-success" id="default-btn">Update Password</button>
        </div>

        </form>
    </div>



</section>