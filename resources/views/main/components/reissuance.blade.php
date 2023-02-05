<section id="alumni-reissuance-sec">
    <div class="overlay">
        <div class="alumni-reissuance-wrapper">
            <h2>Alimni Id Reissuance</h2>
            <p>Please write the information legibly</p>
            <hr style="">

            <div class="fields">
                <div class="group">
                    <div class="input-field">
                        <label for="message-text" class="">Name of Alumni : <span></span> </label>
                        <input type="text" class="" id="message-text" placeholder=""></input>
                    </div>

                    <div class="input-field">
                        <label for="message-text" class="">ID No. : <span></span> </label>
                        <input type="text" class="" id="message-text" placeholder=""></input>
                    </div>

                    <div class="input-field">
                        <label for="message-text" class="">Degree : <span></span> </label>
                        <input type="text" class="" id="message-text" placeholder=""></input>
                    </div>

                </div>

                <div class="group">
                    <div class="input-field">
                        <label for="message-text" class="">Reason : <span></span> </label>
                        <input type="text" class="" id="message-text" placeholder="Enter your name"></input>
                    </div>

                    <div class="input-field">
                        <label for="message-text" class="">Or No. : <span></span> </label>
                        <input type="text" class="" id="message-text" placeholder="Enter your address"></input>
                    </div>
                </div>
            </div>

                <div class="addphoto">
                    <img src="images/LOGO.png"
                    id="change-img-add" style="object-fit: cover;">
                    <p>Add your Signature</p>
                </div>

                <div class="img-button mt-3">
                    <input type="file" name="carphoto" id="addphotoBtn" accept="image/jpg, image/jpeg, image/png" hidden>
                    <button onclick ="addPhoto()" type="button" class="addphoto-btn" id="addphotoBtn">Choose Image</button>
                </div>

            <button type="submit">SUBMIT</button>

        </div>
    </div>
</section>