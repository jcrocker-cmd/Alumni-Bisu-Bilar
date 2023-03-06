<section id="alumni-id-sec">
    <div class="overlay">
        <div class="alumni-id-wrapper">
            <h2>Application for Alumni ID</h2>
            <p>Please write the information legibly</p>
            <hr style="">
            <form action="home-alumni-id-post" enctype="multipart/form-data" id="alumni_id_form" method="post">
                @csrf
            <div class="fields">
                <div class="group">
                    <div class="input-field">
                        <label for="message-text" class="">Alumni ID No. : <span class="sub-name">(leave it blank)</span> </label>
                        <input type="text" class="" id="a_no" name="a_no" placeholder=""></input>
                        <span class="error-text" id="error_a_no"></span>
                    </div>

                    <div class="input-field">
                        <label for="id_no" class="">ID No. : <span class="sub-name">(Year Grauduated)</span> </label>
                        <select id="id_no" name="id_no">
                            <option value="">Select a year</option>
                            <?php
                            for ($i = 2010; $i <= 2050; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                        <span class="error-text" id="error_id_no"></span>

                    </div>
                </div>

                <div class="group">
                    <div class="input-field">
                        <label for="message-text" class="">Name: <span class="sub-name">(ex: CERO, JOSENITO A.)</span> </label>
                        <input type="text" class="" id="name" name="name"placeholder="Enter your name"></input>
                        <span class="error-text" id="error_name"></span>
                    </div>

                    <div class="input-field">
                        <label for="message-text" class="">Address: <span></span> </label>
                        <input type="text" class="" id="address" name="address" placeholder="Enter your address"></input>
                        <span class="error-text" id="error_add"></span>
                    </div>
                </div>

                <div class="group">
                    <div class="input-field">
                        <label for="message-text" class="">Birthday: <span></span> </label>
                        <input type="date" class="" id="bday" name="bday" placeholder="Enter your Birthday"></input>
                        <span class="error-text" id="error_bday"></span>

                    </div>

                    <div class="input-field">
                        <label for="message-text" class="">Course: <span></span> </label>
                        <input type="text" class="" id="course" name="course" placeholder="Enter your course"></input>
                        <span class="error-text" id="error_course"></span>
                    </div>
                </div>
            </div>

                <div class="addphoto">
                    <img src="images/signature.png"
                    id="change-img-add" style="object-fit: cover;">
                    <p>Add your Signature <span class="error-text" id="error_sig"></span></p>
                </div>

                <div class="img-button mt-3">
                    <input type="file" name="signature" id="addphotoBtn" accept="image/jpg, image/jpeg, image/png" hidden>
                    <button onclick ="addPhoto()" type="button" class="addphoto-btn" id="addphotoBtn">Choose Image</button>
                </div>

            <button type="submit" id="submit_alumni_id">SUBMIT</button>
            </form>
        </div>
    </div>
</section>