<!-- Alert components -->
@if (session('message') !== null)
     <div class="card bg-success alert-card text-light p-2 p-md-3" transform>
     {{ session('message') }}
    </div>
    @elseif (session('error') !== null)
     <div class="card bg-danger alert-card text-light p-2 p-md-3" transform>
     {{ session('error') }}
    </div>
     @endif
     <!-- <div class="card bg-danger alert-card text-light p-2 p-md-3">Error</div>
   Alert components -->