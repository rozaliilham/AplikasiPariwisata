<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lanjutkan pembayaran</title>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ env('MIDTRANS_CLIENTKEY') }}"></script>

</head>
<body onload="setTimeout(function(){pay()}, 1000)">
    <script>
        function pay() {
                  snap.pay('{{ $snaptoken }}', {
                    // Optional
                    onSuccess: function(result) {
                    //   window.location.href = "{{ route('member-booking') }}";
                       console.log(result)
                    },
                    // Optional
                    onPending: function(result) {
                    //   Android.postMessage('pending');
                       console.log(result)
                    },
                    // Optional
                    onError: function(result) {
                    //   Android.postMessage('error');
                       console.log(result)
                    },
                    onClose: function() {
                    //   Android.postMessage('close');
                      Print.postMessage('close');
                    }
                  });
              }
    //   const payButton = document.querySelector('#pay-button');
    //   payButton.addEventListener('click', function(e) {
    //       e.preventDefault();

    //       snap.pay('{{ $snaptoken }}', {
    //           // Optional
    //           onSuccess: function(result) {
    //               window.location.href = "{{ route('member-booking') }}";
    //               console.log(result)
    //           },
    //           // Optional
    //           onPending: function(result) {
    //               /* You may add your own js here, this is just example */
    //               // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
    //               console.log(result)
    //           },
    //           // Optional
    //           onError: function(result) {
    //               /* You may add your own js here, this is just example */
    //               // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
    //               console.log(result)
    //           }
    //       });
    //   });
  </script>

</body>

</html>
