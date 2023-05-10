'use strict';

var stripe = Stripe('pk_test_H0n8RftpV3rgITLNU4HpFqMs');

function registerElements(elements, exampleName) {
  var formClass = '.' + exampleName;
  var example = document.querySelector(formClass);

  var form = example.querySelector('form');
  var resetButton = example.querySelector('a.reset');
  var error = form.querySelector('.error');
  var errorMessage = error.querySelector('.message');

  function enableInputs() {
    Array.prototype.forEach.call(
      form.querySelectorAll(
        "input[type='text'], input[type='email'], input[type='tel']"
      ),
      function(input) {
        input.removeAttribute('disabled');
      }
    );
  }

  function disableInputs() {
    Array.prototype.forEach.call(
      form.querySelectorAll(
        "input[type='text'], input[type='email'], input[type='tel']"
      ),
      function(input) {
        input.setAttribute('disabled', 'true');
      }
    );
  }

  function triggerBrowserValidation() {
    // The only way to trigger HTML5 form validation UI is to fake a user submit
    // event.
    var submit = document.createElement('input');
    submit.type = 'submit';
    submit.style.display = 'none';
    form.appendChild(submit);
    submit.click();
    submit.remove();
  }

  // Listen for errors from each Element, and show error messages in the UI.
  var savedErrors = {};
  elements.forEach(function(element, idx) {
    element.on('change', function(event) {
      if (event.error) {
        error.classList.add('visible');
        savedErrors[idx] = event.error.message;
        errorMessage.innerText = event.error.message;
      } else {
        savedErrors[idx] = null;

        // Loop over the saved errors and find the first one, if any.
        var nextError = Object.keys(savedErrors)
          .sort()
          .reduce(function(maybeFoundError, key) {
            return maybeFoundError || savedErrors[key];
          }, null);

        if (nextError) {
          // Now that they've fixed the current error, show another one.
          errorMessage.innerText = nextError;
        } else {
          // The user fixed the last error; no more errors.
          error.classList.remove('visible');
        }
      }
    });
  });

  // Listen on the form's 'submit' handler...
  form.addEventListener('submit', function(e) {
    e.preventDefault();

    // Trigger HTML5 validation UI on the form if any of the inputs fail
    // validation.
    var plainInputsValid = true;
    Array.prototype.forEach.call(form.querySelectorAll('input'), function(
      input
    ) {
      if (input.checkValidity && !input.checkValidity()) {
        plainInputsValid = false;
        return;
      }
    });
    if (!plainInputsValid) {
      triggerBrowserValidation();
      return;
    }

    // Show a loading screen...
    example.classList.add('submitting');

    // Disable all inputs.
    disableInputs();

    // Gather additional customer data we may have collected in our form.
    var name = form.querySelector('#' + exampleName + '-name');
    var additionalData = {
      name: name ? name.value : undefined,
    };

    // Use Stripe.js to create a token. We only need to pass in one Element
    // from the Element group in order to create a token. We can also pass
    // in the additional customer data we collected in our form.
    stripe.createToken(elements[0], additionalData).then(function(result) {
      // Stop loading!
      example.classList.remove('submitting');

      if (result.token) {
        // If we received a token, show the token ID.
        example.querySelector('.token').innerText = result.token.id;
        example.classList.add('submitted');
      } else {
        // Otherwise, un-disable inputs.
        enableInputs();
      }
    });
  });

  resetButton.addEventListener('click', function(e) {
    e.preventDefault();
    // Resetting the form (instead of setting the value to `''` for each input)
    // helps us clear webkit autofill styles.
    form.reset();

    // Clear each Element.
    elements.forEach(function(element) {
      element.clear();
    });

    // Reset error state as well.
    error.classList.remove('visible');

    // Resetting the form does not un-disable inputs, so we need to do it separately:
    enableInputs();
    example.classList.remove('submitted');
  });
}


var elements = stripe.elements({
  // Stripe's examples are localized to specific languages, but if
  // you wish to have Elements automatically detect your user's locale,
  // use `locale: 'auto'` instead.
  locale: window.__exampleLocale
});

// Floating labels
var inputs = document.querySelectorAll('#payment_form_wrapper .input');
Array.prototype.forEach.call(inputs, function(input) {
  input.addEventListener('focus', function() {
  input.classList.add('focused');
  });
  input.addEventListener('blur', function() {
  input.classList.remove('focused');
  });
  input.addEventListener('keyup', function() {
  if (input.value.length === 0) {
      input.classList.add('empty');
  } else {
      input.classList.remove('empty');
  }
  });
});

var elementStyles = {
  base: {
  color: '#32325D',
  fontWeight: 500,
  fontSize: '16px',
  fontSmoothing: 'antialiased',

  '::placeholder': {
      color: '#CFD7DF',
  },
  ':-webkit-autofill': {
      color: '#e39f48',
  },
  },
  invalid: {
  color: '#E25950',

  '::placeholder': {
      color: '#FFCCA5',
  },
  },
};

var elementClasses = {
  focus: 'focused',
  empty: 'empty',
  invalid: 'invalid',
};

var cardNumber = elements.create('cardNumber', {
  style: elementStyles,
  classes: elementClasses,
});
cardNumber.mount('#payment-form-card-number');

var cardExpiry = elements.create('cardExpiry', {
  style: elementStyles,
  classes: elementClasses,
});
cardExpiry.mount('#payment-form-card-expiry');

var cardCvc = elements.create('cardCvc', {
  style: elementStyles,
  classes: elementClasses,
});
cardCvc.mount('#payment-form-card-cvc');

registerElements([cardNumber, cardExpiry, cardCvc], 'payment_form_wrapper');