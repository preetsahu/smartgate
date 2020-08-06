<div class="col-md-12">
	<div class="error"></div>
	<div class="success"></div>
	<form id="frm-mobile-verification">
		<div class="form-row">
			<label>OTP is sent to Your Mobile Number</label>		
		</div>

		<div class="form-row">
			<input type="number" min="000000" max="999999" id="mobileOtp" class="form-input" placeholder="Enter the OTP">		
		</div>

		<div class="row">
			<button id="verify" class="btn btn-md btn-block" style="background-color:#1AB394;color:white" type="button" value="Verify" onClick="verifyOTP();">Verify</button>
			<!-- <input id="verify" type="button" class="btnVerify" value="Verify" onClick="verifyOTP();">		 -->
		</div>
	</form>
</div>
