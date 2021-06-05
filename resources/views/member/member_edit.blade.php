@extends('layouts.main')

@section('title','Member Dashboard')

@section('content') 
    <div class="container-fluid">
        <form method="post" action="/member/myprofile/edit/{{$user->id}}">
            @method('patch')
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">Edit Profile</div>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <h3 class="box-title">Personal Info</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Full Name</label>
                                        <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="gender">Gender</label>
                                        <select id="gender" name="gender" class="form-control">
                                            <option value="male" {{ $user->member->gender == 'male' ? 'selected' : ''}}>Male</option>
                                            <option value="female" {{ $user->member->gender == 'female' ? 'selected' : ''}}>Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control" value="{{$user->member->city}}">
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <label for="profession">Profession</label>
                                        <select id="profession" name="profession" class="form-control">
                                            <option value="student" {{ $user->member->profession == 'student' ? 'selected' : ''}}> Student</option>
                                            <option value="startup" {{ $user->member->profession == 'startup' ? 'selected' : ''}}> Startup</option>
                                            <option value="freelance" {{ $user->member->profession == 'freelance' ? 'selected' : ''}}> Freelance</option>
                                            <option value="employee" {{ $user->member->profession == 'employee' ? 'selected' : ''}}> Employee</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <label>Date of Birth</label>
                                        <input type="date" name="dob" class="form-control" value="{{$user->member->dob}}">
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <label for="bc">Bussiness Category</label>
                                        <select id="bc" name="bc" class="form-control">
                                            <option value="Animation" {{ $user->member->bc == 'Animation' ? 'selected' : ''}}> Animation</option>
                                            <option value="Big data" {{ $user->member->bc == 'Big data' ? 'selected' : ''}}> Big data</option>
                                            <option value="BlockChain" {{ $user->member->bc == 'BlockChain' ? 'selected' : ''}}> BlockChain</option>
                                            <option value="Bussiness Solution" {{ $user->member->bc == 'Bussiness Solution' ? 'selected' : ''}}> Bussiness Solution</option>
                                            <option value="Cybersecurity" {{ $user->member->bc == 'Cybersecurity' ? 'selected' : ''}}> Cybersecurity</option>
                                            <option value="DevOps" {{ $user->member->bc == 'DevOps' ? 'selected' : ''}}> DevOps</option>
                                            <option value="E-Commerce" {{ $user->member->bc == 'E-Commerce' ? 'selected' : ''}}> E-Commerce</option>
                                            <option value="Edu Tect" {{ $user->member->bc == 'Edu Tect' ? 'selected' : ''}}> Edu Tect</option>
                                            <option value="Fintech" {{ $user->member->bc == 'Fintech' ? 'selected' : ''}}> Fintech</option>
                                            <option value="Game" {{ $user->member->bc == 'Game' ? 'selected' : ''}}> Game</option>
                                            <option value="Gomernment Solution" {{ $user->member->bc == 'Gomernment Solution' ? 'selected' : ''}}> Gomernment Solution</option>
                                            <option value="Healt Tech" {{ $user->member->bc == 'Healt Tech' ? 'selected' : ''}}> Healt Tech</option>
                                            <option value="Home Solution" {{ $user->member->bc == 'Home Solution' ? 'selected' : ''}}> Home Solution</option>
                                            <option value="Investment" {{ $user->member->bc == 'Investment' ? 'selected' : ''}}> Investment</option>
                                            <option value="iOT" {{ $user->member->bc == 'iOT' ? 'selected' : ''}}> iOT</option>
                                            <option value="On Demand" {{ $user->member->bc == 'On Demand' ? 'selected' : ''}}> On Demand</option>
                                            <option value="OTA (online Travel Agent)" {{ $user->member->bc == 'OTA (online Travel Agent)' ? 'selected' : ''}}> OTA (online Travel Agent)</option>
                                            <option value="Personal/Jasa (Saas)" {{ $user->member->bc == 'Personal/Jasa (Saas)' ? 'selected' : ''}}> Personal/Jasa (Saas)</option>
                                            <option value="Social Media & Community" {{ $user->member->bc == 'Social Media & Community' ? 'selected' : ''}}> Social Media & Community</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <label>Company/Institute Name</label>
                                        <input type="text" name="company" class="form-control" value="{{$user->member->company}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Social Media</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{$user->member->phone}}">
                            </div>
                            <div class="col-md-6">
                                <label>Instagram</label>
                                <input type="text" name="instagram" class="form-control" value="{{$user->member->instagram}}">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label>Facebook</label>
                                <input type="text" name="facebook" class="form-control" value="{{$user->member->facebook}}">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label>Linkedin</label>
                                <input type="text" name="linkedin" class="form-control" value="{{$user->member->linkedin}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <div class="row m-5">
                            <h3 class="box-title">Expertise and Profession</h3>
                            <hr>
                            <!-- Nav tabs -->
                            <ul class="nav customtab nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#hacker1" aria-controls="hacker" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-hacker"></i></span><span class="hidden-xs">Hacker</span></a></li>
                                <li role="presentation" class=""><a href="#hustler1" aria-controls="hustler" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Hustler</span></a></li>
                                <li role="presentation" class=""><a href="#hipster1" aria-controls="hipster" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Hipster</span></a></li>
                                <li role="presentation" class=""><a href="#other1" aria-controls="other" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-other"></i></span> <span class="hidden-xs">Other</span></a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="hacker1">
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="form-check col-md-4">
                                                    <input type="checkbox" class="form-check-input" id="1" name="expertises[]" value="Web Developer" {{in_array("Web Developer",$user->member->expertises)?'checked':''}}>
                                                    <label class="form-check-label" for="1">Web Developer</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input type="checkbox" class="form-check-input" id="2" name="expertises[]" value="Frontend Developer" {{in_array("Frontend Developer",$user->member->expertises)?'checked':''}}>
                                                    <label class="form-check-label" for="2">Frontend Developer</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input type="checkbox" class="form-check-input" id="3" name="expertises[]" value="Backend Developer" {{in_array("Backend Developer",$user->member->expertises)?'checked':''}}>
                                                    <label class="form-check-label" for="3">Backend Developer</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input type="checkbox" class="form-check-input" id="4" name="expertises[]" value="Android Developer" {{in_array("Android Developer",$user->member->expertises)?'checked':''}}>
                                                    <label class="form-check-label" for="4">Android Developer</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input type="checkbox" class="form-check-input" id="5" name="expertises[]" value="iOS Developer" {{in_array("iOS Developer",$user->member->expertises)?'checked':''}}>
                                                    <label class="form-check-label" for="5">iOS Developer</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input type="checkbox" class="form-check-input" id="6" name="expertises[]" value="Internet of Things" {{in_array("Internet of Things",$user->member->expertises)?'checked':''}}>
                                                    <label class="form-check-label" for="6">Internet of Things</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input type="checkbox" class="form-check-input" id="7" name="expertises[]" value="Game Developer" {{in_array("Game Developer",$user->member->expertises)?'checked':''}}>
                                                    <label class="form-check-label" for="7">Game Developer</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input type="checkbox" class="form-check-input" id="8" name="expertises[]" value="SEO Specialist" {{in_array("SEO Specialist",$user->member->expertises)?'checked':''}}>
                                                    <label class="form-check-label" for="8">SEO Specialist</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input type="checkbox" class="form-check-input" id="9" name="expertises[]" value="IT Networking" {{in_array("IT Networking",$user->member->expertises)?'checked':''}}>
                                                    <label class="form-check-label" for="9">IT Networking</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input type="checkbox" class="form-check-input" id="10" name="expertises[]" value="IT Security" {{in_array("IT Security",$user->member->expertises)?'checked':''}}>
                                                    <label class="form-check-label" for="10">IT Security</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="hustler1">
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="form-check col-md-4">
                                                    <input type="checkbox" class="form-check-input" id="11" name="expertises[]" value="Management Bussiness" {{in_array("Management Bussiness",$user->member->expertises)?'checked':''}}>
                                                    <label class="form-check-label" for="11">Management Bussiness</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input type="checkbox" class="form-check-input" id="12" name="expertises[]" value="Finance" {{in_array("Finance",$user->member->expertises)?'checked':''}}>
                                                    <label class="form-check-label" for="12">Finance</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input type="checkbox" class="form-check-input" id="13" name="expertises[]" value="Marketing" {{in_array("Marketing",$user->member->expertises)?'checked':''}}>
                                                    <label class="form-check-label" for="13">Marketing</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input type="checkbox" class="form-check-input" id="14" name="expertises[]" value="Digital Marketing" {{in_array("Digital Marketing",$user->member->expertises)?'checked':''}}>
                                                    <label class="form-check-label" for="14">Digital Marketing</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input type="checkbox" class="form-check-input" id="15" name="expertises[]" value="Human Resources" {{in_array("Human Resources",$user->member->expertises)?'checked':''}}>
                                                    <label class="form-check-label" for="15">Human Resources</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input type="checkbox" class="form-check-input" id="16" name="expertises[]" value="Content Writer" {{in_array("Content Writer",$user->member->expertises)?'checked':''}}>
                                                    <label class="form-check-label" for="16">Content Writer</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="hipster1">
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="form-check col-md-4">
                                                    <input type="checkbox" class="form-check-input" id="17" name="expertises[]" value="UI Designer" {{in_array("UI Designer",$user->member->expertises)?'checked':''}}>
                                                    <label class="form-check-label" for="17">UI Designer</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input type="checkbox" class="form-check-input" id="18" name="expertises[]" value="UX Designer" {{in_array("UX Designer",$user->member->expertises)?'checked':''}}>
                                                    <label class="form-check-label" for="18">UX Designer</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input type="checkbox" class="form-check-input" id="19" name="expertises[]" value="Graphic Designer" {{in_array("Graphic Designer",$user->member->expertises)?'checked':''}}>
                                                    <label class="form-check-label" for="19">Graphic Designer</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input type="checkbox" class="form-check-input" id="20" name="expertises[]" value="Video Editor" {{in_array("Video Editor",$user->member->expertises)?'checked':''}}>
                                                    <label class="form-check-label" for="20">Video Editor</label>
                                                </div>
                                                <div class="form-check col-md-4">
                                                    <input type="checkbox" class="form-check-input" id="21" name="expertises[]" value="Animator" {{in_array("Animator",$user->member->expertises)?'checked':''}}>
                                                    <label class="form-check-label" for="21">Animator</label>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="other1">
                                    <div class="col-md-8">
                                        <strong>Other Expertise</strong>
                                        @if($other!=null)
                                        <input name="expertises[]" type="text" class="form-control validate" placeholder="Other Expertise" value="{{$other}}" >
                                        @else
                                        <input name="expertises[]" type="text" class="form-control validate" placeholder="Other Expertise">
                                        @endif
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Login Information</h3>
                        <hr>
                        <div class="row m-3">
                            <div class="col-md-6">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{$user->email}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-right m-5">
                <button type="submit" class="btn btn-primary btn-block">Update</button>
            </div>
            <br>
        </form>
    </div>
@endsection