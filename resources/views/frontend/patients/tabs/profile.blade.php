<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered mb-0">
        <tr>
            <th>@lang('Type')</th>
            <td>@include('backend.auth.user.includes.type', ['user' => $logged_in_user])</td>
        </tr>

        <tr>
            <th>@lang('Patient id')</th>
            <td>{{ $logged_in_user->name }}</td>
        </tr>
        <tr>
            <th>@lang('Date')</th>
            <td>{{ $logged_in_user->name }}</td>
        </tr>
        <tr>
            <th>@lang('Next visit')</th>
            <td>{{ $logged_in_user->name }}</td>
        </tr>
        <tr>
            <th>@lang('Note')</th>
            <td>{{ $logged_in_user->name }}</td>
        </tr>
        <tr>
            <th>@lang('Account Created')</th>
            <td>@displayDate($logged_in_user->created_at) ({{ $logged_in_user->created_at->diffForHumans() }})</td>
        </tr>
        <tr>
            <th>@lang('Account Approved')</th>
            <td>@displayDate($logged_in_user->created_at) ({{ $logged_in_user->created_at->diffForHumans() }})</td>
        </tr>
        <tr>
            <th>@lang('Last Updated')</th>
            <td>@displayDate($logged_in_user->updated_at) ({{ $logged_in_user->updated_at->diffForHumans() }})</td>
        </tr>
    </table>
</div><!--table-responsive-->
