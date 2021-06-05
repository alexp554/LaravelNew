@extends('layouts.forregister')

@section('isi')
<div class="col-md-8 mt-5">
	<div class="accordion" id="accordionExample">
		<div class="card dv-no-border">
			<div class="card-header dv-card-header" id="headingOne" style="padding: 10px !important">
				<p class="mb-0 text-white">
					Register
				</p>
			</div>

			<div class="card-content">
				<!-- <div class="z-depth-1 m-2"> -->
					<div class="p-4">
						<form  method="POST" action="{{ route('register') }}" id="myForm">
                            @csrf
                            <ul class="stepper linear">
								<li class="step active">
									<div class="step-title waves-effect waves-dark">Personal Info</div>
										<div class="step-new-content">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="name">Full Name</label>
														<input id="name" name="name" type="text" class="form-control validate @error('name') is-invalid @enderror" placeholder="Via Sarah" value="{{ old('name') }}">
														@error('name')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="gender">Gender</label>
														<select id="gender" name="gender" type="dropdown" class="form-control validate" value="{{ old('gender') }}">
															<option value="" disabled selected></option>
															<option {{ old('gender')  == 'male' ? 'selected' : ''}} value="Male">Male</option>
															<option {{ old('gender')  == 'female' ? 'selected' : ''}} value="Female">Female</option>
														</select>
													</div>
												</div>
											</div>
											<div class="row mt-3">
												<div class="col-md-6">
													<div class="form-group">
														<label for="city">Origin City</label>
														<input id="city" name="city" type="text" class="form-control validate" placeholder="Yogyakarta"  value="{{ old('city') }}">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="profession">Profession</label>
														<select id="profession" name="profession" type="dropdown" class="form-control validate">
															<option value="" disabled selected></option>
															<option {{ old('profession')  == 'student' ? 'selected' : ''}} value="Student">Student</option>
															<option {{ old('profession')  == 'startup' ? 'selected' : ''}} value="Startup">Startup</option>
															<option {{ old('profession')  == 'freelance' ? 'selected' : ''}} value="Freelance">Frelance</option>
															<option {{ old('profession')  == 'employee' ? 'selected' : ''}} value="Employee">Employee</option>
														</select>
													</div>
												</div>
											</div>
											<div class="row mt-3">
												<div class="col-md-6">
													<div class="form-group">
														<label for="dob">Date of Birth</label>
														<input id="dob" type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}"  autocomplete="dob" placeholder="mm/dd/yyyy">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="bc">Bussiness Category</label>
														<select id="bc" name="bc" type="dropdown" class="form-control validate">
															<option value="" disabled selected></option>
															<option {{ old('bc')  == 'Animation' ? 'selected' : ''}} value="Animation">Animation</option>
															<option {{ old('bc')  == 'Big data' ? 'selected' : ''}} value="Big data">Big Data</option>
															<option {{ old('bc')  == 'BlockChain' ? 'selected' : ''}} value="BlockChain">BlockChain</option>
															<option {{ old('bc')  == 'Bussiness Solution' ? 'selected' : ''}} value="Bussiness Solution">Bussiness Solution</option>
															<option {{ old('bc')  == 'Cybersecurity' ? 'selected' : ''}} value="Cybersecurity">Cybersecurity</option>
															<option {{ old('bc')  == 'DevOps' ? 'selected' : ''}} value="DevOps">DevOps</option>
															<option {{ old('bc')  == 'E-Commerce' ? 'selected' : ''}} value="E-Commerce">E-Commerce</option>
															<option {{ old('bc')  == 'Edu Tec' ? 'selected' : ''}} value="Edu Tect">Edu Tect</option>
															<option {{ old('bc')  == 'Fintech' ? 'selected' : ''}} value="Fintech">Fintech</option>
															<option {{ old('bc')  == 'Game' ? 'selected' : ''}} value="Game">Game</option>
															<option {{ old('bc')  == 'Gomernment Solution' ? 'selected' : ''}} value="Gomernment Solution">Gomernment Solution</option>
															<option {{ old('bc')  == 'Healt Tech' ? 'selected' : ''}} value="Healt Tech">Healt Tech</option>
															<option {{ old('bc')  == 'Home Solution' ? 'selected' : ''}} value="Home Solution">Home Solution</option>
															<option {{ old('bc')  == 'Investment' ? 'selected' : ''}} value="Investment">Investment</option>
															<option {{ old('bc')  == 'iOT' ? 'selected' : ''}} value="iOT">iOT</option>
															<option {{ old('bc')  == 'On Demand' ? 'selected' : ''}} value="On Demand">On Demand</option>
															<option {{ old('bc')  == 'OTA (online Travel Agent)' ? 'selected' : ''}} value="OTA (online Travel Agent)">OTA (online Travel Agent)</option>
															<option {{ old('bc')  == 'Personal/Jasa (Saas)' ? 'selected' : ''}} value="Personal/Jasa (Saas)">Personal/Jasa (Saas)</option>
															<option {{ old('bc')  == 'Social Media & Community' ? 'selected' : ''}} value="Social Media & Community">Social Media & Community</option>
														</select>
													</div>
												</div>
											</div>
											<div class="row mt-3">
												<div class="col-md-8">
													<div class="form-group">
														<label for="company">Company/Institute Name</label>
														<input id="company" name="company" type="text" class="form-control validate" placeholder="Jogja Digital Valley" value="{{ old('company') }}">
													</div>
												</div>
											</div>
											<div class="step-actions">
												<button class="waves-effect waves-dark btn btn-sm btn-primary next-step">CONTINUE</button>
											</div>
									</div>
								</li>
								<li class="step">
									<div class="step-title waves-effect waves-dark">Social Media</div>
									<div class="step-new-content">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
											<label for="phone">Phone</label>
											<input id="phone" name="phone" type="text" class="form-control validate" placeholder="081231112xxx" value="{{ old('phone') }}">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
											<label for="instagram">Instagram</label>
											<input id="instagram" name="instagram" type="text" class="form-control validate" placeholder="@telkomjdv" value="{{ old('instagram') }}">
											</div>
										</div>
									</div>
									<div class="row mt-3">
										<div class="col-md-6">
											<div class="form-group">
											<label for="facebook">Facebook</label>
											<input id="facebook" name="facebook" type="text" class="form-control validate" placeholder="Telkom Jdv" value="{{ old('facebook') }}">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
											<label for="linkedin">Linkedin</label>
											<input id="linkedin" name="linkedin" type="text" class="form-control validate" placeholder="Insert Link Linkedin" value="{{ old('linkedin') }}">
											</div>
										</div>
									</div>
									<div class="step-actions">
										<button class="waves-effect waves-dark btn btn-sm btn-primary next-step">CONTINUE</button>
										<button class="waves-effect waves-dark btn btn-sm btn-secondary previous-step">BACK</button>
									</div>
									</div>
								</li>
								<li class="step">
									<div class="step-title waves-effect waves-dark">Expertise and Profession</div>
									<div class="step-new-content">
										<div class="row">
											<ul class="nav nav-tabs" id="myTab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="hacker-tab" data-toggle="tab" href="#hacker" role="tab" aria-controls="hacker"
												aria-selected="true">Hacker</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="Hustle-tab" data-toggle="tab" href="#Hustle" role="tab" aria-controls="Hustle"
												aria-selected="false">Hustler</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="Hipster-tab" data-toggle="tab" href="#Hipster" role="tab" aria-controls="Hipster"
												aria-selected="false">Hipster</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="Other-tab" data-toggle="tab" href="#Other" role="tab" aria-controls="Other"
												aria-selected="false">Other</a>
											</li>
											</ul>
											<div class="tab-content" id="myTabContent">
												<div class="tab-pane fade show active" id="hacker" role="tabpanel" aria-labelledby="hacker-tab">
													<div class="form-group">
														<div class="row">
															<div class="custom-control custom-checkbox col-md-4">
																<input type="checkbox" class="custom-control-input" id="1" name="expertises[]" value="Web Developer" @if(is_array(old('expertises')) && in_array("Web Developer", old('expertises'))) checked @endif>
																<label class="custom-control-label" for="1">Web Developer</label>
															</div>
															<div class="custom-control custom-checkbox col-md-4">
																<input type="checkbox" class="custom-control-input" id="2" name="expertises[]" value="Frontend Developer" @if(is_array(old('expertises')) && in_array("Frontend Developer", old('expertises'))) checked @endif>
																<label class="custom-control-label" for="2">Frontend Developer</label>
															</div>
															<div class="custom-control custom-checkbox col-md-4">
																<input type="checkbox" class="custom-control-input" id="3" name="expertises[]" value="Backend Developer" @if(is_array(old('expertises')) && in_array("Backend Developer", old('expertises'))) checked @endif>
																<label class="custom-control-label" for="3">Backend Developer</label>
															</div>
															<div class="custom-control custom-checkbox col-md-4">
																<input type="checkbox" class="custom-control-input" id="4" name="expertises[]" value="Android Developer" @if(is_array(old('expertises')) && in_array("Android Developer", old('expertises'))) checked @endif>
																<label class="custom-control-label" for="4">Android Developer</label>
															</div>
															<div class="custom-control custom-checkbox col-md-4">
																<input type="checkbox" class="custom-control-input" id="5" name="expertises[]" value="iOS Developer" @if(is_array(old('expertises')) && in_array("iOS Developer", old('expertises'))) checked @endif>
																<label class="custom-control-label" for="5">iOS Developer</label>
															</div>
															<div class="custom-control custom-checkbox col-md-4">
																<input type="checkbox" class="custom-control-input" id="6" name="expertises[]" value="Internet of Things" @if(is_array(old('expertises')) && in_array("Internet of Things", old('expertises'))) checked @endif>
																<label class="custom-control-label" for="6">Internet of Things</label>
															</div>
															<div class="custom-control custom-checkbox col-md-4">
																<input type="checkbox" class="custom-control-input" id="7" name="expertises[]" value="Game Developer" @if(is_array(old('expertises')) && in_array("Game Developer", old('expertises'))) checked @endif>
																<label class="custom-control-label" for="7">Game Developer</label>
															</div>
															<div class="custom-control custom-checkbox col-md-4">
																<input type="checkbox" class="custom-control-input" id="8" name="expertises[]" value="SEO Specialist" @if(is_array(old('expertises')) && in_array("SEO Specialist", old('expertises'))) checked @endif>
																<label class="custom-control-label" for="8">SEO Specialist</label>
															</div>
															<div class="custom-control custom-checkbox col-md-4">
																<input type="checkbox" class="custom-control-input" id="9" name="expertises[]" value="IT Networking" @if(is_array(old('expertises')) && in_array("IT Networking", old('expertises'))) checked @endif>
																<label class="custom-control-label" for="9">IT Networking</label>
															</div>
															<div class="custom-control custom-checkbox col-md-4">
																<input type="checkbox" class="custom-control-input" id="10" name="expertises[]" value="IT Security" @if(is_array(old('expertises')) && in_array("IT Security", old('expertises'))) checked @endif>
																<label class="custom-control-label" for="10">IT Security</label>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="Hustle" role="tabpanel" aria-labelledby="Hustle-tab">
													<div class="form-group">
														<div class="row">
															<div class="custom-control custom-checkbox col-md-4">
																<input type="checkbox" class="custom-control-input" id="11" name="expertises[]" value="Management Bussiness" @if(is_array(old('expertises')) && in_array("Management Bussiness", old('expertises'))) checked @endif>
																<label class="custom-control-label" for="11">Management Bussiness</label>
															</div>
															<div class="custom-control custom-checkbox col-md-4">
																<input type="checkbox" class="custom-control-input" id="12" name="expertises[]" value="Finance" @if(is_array(old('expertises')) && in_array("Finance", old('expertises'))) checked @endif>
																<label class="custom-control-label" for="12">Finance</label>
															</div>
															<div class="custom-control custom-checkbox col-md-4">
																<input type="checkbox" class="custom-control-input" id="13" name="expertises[]" value="Marketing" @if(is_array(old('expertises')) && in_array("Marketing", old('expertises'))) checked @endif>
																<label class="custom-control-label" for="13">Marketing</label>
															</div>
															<div class="custom-control custom-checkbox col-md-4">
																<input type="checkbox" class="custom-control-input" id="14" name="expertises[]" value="Digital Marketing" @if(is_array(old('expertises')) && in_array("Digital Marketing", old('expertises'))) checked @endif>
																<label class="custom-control-label" for="14">Digital Marketing</label>
															</div>
															<div class="custom-control custom-checkbox col-md-4">
																<input type="checkbox" class="custom-control-input" id="15" name="expertises[]" value="Human Resources" @if(is_array(old('expertises')) && in_array("Human Resources", old('expertises'))) checked @endif>
																<label class="custom-control-label" for="15">Human Resources</label>
															</div>
															<div class="custom-control custom-checkbox col-md-4">
																<input type="checkbox" class="custom-control-input" id="16" name="expertises[]" value="Content Writer" @if(is_array(old('expertises')) && in_array("Content Writer", old('expertises'))) checked @endif>
																<label class="custom-control-label" for="16">Content Writer</label>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="Hipster" role="tabpanel" aria-labelledby="Hipster-tab">
													<div class="form-group">
														<div class="row">
															<div class="custom-control custom-checkbox col-md-4">
																<input type="checkbox" class="custom-control-input" id="17" name="expertises[]" value="UI Designer" @if(is_array(old('expertises')) && in_array("UI Designer", old('expertises'))) checked @endif>
																<label class="custom-control-label" for="17">UI Designer</label>
															</div>
															<div class="custom-control custom-checkbox col-md-4">
																<input type="checkbox" class="custom-control-input" id="18" name="expertises[]" value="UX Designer" @if(is_array(old('expertises')) && in_array("UX Designer", old('expertises'))) checked @endif>
																<label class="custom-control-label" for="18">UX Designer</label>
															</div>
															<div class="custom-control custom-checkbox col-md-4">
																<input type="checkbox" class="custom-control-input" id="19" name="expertises[]" value="Graphic Designer" @if(is_array(old('expertises')) && in_array("Graphic Designer", old('expertises'))) checked @endif>
																<label class="custom-control-label" for="19">Graphic Designer</label>
															</div>
															<div class="custom-control custom-checkbox col-md-4">
																<input type="checkbox" class="custom-control-input" id="20" name="expertises[]" value="Video Editor" @if(is_array(old('expertises')) && in_array("Video Editor", old('expertises'))) checked @endif>
																<label class="custom-control-label" for="20">Video Editor</label>
															</div>
															<div class="custom-control custom-checkbox col-md-4">
																<input type="checkbox" class="custom-control-input" id="21" name="expertises[]" value="Animator" @if(is_array(old('expertises')) && in_array("Animator", old('expertises'))) checked @endif>
																<label class="custom-control-label" for="21">Animator</label>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="Other" role="tabpanel" aria-labelledby="Other-tab">
													<div class="row">
														<label>Other Expertise</label>
														<input name="expertises[]" type="text" class="form-control validate" placeholder="Other Expertise" value="{{ old('expertisese') }}" >
													</div>
												</div>
											</div>
										</div>
										<div class="step-actions">
											<button class="waves-effect waves-dark btn btn-sm btn-primary next-step">CONTINUE</button>
											<button class="waves-effect waves-dark btn btn-sm btn-secondary previous-step">BACK</button>
										</div>
									</div>
								</li>
								<li class="step">
									<div class="step-title waves-effect waves-dark">Login Information</div>
									<div class="step-new-content">
										<div class="form-group">
											<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

											<div class="col-md-6">
												<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

												@error('email')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>

										<div class="form-group">
											<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

											<div class="col-md-6">
												<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

												@error('password')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>

										<div class="form-group">
											<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

											<div class="col-md-6">
												<input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
											</div>
										</div>
										<div class="step-actions">
											<button class="waves-effect waves-dark btn btn-sm btn-primary next-step">CONTINUE</button>
											<button class="waves-effect waves-dark btn btn-sm btn-secondary previous-step">BACK</button>
										</div>
									</div>
								</li>
								<li class="step">
									<div class="step-title waves-effect waves-dark">Submit</div>
									<div class="step-new-content">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="99" name="term" value="1">
											<label class="custom-control-label" for="99">Agree to the<a href="https://jogjadigitalvalley.com/tos/" target="_blank">Terms and Conditions</a></label>
										</div>
										</br>
										<button type="button" class="btn btn-primary btn-sm" onclick="myFunction()">Register</button>
									</div>
								</li>
						    </ul>
                        </form>
					</div>
				<!-- </div> -->
			</div>
		</div>

	</div>

</div>
@endsection