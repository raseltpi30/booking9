<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="{{asset('frontend')}}/js/booking.js"></script>
<script type="text/javascript" src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>

<script>
    @if(Session::has('message'))
  var type = "{{Session::get('alert-type','bg-info')}}"
  switch (type) {
      case 'info':
          toastr.info("{{ Session::get('message') }}");
          break;
      case 'success':
          toastr.success("{{ Session::get('message') }}");
          break;
      case 'warning':
          toastr.warning("{{ Session::get('message') }}");
          break;
      case 'error':
          toastr.error("{{ Session::get('message') }}");
          break;
  }
  @endif
</script>
<script>
    $(document).ready(function() {
        var currentRoute = @json(url()->current());

        // Add 'active' class to the first nav item
        $('nav ul li a:first').addClass('active');

        // Update active class based on the current route
        $('nav ul li a').each(function() {
            if ($(this).attr('href') === currentRoute) {
                $(this).addClass('active');
            } else {
                $(this).removeClass('active');
            }
        });

        // Handle click event for any nav item
        $('nav ul li a').on('click', function() {
            // Remove 'active' class from all nav items
            $('nav ul li a').removeClass('active');

            // Add 'active' class to the clicked nav item
            $(this).addClass('active');
        });

        // Handle click event for any nav item
        $('nav ul li a').on('click', function() {
            // Remove 'active' class from all nav items
            $('nav ul li a').removeClass('active');

            // Add 'active' class to the clicked nav item
            $(this).addClass('active');
        });
        // Initially set 'HOME' as active
        $('.menus').click(function(e) {
            e.preventDefault(); // Prevent default link behavior

            // Toggle menu visibility
            $('.menu').show();

            // Toggle the visibility of the menu icon and close button
            $('.menus').hide();
            $('.close-btn').show();
        });

        $('.close-btn').click(function(e) {
            e.preventDefault(); // Prevent default link behavior

            // Hide the menu
            $('.menu').hide();

            // Toggle the visibility of the menu icon and close button
            $('.menus').show();
            $('.close-btn').hide();
        });

    });
</script>