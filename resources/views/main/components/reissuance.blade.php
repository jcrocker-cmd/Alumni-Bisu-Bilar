<section id="alumni-reissuance-sec">
    <div class="overlay">
        <div class="alumni-reissuance-wrapper">
            <h2>Alumni ID Reissuance</h2>
            <p>Please write the information legibly</p>
            <hr style="">
            <form action="home-reissuance-post" method="post">
            @csrf
            <div class="fields">
                <div class="group">
                    <div class="input-field">
                        <label for="message-text" class="">Name of Alumni : <span></span> </label>
                        <input type="text" class="" id="message-text" placeholder="Please enter your name" name="name" value="{{old('name')}}"></input>
                        <span class="error-text">Error message</span>
                    </div>

                    <div class="input-field">
                        <label for="message-text" class="">ID No. : <span></span> </label>
                        <input type="number" class="" id="message-text" placeholder="Please enter ID no" name="id_no"></input>
                        <span class="error-text">@error('id_no') {{$message}} @enderror</span>
                    </div>

                    <div class="input-field">
                        <label for="message-text" class="">Degree : <span></span> </label>
                        <input type="text" class="" id="message-text" placeholder="Please enter your Degree" name="degree"></input>
                        <span class="error-text">Error message</span>
                    </div>

                </div>

                <div class="group">
                    <div class="input-field">
                        <label for="message-text" class="">Reason : <span></span> </label>
                        <input type="text" class="" id="message-text" placeholder="Enter your Reason" name="reason"></input>
                        <span class="error-text">Error message</span>
                    </div>

                    <div class="input-field">
                        <label for="message-text" class="">Or No. : <span></span> </label>
                        <input type="text" class="" id="message-text" placeholder="Enter your OR no." name="or_no"></input>
                        <span class="error-text">Error message</span>
                    </div>
                </div>
            </div>

                <div class="addphoto">
                    <img src="images/LOGO.png"
                    id="change-img-add" style="object-fit: cover;" >
                    <p>Add your Signature</p>
                </div>

                <div class="img-button mt-3">
                    <input type="file" name="photo" id="addphotoBtn" accept="image/jpg, image/jpeg, image/png" value="{{ old('photo') }}" hidden>
                    <button onclick ="addPhoto()" type="button" class="addphoto-btn" id="addphotoBtn">Choose Image</button>
                </div>

            <button type="submit">SUBMIT</button>
        </form>
        </div>
    </div>
</section>