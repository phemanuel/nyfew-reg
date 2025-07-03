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

</div>

    @endif
    
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
               
