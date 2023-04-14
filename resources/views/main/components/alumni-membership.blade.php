<section id="alumni-member-sec">
    <div class="alumni-member-wrapper">
        @if(Auth::user()->alumni_mem_applied)
            <main class="already_applied">
                <div class="content">
                    <i class="fas fa-check-circle"></i>
                    <span>You have already applied for an Alumni Membership</span>
                </div>
            </main>
        @else
        <h2>Application for Alumni Membership</h2>
        <p>Please write the information legibly</p>
        <hr style="">
        <form action="home-alumni-membership-post" enctype="multipart/form-data" id="alumni_mem_form" method="post">
        @csrf
        <div class="fields">
            <label for="message-text" class="">Name: <span class="sub-name">(ex: CERO, JOSENITO A.)</span> </label>
            <input type="text" class="" id="name" name="name" placeholder="Enter your name" value="{{ Auth::user()->last_name }}, {{ Auth::user()->first_name }} {{ Auth::user()->middle_name }}"></input>
            <span class="error-text" id="error_name"></span>
        </div>

        <div class="fields">
            <label for="message-text" class="">Address: <span></span> </label>
            <input type="text" class="" id="address" name="address" placeholder="Enter your address" value="{{ Auth::user()->address }}"></input>
            <span class="error-text" id="error_add"></span>
        </div>

        <div class="group">
            
            <div class="fields">
                <label for="message-text" class="">Birthday: <span></span> </label>
                <input type="date" class="" id="bday" name="bday" placeholder="Enter your Birthday"></input>
                <span class="error-text" id="error_bday"></span>
            </div>

            <div class="fields">
                <label for="message-text" class="">Contact No. : <span></span> </label>
                <input type="number" class="" id="con_num" name="con_num" placeholder="Enter your number"></input>
                <span class="error-text" id="error_num"></span>
            </div>

            <div class="fields">
                <label for="message-text" class="">FB Account: <span></span> </label>
                <input type="text" class="" id="fb" name="fb" placeholder="Enter your facebook account"></input>
                <span class="error-text" id="error_fb"></span>

            </div>
            
        </div>

        <div class="pay_med_wrapper">

            <span class="pay_med_title">Payment Method</span>

            <div class="group pay_med">

                <div class="radio-field">
                    <input type="radio" name="pay_med" id="opt1" value="Pay Cash"checked>
                    <label for="opt1">
                        Pay Using Cash
                    </label>
                </div>
                <div class="radio-field">
                    <input type="radio" name="pay_med" id="opt2" value="Pay G-Cash">
                    <label for="opt2">
                        Pay Using G-Cash
                    </label>
                </div>
            </div>

            <div class="pay_med_content">
                <span class="error-text" id="errorradio"></span>
                <div id="radio1-content">
                    <span>If you are paying cash proceed to Alumni Office in BISU-Bilar for payment.</span>
                </div>

                <div id="radio2-content" style="display: none;">
                    <div>
                        <img src="/images/qr.png" alt="" srcset="">
                    </div>

                    <div>
                        <div class="pay_med_text">
                            <!-- <span><strong>Scan QR</strong></span> -->
                            <span><strong>Scan QR</strong> or <strong>09127725518 (John Christian B.)</strong></span>
                        </div>

                        <div class="pay_med_input">
                            <label for="message-text" class="">Enter Reference #: <span></span> </label>
                            <input type="number" class="" id="ref" name="ref" placeholder="Enter G-Cash reference no."></input>
                            <span class="error-text" id="error_ref"></span>
                        </div>
                    </div>

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

        
        <button type="submit" id="submit_membership">SUBMIT</button>
    </form>
    </div>
    @endif
</section>