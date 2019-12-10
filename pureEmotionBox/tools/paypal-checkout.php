<div id="paypal-button-container"></div>
<div id="paypal-button"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
paypal.Button.render({
  style: {
    label: 'paypal',
    size:   'responsive',
    shape: 'rect',
    color: 'gold',
    fundingicons: false
  },
  env: '<?php echo PayPalENV; ?>',
  client: {
    <?php if(ProPayPal) { ?>  
    production: '<?php echo PayPalClientId; ?>'
    <?php } else { ?>
    sandbox: '<?php echo PayPalClientId; ?>'
    <?php } ?>  
  },
  payment: function (data, actions) {
    return actions.payment.create({
      transactions: [{
        amount: {
          total: '<?php echo $caja["precio"]; ?>',
          currency: 'EUR'
        }
      }]
    });
  },
  onApprove: function (data, actions) {
    return actions.order.capture().then(function(details) {
        // window.location.href = "<?php echo get_site_url(); ?>/tools/buy-box.php".concat("?id_caja=", <?php echo $caja["id"];?>,"&email=",document.getElementById("email").value, "&direccion_envio=", document.getElementById("direccion_envio").value );
        
        const form = document.createElement('form');
        form.method = 'post';
        form.action = '../../../tools/buy-box.php';

        const hiddenFieldCaja = document.createElement('input');
        hiddenFieldCaja.type = 'hidden';
        hiddenFieldCaja.name = 'id_caja';
        hiddenFieldCaja.value = <?php echo $caja["id"];?>;
        form.appendChild(hiddenFieldCaja);

        const hiddenFieldEmail = document.createElement('input');
        hiddenFieldEmail.type = 'hidden';
        hiddenFieldEmail.name = 'email';
        hiddenFieldEmail.value = document.getElementById("email").value;
        form.appendChild(hiddenFieldEmail);

        const hiddenFieldDireccionEnvio = document.createElement('input');
        hiddenFieldDireccionEnvio.type = 'hidden';
        hiddenFieldDireccionEnvio.name = 'direccion_envio';
        hiddenFieldDireccionEnvio.value = document.getElementById("direccion_envio").value;
        form.appendChild(hiddenFieldDireccionEnvio);

        const hiddenFieldPaymentID = document.createElement('input');
        hiddenFieldPaymentID.type = 'hidden';
        hiddenFieldPaymentID.name = 'paymentID';
        hiddenFieldPaymentID.value = data.paymentID;
        form.appendChild(hiddenFieldPaymentID);

        const hiddenFieldPayerID = document.createElement('input');
        hiddenFieldPayerID.type = 'hidden';
        hiddenFieldPayerID.name = 'payerID';
        hiddenFieldPayerID.value = data.payerID;
        form.appendChild(hiddenFieldPayerID);

        const hiddenFieldToken = document.createElement('input');
        hiddenFieldToken.type = 'hidden';
        hiddenFieldToken.name = 'token';
        hiddenFieldToken.value = data.paymentToken;
        form.appendChild(hiddenFieldToken);

        document.body.appendChild(form);
        form.submit();
      });
  }
}, '#paypal-button');
</script>