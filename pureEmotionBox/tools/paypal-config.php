<?php
define('ProPayPal', 0);
if(ProPayPal){
    define("PayPalClientId", "*********************");
    define("PayPalSecret", "*********************");
    define("PayPalBaseUrl", "https://api.paypal.com/v1/");
    define("PayPalENV", "production");
} else {
    define("PayPalClientId", "AWqRA-O1C3I_2CYtWBp8C1PmTpDmCFO8ZAiQAskuKGERtCHqWcHl038v6YLUiT2n8N0BKgIhcCmOqSfz");
    define("PayPalSecret", "EFmPXmbEmwIbsdkpzfEuYgpgensovM86qd4QZqrKhAs7F5wLNIkIZZ1TE-nnshlOyYRtZLBbDsuA4kDV");
    define("PayPalBaseUrl", "https://api.sandbox.paypal.com/v1/");
    define("PayPalENV", "sandbox");
}
?>