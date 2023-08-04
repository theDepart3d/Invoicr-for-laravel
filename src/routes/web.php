<?php 

Route::controller(App\Http\Controllers\InvoiceController::class)->group(function () {
    // Generate Invoice
    Route::post('/testInvoice', 'create_invoice_view')->name('generate_invoice_view');
});