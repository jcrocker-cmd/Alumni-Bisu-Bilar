<section id="alumni-member-sec">
    <div class="alumni-member-wrapper">
        <h2>Application for Alumni Membership</h2>
        <p>Please write the information legibly</p>
        <hr style="">

        <div class="fields">
            <label for="message-text" class="">Name: <span class="sub-name">(ex: CERO, JOSENITO A.)</span> </label>
            <input type="text" class="" id="message-text" placeholder="Enter your name"></input>
            <span class="error-text">Error message</span>
        </div>

        <div class="fields">
            <label for="message-text" class="">Address: <span></span> </label>
            <input type="text" class="" id="message-text" placeholder="Enter your address"></input>
            <span class="error-text">Error message</span>
        </div>

        <div class="group">
            
            <div class="fields">
                <label for="message-text" class="">Birthday: <span></span> </label>
                <input type="date" class="" id="message-text" placeholder="Enter your Birthday"></input>
                <span class="error-text">Error message</span>
            </div>

            <div class="fields">
                <label for="message-text" class="">Contact No. : <span></span> </label>
                <input type="number" class="" id="message-text" placeholder="Enter your number"></input>
                <span class="error-text">Error message</span>
            </div>

            <div class="fields">
                <label for="message-text" class="">FB Account: <span></span> </label>
                <input type="text" class="" id="message-text" placeholder="Enter your facebook account"></input>
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

        
        <button type="submit">SUBMIT</button>

    </div>
</section>