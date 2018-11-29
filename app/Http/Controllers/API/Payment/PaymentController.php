<?php

namespace App\Http\Controllers\API\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Paypalpayment;
class PaymentController extends Controller
{
    public function paywithCreditCard(Request $request)
    {

        // $shippingAddress = Paypalpayment::shippingAddress();
        // $shippingAddress->setLine1($request['delivery']['streetNo'])
        //     ->setLine2($request['delivery']['brgy']['brgyDesc'])
        //     ->setCity($request['delivery']['city']['citymunDesc'])
        //     ->setState($request['delivery']['province']['provCode'])
        //     ->setPostalCode("14305")
        //     ->setCountryCode("PH")
        //     ->setPhone($request['delivery']['contactNumber'])
        //     ->setRecipientName($request['delivery']['firstname'] . ' ' . $request['delivery']['lastname']);

        // // ### CreditCard
        // $card = Paypalpayment::creditCard();
        // $card->setType($request['cardType'])
        //     ->setNumber($request['creditCard'])
        //     ->setExpireMonth($request['expiryMonth'])
        //     ->setExpireYear($request['expiryYear'])
        //     ->setCvv2($request['cvv'])
        //     ->setFirstName($request['firstname'])
        //     ->setLastName($request['lastname']);

        // ### Address
        // Base Address object used as shipping or billing
        // address in a payment. [Optional]
        $shippingAddress= Paypalpayment::shippingAddress();
        $shippingAddress->setLine1("3909 Witmer Road")
            ->setLine2("Niagara Falls")
            ->setCity("Niagara Falls")
            ->setState("NY")
            ->setPostalCode("14305")
            ->setCountryCode("US")
            ->setPhone("716-298-1822")
            ->setRecipientName("Jhone");

        // ### Payer
        // A resource representing a Payer that funds a payment
        // Use the List of `FundingInstrument` and the Payment Method
        // as 'credit_card'
        $payer = Paypalpayment::payer();
        $payer->setPaymentMethod("paypal");

        $item1 = Paypalpayment::item();
        $item1->setName('Ground Coffee 40 oz')
                ->setDescription('Ground Coffee 40 oz')
                ->setCurrency('PHP')
                ->setQuantity(1)
                ->setTax(0.3)
                ->setPrice(7.50);

        $item2 = Paypalpayment::item();
        $item2->setName('Granola bars')
                ->setDescription('Granola Bars with Peanuts')
                ->setCurrency('PHP')
                ->setQuantity(5)
                ->setTax(0.2)
                ->setPrice(2);


        $itemList = Paypalpayment::itemList();
        $itemList->setItems([$item1,$item2])
            ->setShippingAddress($shippingAddress);


        $details = Paypalpayment::details();
        $details->setShipping("1.2")
                ->setTax("1.3")
                //total of items prices
                ->setSubtotal("17.5");

        //Payment Amount
        $amount = Paypalpayment::amount();
        $amount->setCurrency("PHP")
                // the total is $17.8 = (16 + 0.6) * 1 ( of quantity) + 1.2 ( of Shipping).
                ->setTotal("20")
                ->setDetails($details);

        // ### Transaction
        // A transaction defines the contract of a
        // payment - what is the payment for and who
        // is fulfilling it. Transaction is created with
        // a `Payee` and `Amount` types

        $transaction = Paypalpayment::transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

        // ### Payment
        // A Payment Resource; create one using
        // the above types and intent as 'sale'

        $redirectUrls = Paypalpayment::redirectUrls();
        $redirectUrls->setReturnUrl("http://localhost:3000/payments/success")
            ->setCancelUrl("http://localhost:3000/payments/fails");

        $payment = Paypalpayment::payment();

        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions([$transaction]);

        try {
            // ### Create Payment
            // Create a payment by posting to the APIService
            // using a valid ApiContext
            // The return object contains the status;
            $payment->create(Paypalpayment::apiContext());
        } catch (\PPConnectionException $ex) {
            return response()->json(["error" => $ex->getMessage()], 400);
        }

        return response()->json([$payment->toArray(), 'approval_url' => $payment->getApprovalLink()], 200);
    }
}
