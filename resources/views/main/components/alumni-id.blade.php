<section id="alumni-id-sec">
    <div class="overlay">
        <div class="alumni-id-wrapper">
            <h2>Application for Alumni ID</h2>
            <p>Please write the information legibly</p>
            <hr style="">

            <div class="fields">
                <div class="group">
                    <div class="input-field">
                        <label for="message-text" class="">Alumni ID No. : <span class="sub-name">(leave it blank)</span> </label>
                        <input type="text" class="" id="message-text" placeholder=""></input>
                        <span class="error-text">Error message</span>
                    </div>

                    <div class="input-field">
                        <label for="message-text" class="">ID No. : <span class="sub-name">(Year Grauduated)</span> </label>
                        <select id="message-text">
                            <option value="">Select a year</option>
                            <?php
                            for ($i = 2010; $i <= 2050; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                        <span class="error-text">Error message</span>

                    </div>
                </div>

                <div class="group">
                    <div class="input-field">
                        <label for="message-text" class="">Name: <span class="sub-name">(ex: CERO, JOSENITO A.)</span> </label>
                        <input type="text" class="" id="message-text" placeholder="Enter your name"></input>
                        <span class="error-text">Error message</span>
                    </div>

                    <div class="input-field">
                        <label for="message-text" class="">Address: <span></span> </label>
                        <input type="text" class="" id="message-text" placeholder="Enter your address"></input>
                        <span class="error-text">Error message</span>
                    </div>
                </div>

                <div class="group">
                    <div class="input-field">
                        <label for="message-text" class="">Birthday: <span></span> </label>
                        <input type="date" class="" id="message-text" placeholder="Enter your Birthday"></input>
                        <span class="error-text">Error message</span>

                    </div>

                    <div class="input-field">
                        <label for="message-text" class="">Course: <span></span> </label>
                        <input type="text" class="" id="message-text" placeholder="Enter your course"></input>
                        <span class="error-text">Error message</span>
                    </div>
                </div>
            </div>

                <div class="addphoto">
                    <img src="images/LOGO.png"
                    id="change-img-add" style="object-fit: cover;">
                    <p>Add your Signature</p>
                    <!-- <span class="error-text">Error message</span> -->
                </div>

                <div class="img-button mt-3">
                    <input type="file" name="carphoto" id="addphotoBtn" accept="image/jpg, image/jpeg, image/png" hidden>
                    <button onclick ="addPhoto()" type="button" class="addphoto-btn" id="addphotoBtn">Choose Image</button>
                </div>

            <button type="submit">SUBMIT</button>

        </div>
    </div>
</section>