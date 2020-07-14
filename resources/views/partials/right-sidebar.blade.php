<!-- Right Sidebar -->
<aside class="control-sidebar fixed white ">
    <div class="slimScroll">
        <div class="sidebar-header">
            <h4>Log Activity</h4>
            <a href="#" data-toggle="control-sidebar" class="paper-nav-toggle  active"><i></i></a>
        </div>
        <div class="p-4">
            @foreach(Activity::list() as $log)
            <div class="activity-item activity-primary">
                <div class="activity-content">
                    <small class="text-muted">
                        <i class="icon icon-av_timer position-left"></i> {{ $log->created_at->diffForHumans() }}
                    </small>
                    <small class="text-muted float-right">
                        {{ $log->ip }}
                    </small>
                    <p><b>{{ $log->page }}</b> | {{ $log->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</aside>
<!-- /.right-sidebar -->
<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>