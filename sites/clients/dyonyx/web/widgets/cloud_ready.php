<!-- Page Header -->
      <section class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll loaded dzsprx-readyall " data-options='{direction: "fromtop", animation_duration: 25, direction: "reverse"}'>
        <!-- Parallax Image -->
        <div class="divimage dzsparallaxer--target w-100 g-bg-cover g-bg-pos-bottom-center g-bg-bluegray-opacity-0_2--after" style="height: 130%; background-image: url(/img/bg/12.jpg);"></div>
        <!-- End Parallax Image -->

        <!-- Header Content -->
        <div class="container g-color-white text-center g-py-200">
          <h2 class="g-font-weight-700 g-font-size-65 text-uppercase">DYONYX</h2>
          <h3 class="h2 dyonyx g-font-weight-300 mb-0">How Ready Are You?</h3>
        </div>
        <!-- End Header Content -->
      </section>
      <!-- End Page Header -->

      <!-- Call to Action -->
      <section class="g-bg-secondary">
        <div class="container g-py-50">
          <div class="row justify-content-center">
            <div class="col-lg-12">
              <div class="u-heading-v2-3--bottom g-brd-primary g-mb-20">
                <h2 class="h3 u-heading-v2__title g-color-gray-dark-v2 text-uppercase g-font-weight-600">Is Your Organization Ready for Cloud Computing?</h2>
              </div>
              <p style="color:#1a508f;"><strong>Find out if your company qualifies<strong></p>
			  <p>DYONYX Cloud Solutions can run your entire business IT environment and offer you an affordable, flexible solution for storing data and connecting your offices and clients around the country and around the world.</p>
			  <p>Complete the form for a chance to win an Amazon gift card or an Amazon Echo Show.</p>
            </div>
          </div>
        </div>
      </section>
      <!-- End Call to Action -->

      <!-- Blog Grid Classic Blocks -->
      <div class="container g-py-30">
			<form  role="form" class="" id="questionnaire-form" accept-charset="UTF-8" >
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group has-feedback">
							<label for="first_name" class="control-label"><?php cms("FirstName", "First Name*", true); ?></label>
							<input type="text" class="form-control" id="first_name" autocomplete="on" name="first_name" placeholder="First Name" required data-msg-required="Please complete this required field." data-rule-pattern="(^[a-zA-Z\s]+$)" data-msg-pattern="Please use only letters (a-z) and spaces." tabindex="1" />
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group has-feedback">
							<label for="last_name" class="control-label"><?php cms("LastName", "Last Name*", true); ?></label>
							<input type="text" class="form-control"  id="last_name" autocomplete="on" name="last_name" placeholder="Last Name" required data-msg-required="Please complete this required field." tabindex="2" data-rule-pattern="(^[a-zA-Z\s]+$)" data-msg-pattern="Please use only letters (a-z) and spaces." tabindex="2" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group has-feedback">
							<label for="email" class="control-label"><?php cms("EmailAddress", "Email Address*", true); ?> </label>
							<input type="email" class="form-control" id="email" autocomplete="on" name="email" placeholder="Email" required  data-msg-required="Please complete this required field." data-rule-pattern="(^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$)" data-msg-pattern="Please enter valid email use only letters (a-z), numbers, and periods." tabindex="3" />
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">		
						<div class="form-group has-feedback"> <!-- phone -->
							<label for="phone" class="control-label"><?php cms("PhoneNumber", "Phone Number*", true); ?></label>
							<input type="text" class="form-control" id="phone" name="phone" placeholder="Ex: (310) 807-2515 or 310-807-2515 " required data-msg-required="Please complete this required field." data-rule-pattern="(^\(?(\d{3})\)?[-\. ]?(\d{3})[-\. ]?(\d{4})( x\d{4})?$)" data-msg-pattern="Use US phone Format" tabindex="4">					
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group has-feedback">
							<label for="companyname" class="control-label"><?php cms("CompanyName", "Company Name*", true); ?></label>
							<input type="text" class="form-control" id="companyname" autocomplete="on" name="companyname" placeholder="Company Name" required data-msg-required="Please complete this required field." data-rule-pattern="(^[a-zA-Z\s]+$)" data-msg-pattern="Allow letters and spaces" tabindex="5" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group has-feedback">
							<label><?php cms("Howmanyemployeesworkatyourorganization?", "How many employees work at your organization?*", true); ?></label> <br />	
							<label for="organization_100">
								<input type="checkbox" class="checkbox" id="organization_100" value="Less than 100" name="organization" required="" minlength="1" data-msg-required="Please select at least one option." aria-required="true" data-msg-minlength="Please select at least one option." >Less than 100
							</label><br />
							<label for="organization_500">
								<input type="checkbox" class="checkbox" id="organization_500 " value="100-500" name="organization">100-500
							</label><br />
							<label for="organization_1000">
								<input type="checkbox" class="checkbox" id="organization_1000" value="501-1,000" name="organization">501-1,000
							</label><br />

							<label for="organization_5000">
								<input type="checkbox" class="checkbox" id="organization_5000" value="1,001-5,000" name="organization" >1,001-5,000
							</label><br />
							<label for="organization_10000">
								<input type="checkbox" class="checkbox" id="organization_10000 " value="5,001-10,000" name="organization">5,001-10,000
							</label><br />
							<label for="organization_more">
								<input type="checkbox" class="checkbox" id="organization_more" value="More than 10,000" name="organization">More than 10,000
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group has-feedback">
							<label><?php cms("Whatdidordoesyourorganizationviewasthemostimportantbenefitsofcloudcomputing?", "What did or does your organization view as the most important benefits of cloud computing?*", true); ?></label> <br />
							<select id="sel_computing" name="sel_computing" class="form-control" required data-msg-required="Please select an option from the dropdown menu.">
								<option value="">- Please Select -</option>
								<option value="Cost savings on hardware">Cost savings on hardware</option>
								<option value="Cost savings on software">Cost savings on software</option>
								<option value="Cost savings on IT operations Staff">Cost savings on IT operations Staff</option>
								<option value="Ability to rapidly launch new products and services">Ability to rapidly launch new products and services</option>
								<option value="Ability to grow and shrink IT Capacity on demand">Ability to grow and shrink IT Capacity on demand</option>
								<option value="Convenience for the development teams">Convenience for the development teams</option>
								<option value="No upfront investment">No upfront investment</option>
								<option value="Pricing Flexibility">Pricing Flexibility</option>
								<option value="Better collaboration across teams">Better collaboration across teams</option>
								<option value="Outsourcing of non-core competencies">Outsourcing of non-core competencies</option>
								<option value="Other">Other</option>
							</select>	
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group has-feedback">
							<label><?php cms("Whatwereorarethegreatestbarriersforadoptionofcloudcomputinginyourorganization?", "What were or are the greatest barriers for adoption of cloud computing in your organization?*", true); ?></label> <br />
							<label for="barriers_reliability">
								<input type="checkbox" class="checkbox" id="barriers_reliability" value="Reliability" name="barriers" required="" minlength="1" data-msg-required="Please select at least one option." aria-required="true" data-msg-minlength="Please select at least one option." >Reliability
							</label><br />
							<label for="barriers_cloud">
								<input type="checkbox" class="checkbox" id="barriers_cloud " value="Cloud provider lock-in" name="barriers">Cloud provider lock-in
							</label><br />
							<label for="barriers_performance">
								<input type="checkbox" class="checkbox" id="barriers_performance" value="Performance" name="barriers">Performance
							</label><br />

							<label for="barriers_geographic">
								<input type="checkbox" class="checkbox" id="barriers_geographic" value="Geographic location of cloud provider data centers" name="barriers" >Geographic location of cloud provider data centers
							</label><br />
							<label for="barriers_security">
								<input type="checkbox" class="checkbox" id="barriers_security " value="Security" name="barriers">Security
							</label><br />
							<label for="barriers_compliance">
								<input type="checkbox" class="checkbox" id="barriers_compliance" value="Compliance" name="barriers">Compliance
							</label><br />

							<label for="barriers_customize">
								<input type="checkbox" class="checkbox" id="barriers_customize" value="Lack of ability to customize" name="barriers">Lack of ability to customize
							</label><br />
							<label for="barriers_integration">
								<input type="checkbox" class="checkbox" id="barriers_integration " value="Integration with existing systems" name="barriers">Integration with existing systems
							</label><br />
							<label for="barriers_costs">
								<input type="checkbox" class="checkbox" id="barriers_costs" value="Costs and ROI" name="barriers">Costs and ROI
							</label><br />

							<label for="barriers_management">
								<input type="checkbox" class="checkbox" id="barriers_management" value="Lack of management understanding/willingness to innovate" name="barriers" >Lack of management understanding/willingness to innovate
							</label><br />
							<label for="barriers_politics">
								<input type="checkbox" class="checkbox" id="barriers_politics " value="Organizational politics" name="barriers">Organizational politics
							</label><br />
							<label for="barriers_notsure">
								<input type="checkbox" class="checkbox" id="barriers_notsure" value="Not sure" name="barriers">Not sure
							</label><br />
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group has-feedback">
							<label><?php cms("Whichtypesofapplicationsdoyouuseorplantodeployintoacloudwithinthenext12monthsPleasecheckallthatapply", "Which types of applications do you use or plan to deploy into a cloud within the next 12 months? Please check all that apply:*", true); ?></label> <br />
							<label for="applications_development">
								<input type="checkbox" class="checkbox" id="applications_development" value="Development" name="applications" required="" minlength="1" data-msg-required="Please select at least one option." aria-required="true" data-msg-minlength="Please select at least one option." >Development
							</label><br />
							<label for="applications_testing">
								<input type="checkbox" class="checkbox" id="applications_testing " value="Testing/QA/Staging" name="applications">Testing/QA/Staging
							</label><br />
							<label for="applications_ecommerce">
								<input type="checkbox" class="checkbox" id="applications_ecommerce" value="Ecommerce application" name="applications">Ecommerce application
							</label><br />

							<label for="applications_networking">
								<input type="checkbox" class="checkbox" id="applications_networking" value="Web 2.0/social networking" name="applications" >Web 2.0/social networking
							</label><br />
							<label for="applications_internal">
								<input type="checkbox" class="checkbox" id="applications_internal " value="Internal enterprise application (HCM, Payroll, CRM, ERP)" name="applications">Internal enterprise application (HCM, Payroll, CRM, ERP)
							</label><br />
							<label for="applications_office">
								<input type="checkbox" class="checkbox" id="applications_office" value="Office productivity (Google Docs, Zoho)" name="applications">Office productivity (Google Docs, Zoho)
							</label><br />

							<label for="applications_monitoring">
								<input type="checkbox" class="checkbox" id="applications_monitoring" value="Monitoring/Application performance management" name="applications">Monitoring/Application performance management
							</label><br />
							<label for="applications_security">
								<input type="checkbox" class="checkbox" id="applications_security " value="Security/Compliance" name="applications">Security/Compliance
							</label><br />
							<label for="applications_collaboration">
								<input type="checkbox" class="checkbox" id="applications_collaboration" value="Collaboration" name="applications">Collaboration
							</label><br />

							<label for="applications_marketing">
								<input type="checkbox" class="checkbox" id="applications_marketing" value="Marketing/Business intelligence" name="applications" >Marketing/Business intelligence
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group has-feedback">
							<label><?php cms("Doyouconsideranyoftheapplicationsforwhichyouareusingcloudcomputingtobemissioncriticalapplicationsforyourbusiness", "Do you consider any of the applications for which you are using cloud computing to be mission critical applications for your business?*", true); ?></label> <br />	
							<label for="computing_yes">
								<input type="checkbox" class="checkbox" id="computing_yes" value="Yes" name="computing" required="" minlength="1" data-msg-required="Please select at least one option." aria-required="true" data-msg-minlength="Please select at least one option.">Yes
							</label><br />
							<label for="computing_no">
								<input type="checkbox" class="checkbox" id="computing_no" value="No" name="computing">No
							</label><br />
							<label for="computing_notsure">
								<input type="checkbox" class="checkbox" id="computing_notsure" value="Not Sure" name="computing">Not Sure
							</label><br />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group has-feedback">
							<label><?php cms("Theinitialadoptionofcloudcomputinginourorganizationwasdoneby", "The initial adoption of cloud computing in our organization was done by:*", true); ?></label> <br />	
							<label for="cloud_development">
								<input type="checkbox" class="checkbox" id="cloud_development" value="A development team" name="cloud" required="" minlength="1" data-msg-required="Please select at least one option." aria-required="true" data-msg-minlength="Please select at least one option.">A development team
							</label><br />
							<label for="cloud_operations">
								<input type="checkbox" class="checkbox" id="cloud_operations " value="An IT operations team" name="cloud">An IT operations team
							</label><br />
							<label for="cloud_department">
								<input type="checkbox" class="checkbox" id="cloud_department" value="A departmental/LOB project" name="cloud">A departmental/LOB project
							</label><br />

							<label for="cloud_ecision">
								<input type="checkbox" class="checkbox" id="cloud_ecision" value="A CEO decision" name="cloud">A CEO decision
							</label><br />
							<label for="cloud_decision">
								<input type="checkbox" class="checkbox" id="cloud_decision " value="A CIO/Senior IT Exec decision" name="cloud">A CIO/Senior IT Exec decision
							</label><br />
							<label for="cloud_notsure">
								<input type="checkbox" class="checkbox" id="cloud_notsure" value="Collaboration" name="cloud">Not sure
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group has-feedback">
							<label><?php cms("Whatisthecurrentstateofadoptioninyourorganization", "What is the current state of adoption (or plans for adoption within 12 months) in your organization:*", true); ?></label> <br />	
							<label for="department_applications">
								<input type="checkbox" class="checkbox" id="department_applications" value="Includes additional applications within the same department" name="department" required="" minlength="1" data-msg-required="Please select at least one option." aria-required="true" data-msg-minlength="Please select at least one option.">Includes additional applications within the same department
							</label><br />
							<label for="department_addtional">
								<input type="checkbox" class="checkbox" id="department_addtional " value="Includes additional applications across departments" name="department">Includes additional applications across departments
							</label><br />
							<label for="department_computing">
								<input type="checkbox" class="checkbox" id="department_computing" value="Organization-wide mandate to adopt cloud computing" name="department">Organization-wide mandate to adopt cloud computing
							</label><br />

							<label for="department_notsure">
								<input type="checkbox" class="checkbox" id="department_notsure" value="Not sure" name="department">Not sure
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group has-feedback">
							<label><?php cms("Isthereanythingelseyouwouldliketotellusabouttheadoptionoruseofcloudcomputinginyourorganization", "Is there anything else you would like to tell us about the adoption or use of cloud computing in your organization?", true); ?></label> <br />	
							<textarea class="form-control" id="questionnaire_organization"  name="questionnaire_organization" row="30" col="5"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group has-feedback">
							<label><?php cms("Ifyourcompanyusescloudcomputingwhatwouldyouchange", "If your company uses cloud computing, what would you change?", true); ?></label> <br />	
							<textarea class="form-control" id="questionnaire_computing" name="questionnaire_computing" row="30" col="5"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group has-feedback">
							<label><?php cms("Whathaspreventedyoufrommovingtothecloud", "What has prevented you from moving to the cloud?", true); ?></label> <br />	
							<textarea class="form-control" id="questionnaire_moving" name="questionnaire_moving" row="30" col="5"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group has-feedback">
							<label><?php cms("HaveyouconsideredusingamanagedservicesproviderIfsowhatservices", "Have you considered using a managed services provider? If so, what services?", true); ?></label> <br />	
							<textarea class="form-control" id="questionnaire_consider" name="questionnaire_consider" row="30" col="5"></textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary" id="btnSubmit"><?php cms("Submit", "Submit", true); ?></button>
				</div>
			</form>
      </div>
      <!-- End Blog Grid Classic Blocks -->