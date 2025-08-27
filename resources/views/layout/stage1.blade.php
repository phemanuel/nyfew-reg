<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NYFEW :: Stage 1 Update</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="icon" href="{{asset('dashboard/assets/images/favicon.png')}}" type="image/x-icon">
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('form1/css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <div class="main">

        <section class="signup">
               <div class="container" style="margin-top: 5px; margin-bottom: 5px; max-width:400;">
                <div class="signup-content">
                   <!-- Header with Deep Gold Background and Icon -->
<div class="form-header" style="background-color: #b58900; padding: 20px; text-align: center; display: flex; align-items: center; justify-content: center; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
    <!-- Icon -->
    <i class="fa fa-edit" style="font-size: 24px; margin-right: 15px; color: white;"></i> 
    <!-- Title -->
    <h4 style="margin: 0; font-weight: bold; color: white; font-family: 'Arial', sans-serif;">Online Registration Update</h4> 
</div>
        <hr>
                <form id="updateForm"  method="POST" action="{{ route('user.updateStage1', ['id' => auth()->user()->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')    
    <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
        <div class="container-fluid">

            <!-- Email -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="email" class="form-label">Email Address</label>
                    <strong><p>{{ auth()->user()->email }}</p></strong> 
                </div>
            </div>  

            <!-- Surname, First Name, Other Name -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="surname" class="form-label">Surname <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="surname" name="surname" value="{{ old('surname', auth()->user()->surname) }}" required>
                    @error('surname')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="first_name" class="form-label">First Name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', auth()->user()->first_name) }}" required>
                    @error('first_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="other_name" class="form-label">Other Name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="other_name" name="other_name" value="{{ old('other_name', auth()->user()->other_name) }}" required>
                    @error('other_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Mobile Numbers -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="mobile_no" class="form-label">Mobile No <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="{{ old('mobile_no', auth()->user()->mobile_no) }}" required>
                    @error('mobile_no')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="mobile_no1" class="form-label">WhatsApp No <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="mobile_no1" name="mobile_no1" value="{{ old('mobile_no1', auth()->user()->mobile_no1) }}" required>
                    @error('mobile_no1')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Gender and DOB -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="gender" class="form-label">Gender <span style="color: red;">*</span></label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="male" {{ old('gender', auth()->user()->gender) == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', auth()->user()->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                    @error('gender')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="dob" class="form-label">Date of Birth <span style="color: red;">*</span></label>
                    <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob', auth()->user()->dob) }}" required>
                    @error('dob')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Address -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="address" class="form-label">Address <span style="color: red;">*</span></label>
                    <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address', auth()->user()->address) }}</textarea>
                    @error('address')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Occupation -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="occupation" class="form-label">Occupation <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="occupation" name="occupation" value="{{ old('occupation', auth()->user()->occupation) }}" required>
                    @error('occupation')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Social Media Handles -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="instagram" class="form-label">Instagram Handle</label>
                    <input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', auth()->user()->instagram) }}">
                    @error('instagram')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="facebook" class="form-label">Facebook Handle</label>
                    <input type="text" class="form-control" id="facebook" name="facebook" value="{{ old('facebook', auth()->user()->facebook) }}">
                    @error('facebook')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>                
            </div>

            <div class="row mb-3">               
                <div class="col-md-6">
                    <label for="snapchat" class="form-label">Snapchat Handle</label>
                    <input type="text" class="form-control" id="snapchat" name="snapchat" value="{{ old('snapchat', auth()->user()->snapchat) }}">
                    @error('snapchat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="twitter" class="form-label">Twitter Handle</label>
                    <input type="text" class="form-control" id="twitter" name="twitter" value="{{ old('twitter', auth()->user()->twitter) }}">
                    @error('twitter')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

             <!-- Field of Interest -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="interest" class="form-label">Field of Interest <span style="color: red;">*</span></label>
                    <select class="form-control" id="interest" name="interest" required>
                        <option value="">Select Interest</option>
                        @php
                            $interests = ['FASHION DESIGNING', 'MAKE-UP ARTISTRY', 'MODELLING', 'HAIR STYLING', 'PHOTOGRAPHY', 'SHOE MAKING'];
                        @endphp
                        @foreach ($interests as $item)
                            <option value="{{ $item }}" {{ old('interest', auth()->user()->interest) == $item ? 'selected' : '' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                    @error('interest')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            
             <!-- Knowledge Level -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="qst1" class="form-label">Select the knowledge level <span style="color: red;">*</span></label>
                    <select class="form-control" id="qst1" name="qst1" required>
                        <option value="">Select Knowledge Level</option>
                        <option value="BEGINNER" {{ old('qst1', auth()->user()->qst1) == 'BEGINNER' ? 'selected' : '' }}>BEGINNER</option>
                        <option value="PROFESSIONAL" {{ old('qst1', auth()->user()->qst1) == 'PROFESSIONAL' ? 'selected' : '' }}>PROFESSIONAL</option>
                    </select>
                    @error('qst1')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Fashion illustrator -->
            <div class="row mb-3" id="fashionIllustratorRow" style="display: none;">
                <div class="col-md-12">
                    <label for="interest_fashion" class="form-label">
                        Do you have professional experience as a <strong>Fashion Illustrator</strong>?
                    </label>
                    <select class="form-control" id="interest_fashion" name="interest_fashion">
                        <option value="">Select your answer</option>
                        <option value="YES" {{ old('interest_fashion', auth()->user()->interest_fashion) == 'YES' ? 'selected' : '' }}>YES</option>
                        <option value="NO" {{ old('interest_fashion', auth()->user()->interest_fashion) == 'NO' ? 'selected' : '' }}>NO</option>
                    </select>
                    @error('interest_fashion')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Knowledge Level -->
            <!--<div class="row mb-3">-->
            <!--    <div class="col-md-12">-->
            <!--        <label for="qst1" class="form-label">Select the knowledge level</label>-->
            <!--        <select class="form-control" id="qst1" name="qst1" required>-->
            <!--            <option value="">Select Knowledge Level</option>-->
            <!--            <option value="BEGINNER" {{ old('qst1', auth()->user()->qst1) == 'BEGINNER' ? 'selected' : '' }}>BEGINNER</option>-->
            <!--            <option value="PROFESSIONAL" {{ old('qst1', auth()->user()->qst1) == 'PROFESSIONAL' ? 'selected' : '' }}>PROFESSIONAL</option>-->
            <!--        </select>-->
            <!--        @error('qst1')-->
            <!--            <small class="text-danger">{{ $message }}</small>-->
            <!--        @enderror-->
            <!--    </div>-->
            <!--</div>-->

            <!-- Other Profession -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="qst2" class="form-label">Do you have knowledge of any other profession?<span style="color: red;">*</span></label>
                    <select class="form-control" id="qst2" name="qst2" required>                        
                        <option value="YES" {{ old('qst2', auth()->user()->qst2) == 'YES' ? 'selected' : '' }}>YES</option>
                        <option value="NO" {{ old('qst2', auth()->user()->qst2) == 'NO' ? 'selected' : '' }}>NO</option>
                    </select>
                    @error('qst2')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="ifyesqst2" class="form-label">If Yes, state the profession.</label>
                    <input type="text" class="form-control" id="ifyesqst2" name="ifyesqst2" value="{{ old('ifyesqst2', auth()->user()->if_yes_qst2) }}">
                    @error('ifyesqst2')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Accommodation -->
            <!--<div class="row mb-3">-->
            <!--    <div class="col-md-12">-->
            <!--        <label for="qst3" class="form-label">Do you want accommodation?</label>-->
            <!--        <select class="form-control" id="qst3" name="qst3" required>                        -->
            <!--            <option value="YES" {{ old('qst3', auth()->user()->qst3) == 'YES' ? 'selected' : '' }}>YES</option>-->
            <!--            <option value="NO" {{ old('qst3', auth()->user()->qst3) == 'NO' ? 'selected' : '' }}>NO</option>-->
            <!--        </select>-->
            <!--        @error('qst3')-->
            <!--            <small class="text-danger">{{ $message }}</small>-->
            <!--        @enderror-->
            <!--    </div>-->
            <!--</div>-->

            <!--<div class="row mb-3">-->
            <!--    <div class="col-md-12">-->
            <!--        <label class="form-label">If Yes</label>-->
            <!--        <p><strong>N.B:</strong> Accommodation for 7 DAYS costs ₦20,000.</p>-->
            <!--    </div>-->
            <!--</div>-->

            <!-- Profile Image -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="image" class="form-label">Profile Image</label>
                    <input type="file" class="form-control" id="image" name="image" >
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

        </div>
    </div>

    <br>

    <div class="modal-footer">
        <a href="{{route('user-dashboard')}}" class="btn btn-danger waves-effect" data-dismiss="modal">Close</a>&nbsp;
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</form>

                   
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{asset('form1/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('form1/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const interestSelect = document.getElementById('interest');

        interestSelect.addEventListener('change', function () {
            if (this.value !== '') {
                alert('Select whether you are a Beginner or Professional!');
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const qst2 = document.getElementById('qst2');
        const ifyesqst2 = document.getElementById('ifyesqst2');

        function toggleIfYesField() {
            if (qst2.value === 'YES') {
                ifyesqst2.disabled = false;
            } else {
                ifyesqst2.disabled = true;
                ifyesqst2.value = '';
            }
        }

        qst2.addEventListener('change', toggleIfYesField);

        toggleIfYesField(); // Run on page load too
    });
</script>
<script>
    function toggleFashionField() {
        const interest = $('#interest').val();
        if (interest === 'FASHION DESIGNING') {
            $('#fashionIllustratorRow').show();
        } else {
            $('#fashionIllustratorRow').hide();
            $('#interest_fashion').val(''); // Optional: Clear value if hidden
        }
    }

    $(document).ready(function () {
        toggleFashionField(); // Run on page load

        $('#interest').on('change', function () {
            toggleFashionField();
        });
    });
</script>