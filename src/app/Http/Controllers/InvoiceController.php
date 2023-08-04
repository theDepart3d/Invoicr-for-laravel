<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GenerateInvoice;

class InvoiceController extends Controller
{
    /**
     * create_invoice_view
     *
     * @param  mixed $invoicr
     * @return invoice
     */
    public function create_invoice_view(GenerateInvoice $invoicr, Request $request) {

        // (A) SET INVOICE DATA
        // (A1) COMPANY INFORMATION
        $invoicr->set("company", config('invoicr.company_info'));

        // (B2) INVOICE HEADER
        $invoicr->set("head", [
            ["Invoice #", "CB-123-456"],
            ["DOP", "2011-11-11"],
            ["P.O. #", "CB-789-123"],
            ["Due Date", "2011-12-12"]
        ]);

        // (B3) BILL TO
        $invoicr->set("billto", [
            "Customer Name",
            "Street Address",
            "City, State, Zip"
        ]);

        // (B4) SHIP TO
        $invoicr->set("shipto", [
            "Customer Name",
            "Street Address",
            "City, State, Zip"
        ]);

        // (B5) ITEMS - ADD ONE-BY-ONE
        $items = [
            ["Rubber Hose", "5m long rubber hose", 3, "$5.50", "$16.50"],
            ["Rubber Duck", "Good bathtub companion", 8, "$4.20", "$33.60"],
            ["Rubber Band", "", 10, "$0.10", "$1.00"],
            ["Rubber Stamp", "", 3, "$12.30", "$36.90"],
            ["Rubber Shoe", "For slipping, not for running", 1, "$20.00", "$20.00"]
        ];
        // foreach ($items as $i) { $invoicr->add("items", $i); }

        // (B6) ITEMS - OR SET ALL AT ONCE
        $invoicr->set("items", $items);

        // (B7) TOTALS
        $invoicr->set("totals", [
            ["SUB-TOTAL", "$108.00"],
            ["DISCOUNT 10%", "-$10.80"],
            ["GRAND TOTAL", "$97.20"]
        ]);

        // (B8) NOTES, IF ANY
        $invoicr->set("notes", [
            "Cheques should be made payable to Code Boxx",
            "Get a 10% off with the next purchase with discount code DOGE1234!"
        ]);

        // (C) OUTPUT
        // (C1) CHOOSE A TEMPLATE
        $invoicr->template(config("invoicr.template"));
        // $invoicr->template("banana");
        // $invoicr->template("blueberry");
        // $invoicr->template("lime");
        // $invoicr->template("simple");
        // $invoicr->template("strawberry");

        // (C2) OUTPUT IN HTML
        // DEFAULT : DISPLAY IN BROWSER
        // 1 : DISPLAY IN BROWSER
        // 2 : FORCE DOWNLOAD
        // 3 : SAVE ON SERVER
        // 4 : DISPLAY IN BROWSER & SAVE AS PNG
        // $invoicr->outputHTML();
        // $invoicr->outputHTML(1);
        // $invoicr->outputHTML(2, "invoice.html");
        // $invoicr->outputHTML(3, __DIR__ . DIRECTORY_SEPARATOR . "invoice.html");
        // $invoicr->outputHTML(4, "invoice.png");

        // (C3) OUTPUT IN PDF
        // DEFAULT : DISPLAY IN BROWSER
        // 1 : DISPLAY IN BROWSER
        // 2 : FORCE DOWNLOAD
        // 3 : SAVE ON SERVER
        // $invoicr->outputPDF();
        // $invoicr->outputPDF(1);
        // $invoicr->outputPDF(2, "invoice.pdf");
        // $invoicr->outputPDF(3, __DIR__ . DIRECTORY_SEPARATOR . "invoice.pdf");

        // (C4) OUTPUT IN DOCX
        // DEFAULT : FORCE DOWNLOAD
        // 1 : FORCE DOWNLOAD
        // 2 : SAVE ON SERVER
        // $invoicr->outputDOCX();
        // $invoicr->outputDOCX(1, "invoice.docx");
        // $invoicr->outputDOCX(2, __DIR__ . DIRECTORY_SEPARATOR . "invoice.docx");

        // (D) USE RESET() IF YOU WANT TO CREATE ANOTHER ONE AFFTER THIS
        // $invoicr->reset();
    }
}
