<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Document</title>
</head>
<body>
	


	<script
	src="https://code.jquery.com/jquery-3.5.0.min.js"
	integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
	crossorigin="anonymous"></script>

	<script>

		function State (a, b, c) {
			this.a = a
			this.b = b
			this.c = c
			this.show = (n) => {
				console.log(this.a * n)
				console.log(this.b * n)
				console.log(this.c * n)
			}
		}

		let newState = new State(1, 2, 3)
		newState.show(9)


		function HttpRequest (data = {}) {
			this.data = data;
			// this.result;
			let that = this;

			that.result;

			this.makeRequest = () => {

				jQuery.ajax({
	              url: "{{ url('/getDemoAreas') }}",
	              method: 'get',
	              // async: false,
	              success: this.success
	          	})
			}
			this.success = (result) => {
				that.result = result
			}

			console.log(that.result)
		}

		let httpRequest = new HttpRequest()
		httpRequest.makeRequest()
		httpRequest.result;



		function Restaurant (name, address) {
			this.name = name;
			this.address = address;
			this.validationPassed = false;
			this.createRestaurant = () => {

			}
		}
			

		$(document).ready(function(){
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
				}
			})

			jQuery.ajax({
              url: "{{ url('/getDemoAreas') }}",
              method: 'get',
              // async: false,
              success: function (result) {
                 window.resultR = result
              }
            });

		})



		// consosle.slog(result)


		
	</script>
</body>
</html>