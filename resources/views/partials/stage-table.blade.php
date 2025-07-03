<div id="stageTable">
    @if($stage1->isEmpty())
        <div class="alert alert-info">
            No users found for this stage.
        </div>
    @else
        <table class="table table-hover c_table theme-color">
             {{$stage1->links()}}
        <thead>
            <tr>
                <th>Actions</th>
                <th>Status</th>
                <th style="width:50px;">Stage</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Comment</th>
                <!-- Only show "Reviewed At" column for stages 2, 3, and 4 -->
                @foreach($stage1 as $d)
                    @if(in_array($d->stage, [2, 3, 4]))
                        <th>Reviewed At</th>
                        @break  <!-- Only need to display once -->
                    @endif
                @endforeach
                <th>Date Registered</th>
            </tr>
        </thead>

        <tbody>
            @foreach($stage1 as $d)
                <tr>
                    <td>
                        <button type="button" class="btn btn-sm btn-deep-gold stage-action-btn"
                                data-toggle="modal" data-target="#userModal{{ $d->stage }}_{{ $d->id }}">
                            View
                        </button>
                    </td>
                    <td>{{ $d->status }}</td>
                    <td>{{ $d->user->current_stage ?? '1'}}</td>
                   <td>
                        {{ 
                            ($d->user->surname ?? 'n/a') . ' ' . 
                            ($d->user->first_name ?? 'n/a') . ' ' . 
                            ($d->user->other_name ?? 'n/a') 
                        }}
                    </td>
                    <td>{{ $d->user->email ?? 'n/a' }}</td>
                    <td>{{ $d->user->mobile_no ?? 'n/a' }}</td>
                    <td>{{ $d->comment }}</td>
                    @if(in_array($d->stage, [2, 3, 4]) && $d->reviewed_at)
                        <td>{{ \Carbon\Carbon::parse($d->reviewed_at)->format('F j, Y g:i A') }}</td>
                    @else
                        <!-- <td>—</td> -->
                    @endif
                    <td>
                        {{ $d->user && $d->user->created_at ? \Carbon\Carbon::parse($d->user->created_at)->format('F j, Y') : 'n/a' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
         {{$stage1->links()}}
       
        
        

        {{-- Modals for each user --}}
        @foreach($stage1 as $d)
            @if($d->stage == 1)
                <!-- Modal for Stage 1 -->
                <div class="modal fade" id="userModal{{ $d->stage }}_{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="userModalLabel{{ $d->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="userModalLabel{{ $d->id }}">User Details</h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                @php
                    $userImage = $d->user->image ?? 'blank.png';
                    $imagePath = $userImage && file_exists(public_path('uploads/' . $userImage))
                        ? asset('public/uploads/' . $userImage)
                        : asset('public/uploads/blank.png');
                @endphp
                            <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
                                <div class="text-center mb-4">
                                    <img src="{{ $imagePath }}"
                                             class="rounded-circle shadow"
                                             style="width: 120px; height: 120px; object-fit: cover;"
                                             alt="Profile Image">
                                    
                                    <h5 class="mt-3">{{ $d->user->surname ?? 'N/A' }} {{ $d->user->first_name ?? '' }} {{ $d->user->other_name ?? '' }}</h5>
                                </div>

                                <table class="table table-bordered table-striped">
                                    <tr><th>Current Stage:</th><td>{{ $d->user->current_stage ?? '1' }}</td></tr>
                                    <tr><th>Email:</th><td>{{ $d->user->email ?? 'N/A' }}</td></tr>
                                    <tr><th>Mobile No:</th><td>{{ $d->user->mobile_no ?? 'N/A' }}</td></tr>
                                    <tr><th>WhatsApp No:</th><td>{{ $d->user->mobile_no1 ?? 'N/A' }}</td></tr>
                                    <tr><th>Gender:</th><td>{{ $d->user->gender ?? 'N/A' }}</td></tr>
                                    <tr><th>Date of Birth:</th><td>{{ $d->user->dob ?? 'N/A' }}</td></tr>
                                    <tr><th>Address:</th><td>{{ $d->user->address ?? 'N/A' }}</td></tr>
                                    <tr><th>Occupation:</th><td>{{ $d->user->occupation ?? 'N/A' }}</td></tr>
                                    <tr><th>Instagram:</th><td>{{ $d->user->instagram ?? 'N/A' }}</td></tr>
                                    <tr><th>Facebook:</th><td>{{ $d->user->facebook ?? 'N/A' }}</td></tr>
                                    <tr><th>Snapchat:</th><td>{{ $d->user->snapchat ?? 'N/A' }}</td></tr>
                                    <tr><th>Twitter:</th><td>{{ $d->user->twitter ?? 'N/A' }}</td></tr>
                                    <tr><th>Field of Interest:</th><td>{{ $d->user->interest ?? 'N/A' }}</td></tr>
                                    <tr><th>Knowledge level:</th><td>{{ $d->user->qst1 ?? 'N/A' }}</td></tr>
                                    <tr><th>Do you have professional experience as a <strong>Fashion Illustrator</strong>?:</th><td>{{ $d->user->interest_fashion ?? 'N/A' }}</td></tr>
                                    <tr><th>Do you have knowledge of any other profession?</th><td>{{ $d->user->qst2 ?? 'N/A' }}</td></tr>
                                    <tr><th>If Yes, state the profession:</th><td>{{ $d->user->if_yes_qst2 ?? 'N/A' }}</td></tr>
                                   <tr>
                                        <th>Reg Date:</th>
                                        <td>
                                            {{ $d->user && $d->user->reg_date ? \Carbon\Carbon::parse($d->user->reg_date)->format('F j, Y') : 'N/A' }}
                                        </td>
                                    </tr>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($d->stage == 2)
                <!-- Modal for Stage 2 (Video) -->
                <div class="modal fade" id="userModal{{ $d->stage }}_{{ $d->id }}" tabindex="-1" aria-labelledby="viewVideoModalLabel{{ $d->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <form id="reviewForm_{{ $d->id }}">
                            @csrf
                            <input type="hidden" name="user_stage_id" value="{{ $d->id }}">

                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="viewVideoModalLabel{{ $d->id }}">Craft Video Review</h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
                                <video width="100%" controls class="mb-3">
                                    <source src="{{ url('public/video/' . $d->content) }}" type="video/mp4">
                                </video>

                                <div class="form-group">
                                    <label for="comment_{{ $d->id }}">Comment</label>
                                    <textarea name="comment" id="comment_{{ $d->id }}" class="form-control" rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="status_{{ $d->id }}">Review Status</label>
                                    <select name="status" id="status_{{ $d->id }}" class="form-control" required>
                                        <option value="">Select status</option>
                                        <option value="Not Approved">Not Approved</option>
                                        <option value="Reviewed">Reviewed</option>
                                        <option value="Approved">Approved</option>
                                    </select>
                                </div>
                                
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" onclick="submitReview({{ $d->id }})">Review</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

            @endif
        @endforeach
    @endif
</div>

<script>
function submitReview(id) {
    let form = $('#reviewForm_' + id);
    let data = form.serialize();

    $.ajax({
        url: "{{ route('video.review') }}",
        type: "POST",
        data: data,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        success: function(response) {
            alert(response.message);
            $('#userModal2_' + id).modal('hide');
            // Reload the page after modal closes
            setTimeout(function() {
                location.reload();
            }, 500);
        },
        error: function(xhr) {
            alert('An error occurred. Please try again.');
        }
    });
}
</script>
               
