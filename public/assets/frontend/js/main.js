(function ($) {
    "use strict";

    /*---------------------------
       Commons Variables
    ------------------------------ */
    var $window = $(window),
        $body = $("body");

    /*window.addEventListener("resize", function() {
		"use strict"; window.location.reload(); 
    });*/

    /*-----  Hover Dropdown multi level Navigation Start -----*/
    if (window.innerWidth > 992) {
        document.querySelectorAll('.navbar .nav-item').forEach(function (everyitem) {
            everyitem.addEventListener('mouseover', function (e) {
                let el_link = this.querySelector('a[data-bs-toggle]');
                if (el_link != null) {
                    let nextEl = el_link.nextElementSibling;
                    el_link.classList.add('show');
                    nextEl.classList.add('show');
                    nextEl.setAttribute("data-bs-popper", "static");
                }
            });
            everyitem.addEventListener('mouseleave', function (e) {
                let el_link = this.querySelector('a[data-bs-toggle]');
                if (el_link != null) {
                    let nextEl = el_link.nextElementSibling;
                    el_link.classList.remove('show');
                    nextEl.classList.remove('show');
                    nextEl.removeAttribute("data-bs-popper");
                }
            })
        });
    }
    // make it as accordion for smaller screens
    document.addEventListener("DOMContentLoaded", function(){
    	/////// Prevent closing from click inside dropdown
		document.querySelectorAll('.dropdown-menu').forEach(function(element){
			element.addEventListener('click', function (e) {
			  e.stopPropagation();
			});
		})
		// make it as accordion for smaller screens
		if (window.innerWidth < 992) {
			// close all inner dropdowns when parent is closed
			document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
				everydropdown.addEventListener('hidden.bs.dropdown', function () {
					// after dropdown is hidden, then find all submenus
					  this.querySelectorAll('.submenu').forEach(function(everysubmenu){
					  	// hide every submenu as well
					  	everysubmenu.style.display = 'none';
					  });
				})
			});
			document.querySelectorAll('.dropdown-menu a').forEach(function(element){
				element.addEventListener('click', function (e) {
		
				  	let nextEl = this.nextElementSibling;
				  	if(nextEl && nextEl.classList.contains('submenu')) {	
				  		// prevent opening link if link needs to open dropdown
				  		e.preventDefault();
				  		console.log(nextEl);
				  		if(nextEl.style.display == 'block'){
				  			nextEl.style.display = 'none';
				  		} else {
				  			nextEl.style.display = 'block';
				  		}
				  	}
				});
			})
		}
		// end if innerWidth
	}); 
	// DOMContentLoaded  end
    /*-----  Hover Dropdown multi level Navigation End  -----*/

    /*-----  enable Tooltip start -----*/
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    /*-----  enable Tooltip end -----*/

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('form#form_data.needs-validation')
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }else{
            event.preventDefault();
            event.stopPropagation();
            grecaptcha.ready(function() {
                grecaptcha.execute('6Lc-cJYjAAAAADklwl2vpP4F9HkXj1BdZXe_JIYP', {action: 'submit'}).then(function(token) {
                  //console.log(token);
                  $(form).find("input[name='g-recaptcha-response']").val(token);
                  $("<div />").addClass("formOverlay").appendTo(form);  
                    $.ajax({
                        url: 'eCerts_Mailer.php',
                        type: 'POST',
                        data: new FormData(form),
                        contentType: false,
                        processData:false,
                        success: function(data) {
                            var res=data.split("::");
                            //console.log(res);
                            jQuery(form).find("div.formOverlay").remove();
                            jQuery(form).prev('.expMessage').html(res[1]);
                            if(res[0]=='Success'){
                                jQuery(form).remove(); 
                                jQuery(form).prev('.expMessage').html('');
                            }              
                        }
                    });
                  
                });
            });

            
        }

        form.classList.add('was-validated');

        }, false)
    })

}(jQuery));

function checkRequired() {
    if ($('input[type=checkbox]:checked').length > 0) {  // the "> 0" part is unnecessary, actually
        $('input[type=checkbox]').prop('required', false);
    } else {
        $('input[type=checkbox]').prop('required', true);
    }
}
