<?php
  include 'includes/autoload.php';
  include 'includes/visits.php';
  $ver= new View();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title></title>
    <script src="https://js.stripe.com/v3/"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style media="screen">
    /**
    * The CSS shown here will not be introduced in the Quickstart guide, but shows
    * how you can use CSS to style your Element's container.
    */
    *{
      box-sizing: border-box;
      max-width: 100%;
    }
    .StripeElement {
    box-sizing: border-box;

    height: 40px;

    padding: 10px 12px;

    border: 1px solid transparent;
    border-radius: 4px;
    background-color: white;

    box-shadow: 0 1px 3px 0 #e6ebf1;
    -webkit-transition: box-shadow 150ms ease;
    transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
    box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
    border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
    background-color: #fefde5 !important;
    }
    body{
      background: rgb(0,79,145);
      background: linear-gradient(90deg, rgba(0,79,145,1) 0%, rgba(75,155,250,1) 100%);
      margin:0;
    }
    .inline-block{
      display: block;
      margin:0px auto;
      width: 80%;
      font-family: arial;

    }
    .submit{
      margin:0px auto;
      width: 300px;
      padding: 14px 11px;
      transform: translateY(70%);
      border:0;
      border-radius: 10px;
      cursor: pointer;
      background: rgb(0,79,145);
      background: linear-gradient(90deg, rgba(0,79,145,1) 0%, rgba(75,155,250,1) 100%);
      color: white;
      opacity: 0.8;
      transition: opacity ease-in-out .3s;
      display: block;
      font-size: 1em;
    }
    .submit:last-child:hover{
      opacity: 1;
    }
    form{
      width: auto;
      position: relative;
      margin-top:50vh;
      margin-left: 50vw;
      transform: translate(-50%,-50%);
      background: white;
      padding: 50px 10px;
      border-radius: 10px;
      box-shadow: 2px 5px  5px rgba(50,50,50, .7);
      text-align: center;
      font-family: arial;

    }
    form input{
      width: 80%;
      color: #32325d;
    font-family: "Helvetica Neue", Helvetica, sans-serif;
    font-size: 16px;
    -webkit-font-smoothing: antialiased;
      box-sizing: border-box;

      height: 40px;

      padding: 10px 12px;

      border: 1px solid transparent;
      border-radius: 4px;
      background-color: white;

      box-shadow: 0 1px 3px 0 #e6ebf1;
      -webkit-transition: box-shadow 150ms ease;
      transition: box-shadow 150ms ease;

    }
    a{
      text-decoration: none;
      margin:0px auto;
      width: 100px;
      padding: 14px 9px;
      transform: translateY(70%);
      border:0;
      border-radius: 10px;
      cursor: pointer;
      background: transparent;
      color: #999;
      opacity: 0.8;
      transition: opacity ease-in-out .3s;
      display: block;
      font-size: .95em;
      font-family: arial;
      margin-right: auto;
      margin-left: 0;

  }
  @media (max-width:852px) {
    form{
      width: 90%;
    }
  }
  @media (max-width:600px) {
    form{
      width: 95%;
      margin-left: .5%;
      transform: translate(0%,-50%);
    }
  }
    </style>
  </head>
  <body>
    <div class="content">

      <script src="https://js.stripe.com/v3/"></script>

      <form action="charge.php" method="post" id="payment-form">
        <div  class="form-row inline-block">
          <label for="card-element">
            Credit or debit card
          </label>
          <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
          </div>

          <!-- Used to display form errors. -->
          <div id="card-errors" role="alert"></div>
        </div>

        <button class="submit inline-block">Submit Payment</button>
        <a href="index.php"> <i class="fa fa-arrow-left"></i> Go Back</a>
      </form>
    </div>
    <script type="text/javascript">
      // Create a Stripe client.
      var stripe = Stripe('pk_live_BeE3lOuB3mLBB9pyZDjwtfpK000oAmbdIO');

      // Create an instance of Elements.
      var elements = stripe.elements();

      // Custom styling can be passed to options when creating an Element.
      // (Note that this demo uses a wider set of styles than the guide below.)
      var style = {
      base: {
        color: '#32325d',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
          color: '#aab7c4'
        }
      },
      invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
      }
      };

      // Create an instance of the card Element.
      var card = elements.create('card', {style: style});

      // Add an instance of the card Element into the `card-element` <div>.
      card.mount('#card-element');

      // Handle real-time validation errors from the card Element.
      card.addEventListener('change', function(event) {
      var displayError = document.getElementById('card-errors');
      if (event.error) {
        displayError.textContent = event.error.message;
      } else {
        displayError.textContent = '';
      }
      });

      // Handle form submission.
      var form = document.getElementById('payment-form');
      form.addEventListener('submit', function(event) {
      event.preventDefault();

      stripe.createToken(card).then(function(result) {
        if (result.error) {
          // Inform the user if there was an error.
          var errorElement = document.getElementById('card-errors');
          errorElement.textContent = result.error.message;
        } else {
          // Send the token to your server.
          stripeTokenHandler(result.token);
        }
      });
      });

      // Submit the form with the token ID.
      function stripeTokenHandler(token) {
      // Insert the token ID into the form so it gets submitted to the server
      var form = document.getElementById('payment-form');
      var hiddenInput = document.createElement('input');
      hiddenInput.setAttribute('type', 'hidden');
      hiddenInput.setAttribute('name', 'stripeToken');
      hiddenInput.setAttribute('value', token.id);
      form.appendChild(hiddenInput);

      // Submit the form
      form.submit();
      }
    </script>
  </body>
</html>
