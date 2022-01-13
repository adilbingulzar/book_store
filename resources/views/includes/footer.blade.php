<footer class="footer footer-static footer-light">
	<p class="clearfix mb-0">
		<span class="float-md-start d-block d-md-inline-block mt-25"
			>COPYRIGHT &copy; {{ date("Y") }}<a
			class="ms-25"
			href="https://1.envato.market/pixinvent_portfolio"
			target="_blank"
			>Pixinvent</a
			><span class="d-none d-sm-inline-block"
			>, All rights Reserved</span
			></span
			><span class="float-md-end d-none d-md-block"
			>Books Store<i data-feather="heart"></i
			></span>
	</p>
</footer>

<!-- Js Files-->
<script src="{{ asset('js/vendors.min.js') }}"></script>
<script src="{{ asset('js/app-menu.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script src="{{ asset('js/picker.js') }}"></script>
<script src="{{ asset('js/flatpickr.min.js') }}"></script>
<script src="{{ asset('js/form-picker.js') }}"></script>
<script  src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script>
  $(window).on("load", function () {
    if (feather) {
      feather.replace({
        width: 14,
        height: 14,
      });
    }
  });


  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
      })



	// Example starter JavaScript for disabling form submissions if there are invalid fields
	(function () {
	  'use strict'

	  // Fetch all the forms we want to apply custom Bootstrap validation styles to
	  var forms = document.querySelectorAll('.needs-validation')

	  // Loop over them and prevent submission
	  Array.prototype.slice.call(forms)
	    .forEach(function (form) {
	      form.addEventListener('submit', function (event) {
	        if (!form.checkValidity()) {
	          event.preventDefault()
	          event.stopPropagation()
	        }

	        form.classList.add('was-validated')
	      }, false)
	    })
	})()



  
</script>