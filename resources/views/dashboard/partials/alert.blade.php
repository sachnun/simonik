 {{-- pesan success --}}
 @if (session('success'))
     <div class="alert alert-success alert-dismissible" role="alert">
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         <div class="alert-icon">
             <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none"
                 stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                 <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                 <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
             </svg>
         </div>
         <div class="alert-message">
             {{ session('success') }}
         </div>
     </div>
 @endif

 {{-- pesan danger --}}
 @if (session('danger'))
     <div class="alert alert-danger alert-dismissible" role="alert">
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         <div class="alert-icon">
             <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none"
                 stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                 <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                 <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
             </svg>
         </div>
         <div class="alert-message">
             {{ session('danger') }}
         </div>
     </div>
 @endif

 {{-- pesan warning --}}
 @if (session('warning'))
     <div class="alert alert-warning alert-dismissible" role="alert">
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         <div class="alert-icon">
             <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none"
                 stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                 <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                 <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
             </svg>
         </div>
         <div class="alert-message">
             {{ session('warning') }}
         </div>
     </div>
 @endif
