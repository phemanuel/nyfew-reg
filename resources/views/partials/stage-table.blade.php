<div id="stageTable">
    @if($stage1->isEmpty())
        <div class="alert alert-info">
            No users found for this stage.
        </div>
    @else
        <table class="table table-hover c_table theme-color">
            <thead>
                <tr>
                    <th>Actions</th>
                    <th style="width:50px;">Stage</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Date Registered</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stage1 as $d)
                    <tr>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#userModal{{ $d->id }}">
                                View
                            </button>
                        </td>
                        <td>{{ $d->stage }}</td>
                        <td>{{ $d->user->surname . " " . $d->user->first_name . " " . $d->user->other_name }}</td>
                        <td>{{ $d->user->email }}</td>
                        <td>{{ $d->user->mobile_no }}</td>
                        <td>{{ \Carbon\Carbon::parse($d->user->reg_date)->format('F j, Y') ?? 'N/A' }}</td>
                    </tr>
</table>
                    <!-- Modal -->
                    <div class="modal fade" id="userModal{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="userModalLabel{{ $d->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h5 class="modal-title" id="userModalLabel{{ $d->id }}">User Details</h5>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
                                    <div class="text-center mb-4">
                                        @if(!empty($d->user->image))
                                            <img src="{{ asset('uploads/' . $d->user->image) }}"
                                                 class="rounded-circle shadow"
                                                 style="width: 120px; height: 120px; object-fit: cover;"
                                                 alt="Profile Image">
                                        @else
                                            <img src="{{ asset('uploads/blank.jpg') }}"
                                                 class="rounded-circle shadow"
                                                 style="width: 120px; height: 120px; object-fit: cover;"
                                                 alt="No Image">
                                        @endif
                                        <h5 class="mt-3">{{ $d->user->surname ?? 'N/A' }} {{ $d->user->first_name ?? '' }} {{ $d->user->other_name ?? '' }}</h5>
                                    </div>

                                    <table class="table table-bordered table-striped">
                                        <tr><th>Current Stage:</th><td>{{ $d->user->current_stage ?? 'N/A' }}</td></tr>
                                        <tr><th>Address:</th><td>{{ $d->user->email ?? 'N/A' }}</td></tr>
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
                                        <tr><th>Do you have knowledge of any other profession?:</th><td>{{ $d->user->qst2 ?? 'N/A' }}</td></tr>
                                        <tr><th>If Yes, state the profession.:</th><td>{{ $d->user->if_yes_qst2 ?? 'N/A' }}</td></tr>
                                        <tr><th>Reg Date:</th><td>{{ $d->user->reg_date ? \Carbon\Carbon::parse($d->user->reg_date)->format('F j, Y') : 'N/A' }}</td></tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        
    @endif
</div>
