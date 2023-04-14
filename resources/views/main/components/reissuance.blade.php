<section id="alumni-reissuance-sec">
    <div class="overlay">
        <div class="alumni-reissuance-wrapper">

            @if(Auth::user()->reissueance_applied)
                <main class="already_applied">
                    <div class="content">
                        <i class="fas fa-check-circle"></i>
                        <span>You have already Re-issue you ID</span>
                    </div>
                </main>
            @else

            <h2>Alumni ID Reissuance</h2>
            <p>Please write the information legibly</p>
            <hr style="">
            <form action="home-reissuance-post" enctype="multipart/form-data" method="post" id="reissueance-from">
            @csrf
            <div class="fields">
                <div class="group">
                    <div class="input-field">
                        <label for="message-text" class="">Name of Alumni : <span></span> </label>
                        <input type="text" class="" id="name" placeholder="Please enter your name" name="name" value="{{ Auth::user()->last_name }}, {{ Auth::user()->first_name }} {{ Auth::user()->middle_name }}"></input>
                        <span class="error-text" id="error_name"></span>
                    </div>

                    <div class="input-field">
                        <label for="message-text" class="">ID No. : <span></span> </label>
                        <input type="number" class="" id="id_no" placeholder="Please enter ID no" name="id_no"></input>
                        <span class="error-text" id="error_id_no"></span>
                    </div>

                    <div class="input-field">
                        <label for="message-text" class="">Degree : <span></span> </label>
                        <input type="text" class="" id="degree" placeholder="Please enter your Degree" name="degree"></input>
                        <span class="error-text" id="error_degree"></span>
                    </div>

                </div>

                <div class="group">
                    <div class="input-field">
                        <label for="message-text" class="">Reason : <span></span> </label>
                        <input type="text" class="" id="reason" placeholder="Enter your Reason" name="reason"></input>
                        <span class="error-text" id="error_reason"></span>
                    </div>

                    <div class="input-field">
                        <label for="message-text" class="">Or No. : <span></span> </label>
                        <input type="number" class="" id="or_no" placeholder="Enter your OR no." name="or_no"></input>
                        <span class="error-text" id="error_or_no"></span>
                    </div>
                </div>
            </div>

                <div class="addphoto">
                    <img src="images/signature.png"
                    id="change-img-add" class="image" style="object-fit: cover;" draggable="true">
                    <p>Add your Signature <span class="error-text" id="error_sig"></span></p>
                    
                </div>

                <div class="img-button mt-3">
                    <input type="file" name="signature" id="addphotoBtn" class="signature" accept="image/jpg, image/jpeg, image/png" hidden>
                    <button onclick ="addPhoto()" type="button" class="addphoto-btn" id="addphotoBtn">Choose Image</button>
                </div>

            <button type="submit" id="submit_reissueance">SUBMIT</button>
        </form>
        </div>
        @endif
    </div>
</section>