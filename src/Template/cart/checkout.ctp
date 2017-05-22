<div class="page-heading">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="page-title">
					<h2>Checkout</h2>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- BEGIN Main Container col2-right -->
<div class="main-container col2-right-layout">
	<div class="main container">
		<div class="row">
			<section class="col-main col-sm-9 wow bounceInUp animated animated"
				style="visibility: visible;">

				<ol class="one-page-checkout" id="checkoutSteps">
					<li id="opc-billing" class="section allow active">
						<div class="step-title">
							<span class="number">1</span>
							<h3 class="one_page_heading">Delivery Address</h3>
						</div>
						<div id="err_1" class="step a-item error-div"></div>
						<div id="checkout-step-billing" class="step a-item">
							<form id="co-billing-form" action="">
								<fieldset class="group-select">
									<ul class="">
										<li class="wide"><label for="address_id">Select a
												delivery address from your address book or enter a new
												address.</label> <br>
											<div class="input-box">
												<select name="address_id"
													id="address_id" class="address-select" title=""
													>
                          
                            <?php foreach ($address_book as $address):?>
                            <option value="<?php echo $address['id'];?>"
														<?php if($get_checkout['delivery_address']['id']==$address['id']){echo 'checked';}?>><?php echo $address['address'];?></option>
                            <?php endforeach;?>
                            
                          </select>
											</div></li>
										<li id="billing-new-address-form" style="display: none;">
											<fieldset>
												
												<ul>

													<li class="fields">
														<div class="input-box">
															<label for="street_number">Street Number<em
																class="required">*</em>
															</label> <input type="text" id="street_number"
																name="street_number" value="" title="street_number"
																class="input-text ">
														</div>
													</li>
													<li class="wide"><label for="street_address">Street
															Address<em class="required">*</em>
													</label> <br> <input type="text" title="street_address"
														name="street_address" id="street_address"
														class="input-text  required-entry"></li>
													<li class="fields">
														<div class="input-box">
															<label for="city">City<em class="required">*</em></label>
															<input type="text" title="city" name="city"
																class="input-text  required-entry" id="city">
														</div>

														<div class="input-box">
															<label for="country">Country<em
																class="required">*</em></label> <select
																name="country" id="country"
																class="validate-select" title="country">
																<option value=""></option>
																<option value="AF">Afghanistan</option>
																<option value="AX">Åland Islands</option>
																<option value="AL">Albania</option>
																<option value="DZ">Algeria</option>
																<option value="AS">American Samoa</option>
																<option value="AD">Andorra</option>
																<option value="AO">Angola</option>
																<option value="AI">Anguilla</option>
																<option value="AQ">Antarctica</option>
																<option value="AG">Antigua and Barbuda</option>
																<option value="AR">Argentina</option>
																<option value="AM">Armenia</option>
																<option value="AW">Aruba</option>
																<option value="AU">Australia</option>
																<option value="AT">Austria</option>
																<option value="AZ">Azerbaijan</option>
																<option value="BS">Bahamas</option>
																<option value="BH">Bahrain</option>
																<option value="BD">Bangladesh</option>
																<option value="BB">Barbados</option>
																<option value="BY">Belarus</option>
																<option value="BE">Belgium</option>
																<option value="BZ">Belize</option>
																<option value="BJ">Benin</option>
																<option value="BM">Bermuda</option>
																<option value="BT">Bhutan</option>
																<option value="BO">Bolivia</option>
																<option value="BA">Bosnia and Herzegovina</option>
																<option value="BW">Botswana</option>
																<option value="BV">Bouvet Island</option>
																<option value="BR">Brazil</option>
																<option value="IO">British Indian Ocean Territory</option>
																<option value="VG">British Virgin Islands</option>
																<option value="BN">Brunei</option>
																<option value="BG">Bulgaria</option>
																<option value="BF">Burkina Faso</option>
																<option value="BI">Burundi</option>
																<option value="KH">Cambodia</option>
																<option value="CM">Cameroon</option>
																<option value="CA">Canada</option>
																<option value="CV">Cape Verde</option>
																<option value="KY">Cayman Islands</option>
																<option value="CF">Central African Republic</option>
																<option value="TD">Chad</option>
																<option value="CL">Chile</option>
																<option value="CN">China</option>
																<option value="CX">Christmas Island</option>
																<option value="CC">Cocos [Keeling] Islands</option>
																<option value="CO">Colombia</option>
																<option value="KM">Comoros</option>
																<option value="CG">Congo - Brazzaville</option>
																<option value="CD">Congo - Kinshasa</option>
																<option value="CK">Cook Islands</option>
																<option value="CR">Costa Rica</option>
																<option value="CI">Côte d’Ivoire</option>
																<option value="HR">Croatia</option>
																<option value="CU">Cuba</option>
																<option value="CY">Cyprus</option>
																<option value="CZ">Czech Republic</option>
																<option value="DK">Denmark</option>
																<option value="DJ">Djibouti</option>
																<option value="DM">Dominica</option>
																<option value="DO">Dominican Republic</option>
																<option value="EC">Ecuador</option>
																<option value="EG">Egypt</option>
																<option value="SV">El Salvador</option>
																<option value="GQ">Equatorial Guinea</option>
																<option value="ER">Eritrea</option>
																<option value="EE">Estonia</option>
																<option value="ET">Ethiopia</option>
																<option value="FK">Falkland Islands</option>
																<option value="FO">Faroe Islands</option>
																<option value="FJ">Fiji</option>
																<option value="FI">Finland</option>
																<option value="FR">France</option>
																<option value="GF">French Guiana</option>
																<option value="PF">French Polynesia</option>
																<option value="TF">French Southern Territories</option>
																<option value="GA">Gabon</option>
																<option value="GM">Gambia</option>
																<option value="GE">Georgia</option>
																<option value="DE">Germany</option>
																<option value="GH">Ghana</option>
																<option value="GI">Gibraltar</option>
																<option value="GR">Greece</option>
																<option value="GL">Greenland</option>
																<option value="GD">Grenada</option>
																<option value="GP">Guadeloupe</option>
																<option value="GU">Guam</option>
																<option value="GT">Guatemala</option>
																<option value="GG">Guernsey</option>
																<option value="GN">Guinea</option>
																<option value="GW">Guinea-Bissau</option>
																<option value="GY">Guyana</option>
																<option value="HT">Haiti</option>
																<option value="HM">Heard Island and McDonald Islands</option>
																<option value="HN">Honduras</option>
																<option value="HK">Hong Kong SAR China</option>
																<option value="HU">Hungary</option>
																<option value="IS">Iceland</option>
																<option value="IN">India</option>
																<option value="ID">Indonesia</option>
																<option value="IR">Iran</option>
																<option value="IQ">Iraq</option>
																<option value="IE">Ireland</option>
																<option value="IM">Isle of Man</option>
																<option value="IL">Israel</option>
																<option value="IT">Italy</option>
																<option value="JM">Jamaica</option>
																<option value="JP">Japan</option>
																<option value="JE">Jersey</option>
																<option value="JO">Jordan</option>
																<option value="KZ">Kazakhstan</option>
																<option value="KE">Kenya</option>
																<option value="KI">Kiribati</option>
																<option value="KW">Kuwait</option>
																<option value="KG">Kyrgyzstan</option>
																<option value="LA">Laos</option>
																<option value="LV">Latvia</option>
																<option value="LB">Lebanon</option>
																<option value="LS">Lesotho</option>
																<option value="LR">Liberia</option>
																<option value="LY">Libya</option>
																<option value="LI">Liechtenstein</option>
																<option value="LT">Lithuania</option>
																<option value="LU">Luxembourg</option>
																<option value="MO">Macau SAR China</option>
																<option value="MK">Macedonia</option>
																<option value="MG">Madagascar</option>
																<option value="MW">Malawi</option>
																<option value="MY">Malaysia</option>
																<option value="MV">Maldives</option>
																<option value="ML">Mali</option>
																<option value="MT">Malta</option>
																<option value="MH">Marshall Islands</option>
																<option value="MQ">Martinique</option>
																<option value="MR">Mauritania</option>
																<option value="MU">Mauritius</option>
																<option value="YT">Mayotte</option>
																<option value="MX">Mexico</option>
																<option value="FM">Micronesia</option>
																<option value="MD">Moldova</option>
																<option value="MC">Monaco</option>
																<option value="MN">Mongolia</option>
																<option value="ME">Montenegro</option>
																<option value="MS">Montserrat</option>
																<option value="MA">Morocco</option>
																<option value="MZ">Mozambique</option>
																<option value="MM">Myanmar [Burma]</option>
																<option value="NA">Namibia</option>
																<option value="NR">Nauru</option>
																<option value="NP">Nepal</option>
																<option value="NL">Netherlands</option>
																<option value="AN">Netherlands Antilles</option>
																<option value="NC">New Caledonia</option>
																<option value="NZ">New Zealand</option>
																<option value="NI">Nicaragua</option>
																<option value="NE">Niger</option>
																<option value="NG">Nigeria</option>
																<option value="NU">Niue</option>
																<option value="NF">Norfolk Island</option>
																<option value="MP">Northern Mariana Islands</option>
																<option value="KP">North Korea</option>
																<option value="NO">Norway</option>
																<option value="OM">Oman</option>
																<option value="PK">Pakistan</option>
																<option value="PW">Palau</option>
																<option value="PS">Palestinian Territories</option>
																<option value="PA">Panama</option>
																<option value="PG">Papua New Guinea</option>
																<option value="PY">Paraguay</option>
																<option value="PE">Peru</option>
																<option value="PH">Philippines</option>
																<option value="PN">Pitcairn Islands</option>
																<option value="PL">Poland</option>
																<option value="PT">Portugal</option>
																<option value="PR">Puerto Rico</option>
																<option value="QA">Qatar</option>
																<option value="RE">Réunion</option>
																<option value="RO">Romania</option>
																<option value="RU">Russia</option>
																<option value="RW">Rwanda</option>
																<option value="BL">Saint Barthélemy</option>
																<option value="SH">Saint Helena</option>
																<option value="KN">Saint Kitts and Nevis</option>
																<option value="LC">Saint Lucia</option>
																<option value="MF">Saint Martin</option>
																<option value="PM">Saint Pierre and Miquelon</option>
																<option value="VC">Saint Vincent and the Grenadines</option>
																<option value="WS">Samoa</option>
																<option value="SM">San Marino</option>
																<option value="ST">São Tomé and Príncipe</option>
																<option value="SA">Saudi Arabia</option>
																<option value="SN">Senegal</option>
																<option value="RS">Serbia</option>
																<option value="SC">Seychelles</option>
																<option value="SL">Sierra Leone</option>
																<option value="SG">Singapore</option>
																<option value="SK">Slovakia</option>
																<option value="SI">Slovenia</option>
																<option value="SB">Solomon Islands</option>
																<option value="SO">Somalia</option>
																<option value="ZA">South Africa</option>
																<option value="GS">South Georgia and the South Sandwich
																	Islands</option>
																<option value="KR">South Korea</option>
																<option value="ES">Spain</option>
																<option value="LK" selected="selected">Sri Lanka</option>
																<option value="SD">Sudan</option>
																<option value="SR">Suriname</option>
																<option value="SJ">Svalbard and Jan Mayen</option>
																<option value="SZ">Swaziland</option>
																<option value="SE">Sweden</option>
																<option value="CH">Switzerland</option>
																<option value="SY">Syria</option>
																<option value="TW">Taiwan</option>
																<option value="TJ">Tajikistan</option>
																<option value="TZ">Tanzania</option>
																<option value="TH">Thailand</option>
																<option value="TL">Timor-Leste</option>
																<option value="TG">Togo</option>
																<option value="TK">Tokelau</option>
																<option value="TO">Tonga</option>
																<option value="TT">Trinidad and Tobago</option>
																<option value="TN">Tunisia</option>
																<option value="TR">Turkey</option>
																<option value="TM">Turkmenistan</option>
																<option value="TC">Turks and Caicos Islands</option>
																<option value="TV">Tuvalu</option>
																<option value="UG">Uganda</option>
																<option value="UA">Ukraine</option>
																<option value="AE">United Arab Emirates</option>
																<option value="GB">United Kingdom</option>
																<option value="US">United States</option>
																<option value="UY">Uruguay</option>
																<option value="UM">U.S. Minor Outlying Islands</option>
																<option value="VI">U.S. Virgin Islands</option>
																<option value="UZ">Uzbekistan</option>
																<option value="VU">Vanuatu</option>
																<option value="VA">Vatican City</option>
																<option value="VE">Venezuela</option>
																<option value="VN">Vietnam</option>
																<option value="WF">Wallis and Futuna</option>
																<option value="EH">Western Sahara</option>
																<option value="YE">Yemen</option>
																<option value="ZM">Zambia</option>
																<option value="ZW">Zimbabwe</option>
															</select>
														</div>
													</li>
													<li class="fields">
														<div class="input-box">
															<label for="phone_number">Phone<em
																class="required">*</em></label> <input type="text"
																name="phone_number" value="" title="phone_number"
																class="input-text  required-entry"
																id="phone_number">
														</div> 
												</ul>
												

												<script>
 function showDiv()
    {
        
            if(document.getElementById('text1').style.display == "") 
            {
              document.getElementById('text1').style.display = "none";
              document.getElementById('text2').style.display = "none";
  
            }
            else
            {
                document.getElementById('text1').style.display = "";
            }
          

       
        
    }
    </script>
											</fieldset>
										</li>

									</ul>
									<div class="buttons-set" id="billing-buttons-container">
										<p class="required">* Required Fields</p>
										<button type="button" title="Continue" class="button continue"
											onClick="">
											<span>Continue</span>
										</button>
										<span class="please-wait" id="billing-please-wait"
											style="display: none;"> <?php echo $this->Html->image('opc-ajax-loader.gif',['alt'=>'Loading next step...','title'=>'Loading next step...','class'=>'v-middle']); ?> Loading next step... </span>
									</div>
								</fieldset>
							</form>

						</div>
					</li>
					<li id="opc-shipping" class="section">
						<div class="step-title">
							<span class="number">2</span>
							<h3 class="one_page_heading">Delivery Date/Time</h3>
						</div>
						<div id="err_2" class="step a-item error-div"></div>
						<div id="checkout-step-shipping" class="step a-item"
							style="display: none;">
							<form action="" id="co-shipping-form">
								<ul class="">

									<li id="shipping-new-address-form" style="display: block;">
										<fieldset class="group-select">
											<ul>
												<li class="fields">
													<div class="customer-name">
														<div class="input-box name-firstname">
															<label for="delivery_date">Date<span
																class="required">*</span></label>
															<div class="input-box1">
																<input type="text" id="delivery_date"
																	name="delivery_date" value=""
																	title="delivery_date"
																	class="input-text required-entry"
																	>
															</div>
														</div>
														<div class="input-box name-lastname bootstrap-timepicker">
															<label for="delivery_time">Time<span class="required">*</span></label>
															<div class="input-box1">
																<input type="text" id="delivery_time"
																	name="delivery_time" value="" title="delivery_time"
																	class="input-text required-entry delivery_time"
																	>
															</div>
														</div>
													</div>
												</li>
											</ul>
										</fieldset>
									</li>

								</ul>
								<div class="buttons-set" id="shipping-buttons-container">
									<p class="required">* Required Fields</p>
									<button type="button" class="button continue" title="Continue"
										onClick="">
										<span>Continue</span>
									</button>
									<a href="#" onClick="return false;"
										class="back"><small>« </small>Back</a> <span
										id="shipping-please-wait" class="please-wait"
										style="display: none;"> <?php echo $this->Html->image('opc-ajax-loader.gif',['alt'=>'Loading next step...','title'=>'Loading next step...','class'=>'v-middle']); ?> Loading next step... </span>
								</div>
							</form>

						</div>
					</li>


					<li id="opc-review" class="section">
						<div class="step-title">
							<span class="number">3</span>
							<h3 class="one_page_heading">Complete Checkout</h3>
						</div>
						<div id="err_3" class="step a-item error-div"></div>
						<div id="checkout-step-review" class="step a-item"
							style="display: none;">
							<div class="order-review" id="checkout-review-load">
								<!-- Content loaded dynamically -->
								<div class="buttons-set" id="shipping-buttons-container">
									
									<button type="button" class="button continue" title="Continue"
										onClick="">
										<span>Complete Checkout</span>
									</button>
									<a href="#" onClick="return false;"
										class="back"><small>« </small>Back</a> <span
										id="review-please-wait" class="please-wait"
										style="display: none;"> <?php echo $this->Html->image('opc-ajax-loader.gif',['alt'=>'Loading next step...','title'=>'Loading next step...','class'=>'v-middle']); ?> Loading next step... </span>
								</div>
								
							</div>
						</div>
					</li>

				</ol>

				<br>
			</section>
			<aside
				class="col-right sidebar col-sm-3 wow bounceInUp animated animated"
				style="visibility: visible;">
				<div id="checkout-progress-wrapper">
					<div class="block block-progress">
						<div class="block-title">Your Checkout</div>
						<div class="block-content">
							<dl>
								<div id="billing-progress-opcheckout">
									<dt>Billing Address</dt>
								</div>
								<div id="shipping-progress-opcheckout">
									<dt>Shipping Address</dt>
								</div>
								<div id="shipping_method-progress-opcheckout">
									<dt>Shipping Method</dt>
								</div>
								<div id="payment-progress-opcheckout">
									<dt>Payment Method</dt>
								</div>
							</dl>
						</div>
					</div>
				</div>
			</aside>
			<!--col-right sidebar-->
		</div>
		<!--row-->
	</div>
	<!--main-container-inner-->
</div>
<!--main-container col2-left-layout-->


<div class="our-features-box wow bounceInUp animated animated">
	<div class="container">
		<ul>
			<li>
				<div class="feature-box free-shipping">
					<div class="icon-truck"></div>
					<div class="content">FREE SHIPPING on order over LKR 99</div>
				</div>
			</li>
			<li>
				<div class="feature-box need-help">
					<div class="icon-support"></div>
					<div class="content">Need Help +1 800 123 1234</div>
				</div>
			</li>
			<li>
				<div class="feature-box money-back">
					<div class="icon-money"></div>
					<div class="content">Money Back Guarantee</div>
				</div>
			</li>
			<li class="last">
				<div class="feature-box return-policy">
					<div class="icon-return"></div>
					<div class="content">30 days return Service</div>
				</div>
			</li>
		</ul>
	</div>
</div>
<!-- For version 1,2,3,4,6 -->

<?php 
  //http://stackoverflow.com/questions/8761713/jquery-ajax-loading-image
  ?>
  